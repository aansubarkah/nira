<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OfficesPhones Controller
 *
 * @property \App\Model\Table\OfficesPhonesTable $OfficesPhones
 */
class OfficesPhonesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Offices', 'Phones']
        ];
        $officesPhones = $this->paginate($this->OfficesPhones);

        $this->set(compact('officesPhones'));
        $this->set('_serialize', ['officesPhones']);
    }

    /**
     * View method
     *
     * @param string|null $id Offices Phone id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $officesPhone = $this->OfficesPhones->get($id, [
            'contain' => ['Offices', 'Phones']
        ]);

        $this->set('officesPhone', $officesPhone);
        $this->set('_serialize', ['officesPhone']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $officesPhone = $this->OfficesPhones->newEntity();
        if ($this->request->is('post')) {
            $officesPhone = $this->OfficesPhones->patchEntity($officesPhone, $this->request->data);
            if ($this->OfficesPhones->save($officesPhone)) {
                $this->Flash->success(__('The offices phone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The offices phone could not be saved. Please, try again.'));
            }
        }
        $offices = $this->OfficesPhones->Offices->find('list', ['limit' => 200]);
        $phones = $this->OfficesPhones->Phones->find('list', ['limit' => 200]);
        $this->set(compact('officesPhone', 'offices', 'phones'));
        $this->set('_serialize', ['officesPhone']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Offices Phone id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $officesPhone = $this->OfficesPhones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $officesPhone = $this->OfficesPhones->patchEntity($officesPhone, $this->request->data);
            if ($this->OfficesPhones->save($officesPhone)) {
                $this->Flash->success(__('The offices phone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The offices phone could not be saved. Please, try again.'));
            }
        }
        $offices = $this->OfficesPhones->Offices->find('list', ['limit' => 200]);
        $phones = $this->OfficesPhones->Phones->find('list', ['limit' => 200]);
        $this->set(compact('officesPhone', 'offices', 'phones'));
        $this->set('_serialize', ['officesPhone']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Offices Phone id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $officesPhone = $this->OfficesPhones->get($id);
        if ($this->OfficesPhones->delete($officesPhone)) {
            $this->Flash->success(__('The offices phone has been deleted.'));
        } else {
            $this->Flash->error(__('The offices phone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
