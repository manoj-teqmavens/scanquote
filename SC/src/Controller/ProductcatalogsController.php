<?php
declare(strict_types=1);

namespace App\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Http\CallbackStream;
use Cake\ORM\TableRegistry;
/*App::import('Vendor', 'PHPExcel', array('file' => 'PHPExcel'.DS.'PHPExcel.php'));
App::import('Vendor', 'PHPExcel_IOFactory', array('file' => 'PHPExcel'.DS.'PHPExcel'.DS.'IOFactory.php'));*/

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

        if($this->request->is('post')){
           $sKey = $this->request->getData('search_catalog');
            $productcatalogQuery = $this->Productcatalogs->find('all', [
    'conditions' => ["OR" => ['Productcatalogs.item LIKE' => '%'.$sKey.'%',
                          ]]]);
          
         }else{
          
                $productcatalogQuery = $this->Productcatalogs->find('all'); 
          
           
         }
        $productcatalogs = $this->paginate($productcatalogQuery);
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
            'contain' => ['Categories',  'Types','SubCategories'],
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
     /**
     * Uploaditem method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function uploaditem()
    {
       
        $productcatalog = $this->Productcatalogs->newEmptyEntity();
        //if ($this->request->getUploadedFiles()) {
        if(!empty($this->request->getData('item_file'))){
        $fileobject = $this->request->getData('item_file');

        $name = $fileobject->getClientFilename();
        $type = $fileobject->getClientMediaType();
        $size = $fileobject->getSize();
        $tmpName = $fileobject->getStream()->getMetadata('uri');
        $error = $fileobject->getError();
        $errorMsg = array();
        //$destination = UPLOAD_DIRECTORY . $fileobject->getClientFilename();
       // echo "destination".$destination;
        

        if (pathinfo($name, PATHINFO_EXTENSION) == 'csv') {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        /*$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
        $spreadsheet = $reader->load("05featuredemo.xlsx");*/
        
       // $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($tmpName);
        $worksheet = $spreadsheet->getActiveSheet();
        $isheader = 0;
        foreach ($worksheet->getRowIterator() as $row) {
          // Fetch data
          if($isheader > 0) {
              $cellIterator = $row->getCellIterator('A' ,'E');
              $cellIterator->setIterateOnlyExistingCells(false);
              $data = [];
              foreach ($cellIterator as $cell) {
                  $data[] = $cell->getValue();
                 
              }
               
               $productcatalogTable = TableRegistry::get('Productcatalogs');
               $item = $productcatalogTable->find('all',['fields' =>'id'])->where(['item'=>$data[1]]);
               $categoryTable = TableRegistry::get('Categories');
               $category = $categoryTable->find('all',['fields' =>'id'])->where(['category'=>$data[2]])->first(); 
               if(empty($category)){
                $errorMsg[] = $data[2];
               }
               
               
               $typeTable = TableRegistry::get('Types');
               $type = $typeTable->find('all',['fields' =>'id'])->where(['name'=>$data[3]])->first(); 
               $prodcat =  array();
             if(!empty($category)){
               if(isset($item) &&  !empty($item)){
                 
                 foreach ($item as $key => $itm) {
                        $query = $productcatalogTable->query();  
                    $query->update()
                        ->set(['is_deleted' => 1])
                        ->where(['id' => $itm->id])
                        ->execute();
                   }  
               }
                $productcatalog = $this->Productcatalogs->newEmptyEntity();
                $prodcat['item'] = $data[1];
                $prodcat['price'] = trim($data[4],"$");
                $prodcat['category_id'] = $category->id;
                $prodcat['type_id'] = $type->id;
                $prodcat['status'] = 1;
               $productcatalog = $this->Productcatalogs->patchEntity($productcatalog,  $prodcat);
               $this->Productcatalogs->save($productcatalog);
              
             }  
          } else 
          { $isheader = 1; }
        }
        
        if(!empty($errorMsg)) {
                foreach ($errorMsg as  $errmsg) {
                   $this->Flash->error(__('The item could not be added. Category not found '.$errmsg));  
                }
             } else{
                $this->Flash->success(__('The item has been saved successful.'));
             }
        // Existing files with the same name will be replaced.
        //$fileobject->moveTo($destination);

        // echo"<pre>";print_r($this->request->getUploadedFiles());die;
        //return $this->redirect(['action' => 'index']);
        }
       $this->set(compact('productcatalog'));  
    } 
    public function excel()
    {
      // Load the template file from the root folder
      $templateFile = WWW_ROOT . 'item.xlsx';
      $spreadsheet = IOFactory::load($templateFile);  // Add data in that file
      $templateSheet = $spreadsheet->getActiveSheet();
      $templateSheet->setCellValue('B1', 'Item SKU');  // Save the data in a stream
      $writer = new Xlsx($spreadsheet);
      $stream = new CallbackStream(function () use ($writer) {
       $writer->save('php://output');
      });  $filename = 'sample_'.date('ymd_His');
      $response = $this->response;  // Return the stream to the user
      return $response->withType('xlsx')
       ->withHeader('Content-Disposition', "attachment;filename=\"{$filename}.xlsx\"")
       ->withBody($stream);

       
    }  
}
