<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ChildCategories'],
        ];

         if($this->request->is('post')){
           $sKey = $this->request->getData('search_category');
           $categoryQuery = $this->Categories->find('parentcategory', [
            'conditions' => ["OR" => ['Categories.category LIKE' => '%'.$sKey.'%'
                          ]]
                      ]);
         }else{
            $categoryQuery = $this->Categories->find('parentcategory'); 
         } 
        $categories = $this->paginate($categoryQuery);

        $this->set(compact('categories'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['ParentCategories'],
        ]);

        $this->set(compact('category'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('post')) {
            
            $getcategory = $this->request->getData('category');
            $getmarkup = $this->request->getData('markup');
            $getstatus = $this->request->getData('status');
            $sub_category = $this->request->getData('sub_category');
            $category = $this->Categories->patchEntity($category, $this->request->getData());

            if ($this->Categories->save($category)) {
                $catRecord = $this->Categories->find('all')->where(['category'=>$getcategory])->first(); 
                if(isset($sub_category) && !empty($sub_category)){
                    $scArr = array();
                    foreach ($sub_category as $scat) {
                        
                        $scArr['category'] = $scat;
                        $scArr['markup'] = $getmarkup;
                        $scArr['status'] = $getstatus;
                        $scArr['parent_id'] = $catRecord->id;
                        $categorysb = $this->Categories->newEmptyEntity();
                        $categorysc = $this->Categories->patchEntity($categorysb, $scArr);
                        $this->Categories->save($categorysc);
                    }
                    //$this->Categories->saveManyOrFail($scArr);
                }
                
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        //$ParentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        
        $ParentCategories = $this->Categories->find('parentcategory')->combine('id','category');
        $this->set(compact('category', 'ParentCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['ChildCategories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {


            $getcategory = $this->request->getData('category');
            $getmarkup = $this->request->getData('markup');
            $getstatus = $this->request->getData('status');
            $sub_category = $this->request->getData('sub_category');

            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {

                if(isset($sub_category['exist']) && !empty($sub_category['exist'])){
                    $scArr = array();
                    foreach ($sub_category['exist'] as $sid => $scat) {
                        $subcategory = $this->Categories->get($sid);
                        
                        $scArr['category'] = $scat;
                        $scArr['markup'] = $getmarkup;
                        $scArr['status'] = $getstatus;
                        $scArr['parent_id'] = $id;

                        $categorysc = $this->Categories->patchEntity($subcategory, $scArr);
                        $this->Categories->save($categorysc);
                    }
                     unset($sub_category['exist']);
                    //$this->Categories->saveManyOrFail($scArr);
                }
                if(isset($sub_category) && !empty($sub_category)){
                    $scArr = array();
                    foreach ($sub_category as  $scat) {
                        
                        
                        $scArr['category'] = $scat;
                        $scArr['markup'] = $getmarkup;
                        $scArr['status'] = $getstatus;
                        $scArr['parent_id'] = $id;
                        $categorysb = $this->Categories->newEmptyEntity();
                        $categorysc = $this->Categories->patchEntity($categorysb, $scArr);
                        $this->Categories->save($categorysc);
                    }
                    //$this->Categories->saveManyOrFail($scArr);
                }     


                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $ParentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);

        $this->set(compact('category', 'ParentCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if(!empty($this->request->getData('sub_category'))){
                    if ( $this->request->is('ajax') ) {
                    $this->autoRender = false;       
                    $data = $this->request->input('json_decode');
                    if ( $this->Categories->delete($category) ) {
                         $status['status'] = "success";            
                        echo  json_encode($status);
                         $this->autoRender = false;
                        exit();
                    } 
                }
             }else{



        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }
        
            return $this->redirect(['action' => 'index']);    
        }
        
    }
}
