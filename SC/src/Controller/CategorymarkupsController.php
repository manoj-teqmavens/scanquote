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
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies', 'Categories'],
        ];
        $categorymarkups = $this->paginate($this->Categorymarkups);

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
        $categorymarkup = $this->Categorymarkups->newEmptyEntity();
        if ($this->request->is('post')) {
            $categorymarkup = $this->Categorymarkups->patchEntity($categorymarkup, $this->request->getData());
            if ($this->Categorymarkups->save($categorymarkup)) {
                $this->Flash->success(__('The categorymarkup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorymarkup could not be saved. Please, try again.'));
        }
        $companies = $this->Categorymarkups->Companies->find('list', ['limit' => 200]);
        $categories = $this->Categorymarkups->Categories->find('list', ['limit' => 200]);
        $this->set(compact('categorymarkup', 'companies', 'categories'));
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
        $categorymarkup = $this->Categorymarkups->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categorymarkup = $this->Categorymarkups->patchEntity($categorymarkup, $this->request->getData());
            if ($this->Categorymarkups->save($categorymarkup)) {
                $this->Flash->success(__('The categorymarkup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorymarkup could not be saved. Please, try again.'));
        }
        $companies = $this->Categorymarkups->Companies->find('list', ['limit' => 200]);
        $categories = $this->Categorymarkups->Categories->find('list', ['limit' => 200]);
        $this->set(compact('categorymarkup', 'companies', 'categories'));
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
}
