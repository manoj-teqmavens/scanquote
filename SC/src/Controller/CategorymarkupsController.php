<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Categorymarkups Controller
 *
 * @property \App\Model\Table\CategorymarkupsTable $Categorymarkups
 * @method \App\Model\Entity\Categorymarkup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategorymarkupsController extends AppController
{
     /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Companies');
        $this->loadModel('Productcatalogs');
        $this->loadModel('Itemsmarkups');
        
     }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        /*$this->paginate = [
            'contain' => ['Companies', 'Categories'],
        ];*/
        $this->paginate = [
            'contain' => ['Categorymarkups', 'Itemsmarkups'],
        ];
        //$categorymarkups = $this->paginate($this->Categorymarkups);
        $categorymarkups = $this->paginate($this->Companies);
        
        $this->set(compact('categorymarkups'));
    }

    /**
     * View method
     *
     * @param string|null $id Categorymarkup id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categorymarkup = $this->Categorymarkups->get($id, [
            'contain' => ['Companies', 'Categories'],
        ]);

        $this->set(compact('categorymarkup'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //$this->loadModel('Companies');
        $this->loadModel('Categories');
        $this->loadModel('Itemsmarkups');
        $this->loadModel('Productcatalogs');
        
        $categorymarkup = $this->Categorymarkups->newEmptyEntity();
        if ($this->request->is('post')) {
            $markcategory = array();
            $markitem = array();
            $saveRecord = false;
            $category_id = $this->request->getData('category_id');
            $item_id = $this->request->getData('item_id');
            if(isset($category_id) && !empty($category_id)){
                foreach ($this->request->getData('category_id') as $k => $catval) {
                    $markcategory['company_id'] = $this->request->getData('company_id');
                    $markcategory['category_id'] = $catval;
                    $markcategory['mark_up'] = $this->request->getData('category_mark_up')[$k];
                    $markcategory['status'] = $this->request->getData('category_status')[$k];
                    $categorymarkup = $this->Categorymarkups->newEmptyEntity();
                    $categorymarkup = $this->Categorymarkups->patchEntity($categorymarkup, $markcategory);        
                    if($this->Categorymarkups->save($categorymarkup)){

                        $session = $this->request->getSession();
                        $session->write('cat_id', $categorymarkup->id);
                        $saveRecord = true;
                    }
                }
            }
            if(isset($item_id) && !empty($item_id)){
                foreach ($item_id as $ke => $itmval) {
                    $markitem['company_id'] = $this->request->getData('company_id');
                    $markitem['item_id'] = $itmval;
                    $markitem['catmark_id'] = $session->read('cat_id');
                    $markitem['markup'] = $this->request->getData('item_mark_up')[$k];
                    $markitem['status'] = $this->request->getData('item_status')[$k];
                    $itemmarkup = $this->Itemsmarkups->newEmptyEntity();
                    $itemmarkup = $this->Itemsmarkups->patchEntity($itemmarkup, $markitem);        
                    if($this->Itemsmarkups->save($itemmarkup)){
                        $saveRecord = true;
                    }
                }
            }
            if ($saveRecord) {
                $this->Flash->success(__('The markup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The markup could not be saved. Please, try again.'));
        }
        
        //$companies = $this->Categorymarkups->Companies->find('list', ['limit' => 200]);
        $companies = $this->Companies->find()->all()->combine('id', 'company_name');
        //$items = $this->Productcatalogs->find()->distinct('item')->all()->combine('id', 'item');
       // $items = $this->Productcatalogs->find('all',['fields'=>['id','DISTINCT item']]);
        

        $items = $this->Productcatalogs->find()->select(['item'])->distinct(['item'])->combine('id','item');
        
        
        
       
        //$categories = $this->Categorymarkups->Categories->find('parentcategory', ['limit' => 200]);
        
        $categories = $this->Categories->find('parentcategory')->combine('id','category');
        
        $this->set(compact('categorymarkup', 'companies', 'categories','items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Categorymarkup id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Itemsmarkups');
        /*$categorymarkup = $this->Categorymarkups->get($id, [
            'contain' => ['Itemsmarkups'],
        ]);*/
        $categorymarkup = $this->Companies->get($id,[
             'contain' => ['Categorymarkups', 'Itemsmarkups'],
        ]);
      //  echo "<pre>";print_r($categorymarkup);die;
        //$itemsmarkup = $this->Itemsmarkups->findByCatmarkId($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //echo "<pre>";print_r($this->request->getData());die;
            $category_id = $this->request->getData('category_id');
            $item_id = $this->request->getData('item_id');
            if(isset($category_id['exist']) && !empty($category_id['exist'])){
                    $markcategory = array();
                    foreach ($category_id['exist'] as $k => $catval) {
                          $categorymarkup = $this->Categorymarkups->get($k);
                        $markcategory['company_id'] = $this->request->getData('company_id');
                        $markcategory['category_id'] = $catval;
                        $markcategory['mark_up'] = $this->request->getData('category_mark_up')['exist'][$k];
                        $markcategory['status'] = $this->request->getData('category_status')['exist'][$k];
                       // $categorymarkup = $this->Categorymarkups->newEmptyEntity();
                        $categorymarkup = $this->Categorymarkups->patchEntity($categorymarkup, $markcategory);        
                        $this->Categorymarkups->save($categorymarkup);

                    }
                     unset($category_id['exist']);
                    //$this->Categories->saveManyOrFail($scArr);
                     if(isset($category_id) && !empty($category_id)){
                        $mrkcategory = array();
                    foreach ($category_id as $ka => $catvul) {
                        if(isset($catvul) && !empty($catvul)){
                            $mrkcategory['company_id'] = $this->request->getData('company_id');
                            $mrkcategory['category_id'] = $catvul;
                            $mrkcategory['mark_up'] = $this->request->getData('category_mark_up')[$k];
                            $mrkcategory['status'] = $this->request->getData('category_status')[$k];
                            $categorymarkup = $this->Categorymarkups->newEmptyEntity();
                            $categorymkup = $this->Categorymarkups->patchEntity($categorymarkup, $mrkcategory);        
                            $this->Categorymarkups->save($categorymkup);        
                        }
                        

                    }
                }
                }
              if(isset($item_id['exist']) && !empty($item_id['exist'])){
                    $markitem = array();
                    foreach ($item_id['exist'] as $k => $itmval) {
                        $itemmarkup = $this->Itemsmarkups->get($k);
                        $markitem['company_id'] = $this->request->getData('company_id');
                        $markitem['item_id'] = $itmval;
                        $markitem['markup'] = $this->request->getData('item_mark_up')['exist'][$k];
                        $markitem['status'] = $this->request->getData('item_status')['exist'][$k];
                        //$itemmarkup = $this->Itemsmarkups->newEmptyEntity();
                        $itemmarkup = $this->Itemsmarkups->patchEntity($itemmarkup, $markitem);        
                        $this->Itemsmarkups->save($itemmarkup);

                    }
                     unset($item_id['exist']);
                    //$this->Categories->saveManyOrFail($scArr);
                     if(isset($item_id) && !empty($item_id)){
                        $mrkitem = array();
                    foreach ($category_id as $ka => $catvul) {
                        if(isset($catvul) && !empty($catvul)){
                            $mrkitem['company_id'] = $this->request->getData('company_id');
                            $mrkitem['item_id'] = $catvul;
                            $mrkitem['markup'] = $this->request->getData('item_mark_up')[$k];
                            $mrkitem['status'] = $this->request->getData('item_status')[$k];
                            $itemmarkup = $this->Itemsmarkups->newEmptyEntity();
                            $itemmarkup = $this->Itemsmarkups->patchEntity($itemmarkup, $mrkitem);        
                            $this->Itemsmarkups->save($itemmarkup);        
                        }
                        

                    }
                }
                }   
            if (true) {
                $this->Flash->success(__('The categorymarkup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorymarkup could not be saved. Please, try again.'));
        }
        //$companies = $this->Categorymarkups->Companies->find('list', ['limit' => 200]);
        $items = $this->Productcatalogs->find()->select(['item'])->distinct(['item'])->combine('id','item');
        $companies = $this->Companies->find()->all()->combine('id', 'company_name');
        $categories = $this->Categorymarkups->Categories->find('list', ['limit' => 200]);
        $this->set(compact('categorymarkup', 'companies', 'categories','items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Categorymarkup id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categorymarkup = $this->Categorymarkups->get($id);
        if ($this->Categorymarkups->delete($categorymarkup)) {
            $this->Flash->success(__('The categorymarkup has been deleted.'));
        } else {
            $this->Flash->error(__('The categorymarkup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Categorymarkup id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deletecategoryMarkup($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categorymarkup = $this->Categorymarkups->get($id);
        if(!empty($this->request->getData('markup_category'))){
                    if ( $this->request->is('ajax') ) {
                    $this->autoRender = false;       
                    $data = $this->request->input('json_decode');
                    if ( $this->Categorymarkups->delete($categorymarkup) ) {
                        //die('555555555555');
                         $status['status'] = "success";            
                        echo  json_encode($status);
                         $this->autoRender = false;
                        exit();
                    } 
                }
             }
        
    
    }
    /**
     * Delete method
     *
     * @param string|null $id Categorymarkup id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteitemMarkup($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $Itemsmarkup = $this->Itemsmarkups->get($id);
        if(!empty($this->request->getData('markup_item'))){
                    if ( $this->request->is('ajax') ) {
                    $this->autoRender = false;       
                    $data = $this->request->input('json_decode');
                    if ( $this->Itemsmarkups->delete($Itemsmarkup) ) {
                         $status['status'] = "success";            
                        echo  json_encode($status);
                         $this->autoRender = false;
                        exit();
                    } 
                }
             }
        
    
    }
    
}
