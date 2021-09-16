<?php
namespace App\Controller;
use Cake\Controller\Component;
class CompaniesController extends AppController{

    public function initialize():void
    {
      parent:: initialize(); 
      $this->loadComponent('Paginator'); 
      $this->loadComponent('RequestHandler');
      $this->loadComponent('Flash');
    }
    public function index(){
        
         if($this->request->is('post')){
           $sKey = $this->request->getData('search_company');
           $companiesQuery = $this->Companies->find('all', [
    'conditions' => ["OR" => ['Companies.company_name LIKE' => '%'.$sKey.'%',
                              'Companies.email LIKE' => '%'.$sKey.'%',
                              'Companies.contact_no LIKE' => '%'.$sKey.'%'
                          ]]
]);
         }else{
           $companiesQuery = $this->Companies->find(); 
         }
        
        $companies = $this->Paginator->paginate($companiesQuery);
        $this->set(compact('companies'));

    }
    public function add()
    {
        $company = $this->Companies->newEmptyEntity();
        $this->loadModel('Countries');
        //$this->loadModel('States');
        $countries_query = $this->getTableLocator()->get('Countries');
        //$states_query = $this->getTableLocator()->get('States');
        
        $countries = $countries_query->find()->all()->combine('id', 'name');
        $this->set(compact('countries'));
        
      //  $states = $states_query->find()->all()->combine('id', 'name');
        
    //	$this->set(compact('countries','states'));

        if($this->request->is('post')){
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            $company->user_id = 1;
            //echo "<pre>";print_r($company);die;
            if($this->Companies->save($company)){
                $this->Flash->success('Your company has been saved');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Unable to  Add Your Company');
        }
        $this->set('company',$company);
    }

    public function edit($id)
    {
        //$company = $this->Companies->findBySlug($slug)->firstorFail();
        //$company = $this->Companies->findById($id)->firstorFail();
        if($this->request->is('post') && $this->request->getData('search_estimator')){
           $sKey = $this->request->getData('search_estimator');
             $company = $this->Companies->get($id, [
            'contain' => [
                'Estimators' => [
                    'conditions' => [
                        'OR' => [
                            'Estimators.estimator_name LIKE' => '%' . $sKey . '%',
                            'Estimators.email LIKE' => '%' . $sKey . '%',
                            'Estimators.phone_no LIKE' => '%' . $sKey . '%',
                        ],
                    ],
                ],
            ],
        ]);
         }else{
                $company = $this->Companies->get($id, [
                    'contain' => ['Estimators'],
                ]);
         }  
        $this->loadModel('Countries');
        $this->loadModel('States');
        $this->loadModel('Cities');
        $countries_query = $this->getTableLocator()->get('Countries');
        $states_query = $this->getTableLocator()->get('States');
        $cities_query = $this->getTableLocator()->get('Cities');
        
        $countries = $countries_query->find()->all()->combine('id', 'name');
        $states = $states_query->find()->all()->combine('id', 'name');
        $cities = $cities_query->find()->all()->combine('id', 'name');
        $this->set(compact('countries'));
        $this->set(compact('states'));
        $this->set(compact('cities'));
        if($this->request->is(['post','put']) && empty($this->request->getData('search_estimator'))){
            $this->Companies->patchEntity($company, $this->request->getData());   
            if($this->Companies->save($company)){
                 $this->Flash->success('Your Company has been Updated Successfully '.$company->company_name);
                 return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error("Unable to update Your Company");
        }
        $this->set('company',$company);
    }
    public function delete($id){
        $this->request->allowMethod(['post','delete']);
        //$company = $this->Companies->findBySlug($slug)->firstorFail();
        $company = $this->Companies->findById($id)->firstorFail();
        if($this->Companies->delete($company)){
            $this->Flash->success('Your Company has been Deleted Successfully '.$company->company_name);
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error("Unable to Delete Your Company");
        return $this->redirect(['action' => 'index']);

    }
    public function view($id = null)
    {
        //$companie = $this->Companies->findById($id)->firstorFail();
        $companie = $this->Companies->get($id, [
            'contain' => ['Estimators','Jobs' => ['Estimators']],
        ]);
        //$companie = $this->Companies->get($id, [
        //    'contain' => ['estimators'],
        //]);
       //echo "<pre>";print_r($companie);die;
        $this->set(compact('companie'));
    }

    /**
	 * My own convention was to suffix AJAX only actions with "_ajax".
	 * Not really necessary, but can maybe distinguish such actions from
	 * the normal ones.
	 *
	 * This method provides the AJAX data chained_dropdowns() needs.
	 *
	 * @throws \Cake\Http\Exception\NotFoundException
	 * @return void
	 */
	public function countryStates() {
		$this->request->allowMethod('ajax');
        $id = (int)$this->request->getQuery('id');
        
		if (!$id) {
			throw new NotFoundException();
		}

		//$this->viewBuilder()->setClassName('Companies.Ajax');

		$this->loadModel('States');
        $states = $this->States->getListByCountry($id);
        
        $statesData = array();
        foreach($states as $state){
            $statesData[$state->id] = $state->name;
        }

        $this->set(compact('statesData'));
        return $this->render('Ajax/country_states');
        
    }

    /**
	 * My own convention was to suffix AJAX only actions with "_ajax".
	 * Not really necessary, but can maybe distinguish such actions from
	 * the normal ones.
	 *
	 * This method provides the AJAX data chained_dropdowns() needs.
	 *
	 * @throws \Cake\Http\Exception\NotFoundException
	 * @return void
	 */
	public function stateCities() {
		$this->request->allowMethod('ajax');
        $id = (int)$this->request->getQuery('id');
        
		if (!$id) {
			throw new NotFoundException();
		}

		//$this->viewBuilder()->setClassName('Companies.Ajax');

		$this->loadModel('Cities');
        $cities = $this->Cities->getListByState($id);
        
        $citiesData = array();
        foreach($cities as $city){
            $citiesData[$city->id] = $city->name;
        }

        $this->set(compact('citiesData'));
        return $this->render('Ajax/state_cities');
        
    }
    
}