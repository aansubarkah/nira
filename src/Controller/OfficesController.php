<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Offices Controller
 *
 * @property \App\Model\Table\OfficesTable $Offices
 */
class OfficesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Regencies', 'ParentOffices']
        ];
        $offices = $this->paginate($this->Offices);

        $this->set(compact('offices'));
        $this->set('_serialize', ['offices']);
    }

    /**
     * View method
     *
     * @param string|null $id Office id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $office = $this->Offices->get($id, [
            'contain' => ['Categories', 'Regencies', 'ParentOffices', 'Addresses', 'Emails', 'Phones', 'Users', 'ChildOffices']
        ]);

        $this->set('office', $office);
        $this->set('_serialize', ['office']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $office = $this->Offices->newEntity();
        if ($this->request->is('post')) {
            $office = $this->Offices->patchEntity($office, $this->request->data);
            if ($this->Offices->save($office)) {
                $this->Flash->success(__('The office has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The office could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Offices->Categories->find('list', ['limit' => 200]);
        $regencies = $this->Offices->Regencies->find('list', ['limit' => 200]);
        $parentOffices = $this->Offices->ParentOffices->find('list', ['limit' => 200]);
        $addresses = $this->Offices->Addresses->find('list', ['limit' => 200]);
        $emails = $this->Offices->Emails->find('list', ['limit' => 200]);
        $phones = $this->Offices->Phones->find('list', ['limit' => 200]);
        $users = $this->Offices->Users->find('list', ['limit' => 200]);
        $this->set(compact('office', 'categories', 'regencies', 'parentOffices', 'addresses', 'emails', 'phones', 'users'));
        $this->set('_serialize', ['office']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Office id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $office = $this->Offices->get($id, [
            'contain' => ['Addresses', 'Emails', 'Phones', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $office = $this->Offices->patchEntity($office, $this->request->data);
            if ($this->Offices->save($office)) {
                $this->Flash->success(__('The office has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The office could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Offices->Categories->find('list', ['limit' => 200]);
        $regencies = $this->Offices->Regencies->find('list', ['limit' => 200]);
        $parentOffices = $this->Offices->ParentOffices->find('list', ['limit' => 200]);
        $addresses = $this->Offices->Addresses->find('list', ['limit' => 200]);
        $emails = $this->Offices->Emails->find('list', ['limit' => 200]);
        $phones = $this->Offices->Phones->find('list', ['limit' => 200]);
        $users = $this->Offices->Users->find('list', ['limit' => 200]);
        $this->set(compact('office', 'categories', 'regencies', 'parentOffices', 'addresses', 'emails', 'phones', 'users'));
        $this->set('_serialize', ['office']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Office id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $office = $this->Offices->get($id);
        if ($this->Offices->delete($office)) {
            $this->Flash->success(__('The office has been deleted.'));
        } else {
            $this->Flash->error(__('The office could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
