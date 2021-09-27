<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Productcatalogs Controller
 *
 * @property \App\Model\Table\ProductcatalogsTable $Productcatalogs
 * @method \App\Model\Entity\Productcatalog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductcatalogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Types'],
        ];
        $productcatalogs = $this->paginate($this->Productcatalogs);
        $this->set(compact('productcatalogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Productcatalog id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productcatalog = $this->Productcatalogs->get($id, [
            'contain' => ['Categories',  'Types'],
        ]);


        $this->set(compact('productcatalog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productcatalog = $this->Productcatalogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $productcatalog = $this->Productcatalogs->patchEntity($productcatalog, $this->request->getData());
            if ($this->Productcatalogs->save($productcatalog)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $categories = $this->Productcatalogs->Categories->find('parentcategory')->combine('id','category');
        //$ParentCategories = $this->Categories->find('parentcategory')->combine('id','category');
        $types = $this->Productcatalogs->Types->find('list', ['limit' => 200]);
        $this->set(compact('productcatalog', 'categories',  'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Productcatalog id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productcatalog = $this->Productcatalogs->get($id, [
            'contain' => [],
        ]);
        //echo "<pre>";print_r($productcatalog);die;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productcatalog = $this->Productcatalogs->patchEntity($productcatalog, $this->request->getData());
            if ($this->Productcatalogs->save($productcatalog)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $categories = $this->Productcatalogs->Categories->find('parentcategory')->combine('id','category');
        $subcategories = $this->Productcatalogs->Categories->find('all', ['conditions' => ['parent_id' =>  $productcatalog->category_id]])->combine('id','category');
        //$categories = $this->Productcatalogs->Categories->find('list', ['limit' => 200]);
        $types = $this->Productcatalogs->Types->find('list', ['limit' => 200]);
        $this->set(compact('productcatalog', 'categories', 'subcategories' , 'types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Productcatalog id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productcatalog = $this->Productcatalogs->get($id);
        if ($this->Productcatalogs->delete($productcatalog)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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
    public function subcategoryList() {
        $this->request->allowMethod('ajax');
        $id = (int)$this->request->getQuery('id');
        
        if (!$id) {
            throw new NotFoundException();
        }

        //$this->viewBuilder()->setClassName('Companies.Ajax');

        $this->loadModel('Categories');
        $categories = $this->Categories->getListByCategory($id);
        
        $categoryData = array();
        foreach($categories as $category){
            $categoryData[$category->id] = $category->category;
        }

        $this->set(compact('categoryData'));
        return $this->render('Ajax/category_subcategory');
        
    }
}
