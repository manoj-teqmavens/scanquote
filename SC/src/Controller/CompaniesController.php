<?php
namespace App\Controller;
use Cake\Controller\Component;
class CompaniesController extends AppController{
    public function initialize():void
    {
      parent:: initialize(); 
      $this->loadComponent('Paginator'); 
      $this->loadComponent('Flash');
    }
    public function index(){
        $companies = $this->Paginator->paginate($this->Companies->find());
        $this->set(compact('companies'));

    }
    public function add()
    {
        $company = $this->Companies->newEmptyEntity();
        if($this->request->is('post')){
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            //echo "<pre>";print_r($company);die;
            $company->user_id = 1;
            if($this->Companies->save($company)){
                $this->Flash->success('Your company has been saved');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Unable to  Add Your Company');
        }
        $this->set('company',$company);
    }

    public function edit($slug)
    {
        $company = $this->Companies->findBySlug($slug)->firstorFail();
        if($this->request->is(['post','put'])){
            $this->Companies->patchEntity($company, $this->request->getData());   
            if($this->Companies->save($company)){
                 $this->Flash->success('Your Company has been Updated Successfully '.$company->company_name);
                 return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error("Unable to update Your Company");
        }
        $this->set('company',$company);
    }
    public function delete($slug){
        $this->request->allowMethod(['post','delete']);
        $company = $this->Companies->findBySlug($slug)->firstorFail();
        if($this->Companies->delete($company)){
            $this->Flash->success('Your Company has been Deleted Successfully '.$company->company_name);
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error("Unable to Delete Your Company");
        return $this->redirect(['action' => 'index']);

    }
    public function view($slug = null)
    {
        $companie = $this->Companies->findBySlug($slug)->firstorFail();
        $this->set(compact('companie'));
    }
}