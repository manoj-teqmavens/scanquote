<?php
declare(strict_types=1);

namespace App\Controller;


use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Http\Cookie\Cookie;
use Cake\Http\Cookie\CookieCollection;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        //$this->Authentication->addUnauthenticatedActions(['login']);

        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

        
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
         if($this->request->is('post')){
           $sKey = $this->request->getData('search_employee');
           $usersQuery = $this->Users->find('all', [
            'conditions' => ["AND" => ['Users.role' => '2'],["OR" => ['Users.username LIKE' => '%'.$sKey.'%',
                              'Users.email LIKE' => '%'.$sKey.'%',
                          ]]]
                      ]);
         }else{
            $usersQuery = $this->Users->find('all', [
    'conditions' =>['Users.role' => '2']]); 
         }    


        $users = $this->paginate($usersQuery);

        $this->set(compact('users'));
    }
    public function login()
{
    $this->viewBuilder()->setLayout('login');
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
        $identity = $this->Authentication->getIdentity();

            /*$this->Authentication->setUser($user);*/
            if($identity->status == 0)
            {
                $this->Flash->error("Sorry, your account is inactive.");
                return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
            }
            if($identity->verified == 0)
            {
                $this->Flash->error("Sorry, your account is not verified.");
                return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
            }
        // redirect to /articles after login success
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Users',
            'action' => 'index',
        ]);

        return $this->redirect($redirect);
    }
    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid username or password'));
    }
}
    public function login12()
    {
        //$this->Authorization->skipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        
        // $this->Authorization->skipAuthorization();
         /*$cookie = ['email'=>'', 'password'=>'', 'remember_me'=>0];
    
          if ($this->request->getCookie('CookieAuth')) {
              $cookie = $this->request->getCookie('CookieAuth');
            //  debug('cookie');
          }
       
          // if remember_me
          if($this->request->getData('remember_me') == 1) {
        
             $this->response = $this->response->withCookie(new Cookie('CookieAuth'), $this->request->getData());
          }
          else {
              //$this->Cookie->delete('CookieAuth');
          }
          $this->set($cookie);*/
          
        
        $result = $this->Authentication->getResult();
        

        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $identity = $this->Authentication->getIdentity();

            /*$this->Authentication->setUser($user);*/
            if($identity->status == 0)
            {
                $this->Flash->error("Sorry, your account is inactive.");
                return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
            }
            if($identity->verified == 0)
            {
                $this->Flash->error("Sorry, your account is not verified.");
                return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
            }
            

             
            // redirect to /articles after login success
            /*$redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);*/
        }
         
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
     }
    public function logout()
    {
       // $this->Authorization->skipAuthorization();
       //$this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }  
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Companies'],
        ]);
        
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $token = Security::hash(Security::randomBytes(32));
            $user->token = $token;
            $user->role = '2';
            $user->status = '0';
            $user->verified = '0';

            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $mailer = new Mailer('default');
            $mailer->setTransport('smtp'); //your email configuration name
            $mailer->setFrom(['noreply[at]xyx.com' => 'myCake4'])
            ->setTo($email)
            ->setEmailFormat('html')
            ->setSubject('Verify New Account')
            ->deliver('Hi <br/>Please confirm your email link below<br/><a href="http://localhost/myCake4/users/verification/'.$token.'">Verification Email</a><br/>Thank you for registration.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    public function verification($token)
    {
        $userTable = TableRegistry::get('Users');
        $verify = $userTable->find('all')->where(['token'=>$token])->first();
        $verify->verified = '1';
        $verify->status = '1';
        $userTable->save($verify);
        $this->Flash->success(__('Your email has been verified, and please login now.'));
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function forgotpassword()
    {
    if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $token = Security::hash(Security::randomBytes(25));
            
            $userTable = TableRegistry::get('Users');
                if ($email == NULL) {
                    $this->Flash->error(__('Please insert your email address')); 
                } 
                if  ($user = $userTable->find('all')->where(['email'=>$email])->first()) { 
                    $user->token = $token;
                    if ($userTable->save($user)){
                        $mailer = new Mailer('default');
                        $mailer->setTransport('smtp');
                        $mailer->setFrom(['noreply[at]test.com' => 'myCake4'])
                        ->setTo($email)
                        ->setEmailFormat('html')
                        ->setSubject('Forgot Password Request')
                        ->deliver('Hello<br/>Please click link below to reset your password<br/><br/><a href="http://localhost:8765/users/resetpassword/'.$token.'">Reset Password</a>');
                    }
                    $this->Flash->success('Reset password link has been sent to your email ('.$email.'), please check your email');
                }
                if  ($total = $userTable->find('all')->where(['email'=>$email])->count()==0) {
                    $this->Flash->error(__('Email is not registered in system'));
                }
        }
    }

    public function resetpassword($token)
    {
        if($this->request->is('post')){
            $hasher = new DefaultPasswordHasher();
            $newPass = $hasher->hash($this->request->getData('password'));

            $userTable = TableRegistry::get('Users');
            $user = $userTable->find('all')->where(['token'=>$token])->first();
            $user->password = $newPass;
            if ($userTable->save($user)) {
                $this->Flash->success('Password successfully reset. Please login using your new password');
                return $this->redirect(['action'=>'login']);
            }
        }
    }
    public function userStatus($id=null,$status)
    {
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
        
        if($status == 1 )
            $user->status = 0;
        else
            $user->status = 1;
        
        if($this->Users->save($user))
        {
            $this->Flash->success(__('The users status has changed.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
