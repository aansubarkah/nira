<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AddressesOffices Controller
 *
 * @property \App\Model\Table\AddressesOfficesTable $AddressesOffices
 */
class AddressesOfficesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Addresses', 'Offices']
        ];
        $addressesOffices = $this->paginate($this->AddressesOffices);

        $this->set(compact('addressesOffices'));
        $this->set('_serialize', ['addressesOffices']);
    }

    /**
     * View method
     *
     * @param string|null $id Addresses Office id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $addressesOffice = $this->AddressesOffices->get($id, [
            'contain' => ['Addresses', 'Offices']
        ]);

        $this->set('addressesOffice', $addressesOffice);
        $this->set('_serialize', ['addressesOffice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $addressesOffice = $this->AddressesOffices->newEntity();
        if ($this->request->is('post')) {
            $addressesOffice = $this->AddressesOffices->patchEntity($addressesOffice, $this->request->data);
            if ($this->AddressesOffices->save($addressesOffice)) {
                $this->Flash->success(__('The addresses office has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The addresses office could not be saved. Please, try again.'));
            }
        }
        $addresses = $this->AddressesOffices->Addresses->find('list', ['limit' => 200]);
        $offices = $this->AddressesOffices->Offices->find('list', ['limit' => 200]);
        $this->set(compact('addressesOffice', 'addresses', 'offices'));
        $this->set('_serialize', ['addressesOffice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Addresses Office id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $addressesOffice = $this->AddressesOffices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $addressesOffice = $this->AddressesOffices->patchEntity($addressesOffice, $this->request->data);
            if ($this->AddressesOffices->save($addressesOffice)) {
                $this->Flash->success(__('The addresses office has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The addresses office could not be saved. Please, try again.'));
            }
        }
        $addresses = $this->AddressesOffices->Addresses->find('list', ['limit' => 200]);
        $offices = $this->AddressesOffices->Offices->find('list', ['limit' => 200]);
        $this->set(compact('addressesOffice', 'addresses', 'offices'));
        $this->set('_serialize', ['addressesOffice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Addresses Office id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $addressesOffice = $this->AddressesOffices->get($id);
        if ($this->AddressesOffices->delete($addressesOffice)) {
            $this->Flash->success(__('The addresses office has been deleted.'));
        } else {
            $this->Flash->error(__('The addresses office could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
