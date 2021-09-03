<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Estimators Controller
 *
 * @property \App\Model\Table\EstimatorsTable $Estimators
 * @method \App\Model\Entity\Estimator[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstimatorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies'],
        ];
        $estimators = $this->paginate($this->Estimators);

        $this->set(compact('estimators'));
    }

    /**
     * View method
     *
     * @param string|null $id Estimator id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estimator = $this->Estimators->get($id, [
            'contain' => ['Companies'],
        ]);

        $this->set(compact('estimator'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estimator = $this->Estimators->newEmptyEntity();
        if ($this->request->is('post')) {
            $estimator = $this->Estimators->patchEntity($estimator, $this->request->getData());
            if ($this->Estimators->save($estimator)) {
                $this->Flash->success(__('The estimator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estimator could not be saved. Please, try again.'));
        }
        $companies = $this->Estimators->Companies->find('list', [
            'keyField' => 'id',
            'valueField' => 'company_name'
        ], ['limit' => 200]);
        $this->set(compact('estimator', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estimator id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estimator = $this->Estimators->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estimator = $this->Estimators->patchEntity($estimator, $this->request->getData());
            if ($this->Estimators->save($estimator)) {
                $this->Flash->success(__('The estimator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estimator could not be saved. Please, try again.'));
        }
        $companies = $this->Estimators->Companies->find('list', ['limit' => 200]);
        $this->set(compact('estimator', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estimator id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estimator = $this->Estimators->get($id);
        if ($this->Estimators->delete($estimator)) {
            $this->Flash->success(__('The estimator has been deleted.'));
        } else {
            $this->Flash->error(__('The estimator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
