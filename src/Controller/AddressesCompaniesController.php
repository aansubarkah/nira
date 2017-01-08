<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AddressesCompanies Controller
 *
 * @property \App\Model\Table\AddressesCompaniesTable $AddressesCompanies
 */
class AddressesCompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Addresses', 'Companies']
        ];
        $addressesCompanies = $this->paginate($this->AddressesCompanies);

        $this->set(compact('addressesCompanies'));
        $this->set('_serialize', ['addressesCompanies']);
    }

    /**
     * View method
     *
     * @param string|null $id Addresses Company id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $addressesCompany = $this->AddressesCompanies->get($id, [
            'contain' => ['Addresses', 'Companies']
        ]);

        $this->set('addressesCompany', $addressesCompany);
        $this->set('_serialize', ['addressesCompany']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $addressesCompany = $this->AddressesCompanies->newEntity();
        if ($this->request->is('post')) {
            $addressesCompany = $this->AddressesCompanies->patchEntity($addressesCompany, $this->request->data);
            if ($this->AddressesCompanies->save($addressesCompany)) {
                $this->Flash->success(__('The addresses company has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The addresses company could not be saved. Please, try again.'));
            }
        }
        $addresses = $this->AddressesCompanies->Addresses->find('list', ['limit' => 200]);
        $companies = $this->AddressesCompanies->Companies->find('list', ['limit' => 200]);
        $this->set(compact('addressesCompany', 'addresses', 'companies'));
        $this->set('_serialize', ['addressesCompany']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Addresses Company id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $addressesCompany = $this->AddressesCompanies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $addressesCompany = $this->AddressesCompanies->patchEntity($addressesCompany, $this->request->data);
            if ($this->AddressesCompanies->save($addressesCompany)) {
                $this->Flash->success(__('The addresses company has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The addresses company could not be saved. Please, try again.'));
            }
        }
        $addresses = $this->AddressesCompanies->Addresses->find('list', ['limit' => 200]);
        $companies = $this->AddressesCompanies->Companies->find('list', ['limit' => 200]);
        $this->set(compact('addressesCompany', 'addresses', 'companies'));
        $this->set('_serialize', ['addressesCompany']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Addresses Company id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $addressesCompany = $this->AddressesCompanies->get($id);
        if ($this->AddressesCompanies->delete($addressesCompany)) {
            $this->Flash->success(__('The addresses company has been deleted.'));
        } else {
            $this->Flash->error(__('The addresses company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
