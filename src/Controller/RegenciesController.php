<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Regencies Controller
 *
 * @property \App\Model\Table\RegenciesTable $Regencies
 */
class RegenciesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Provinces']
        ];
        $regencies = $this->paginate($this->Regencies);

        $this->set(compact('regencies'));
        $this->set('_serialize', ['regencies']);
    }

    /**
     * View method
     *
     * @param string|null $id Regency id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $regency = $this->Regencies->get($id, [
            'contain' => ['Provinces', 'Addresses', 'Offices']
        ]);

        $this->set('regency', $regency);
        $this->set('_serialize', ['regency']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $regency = $this->Regencies->newEntity();
        if ($this->request->is('post')) {
            $regency = $this->Regencies->patchEntity($regency, $this->request->data);
            if ($this->Regencies->save($regency)) {
                $this->Flash->success(__('The regency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The regency could not be saved. Please, try again.'));
            }
        }
        $provinces = $this->Regencies->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('regency', 'provinces'));
        $this->set('_serialize', ['regency']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Regency id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $regency = $this->Regencies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $regency = $this->Regencies->patchEntity($regency, $this->request->data);
            if ($this->Regencies->save($regency)) {
                $this->Flash->success(__('The regency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The regency could not be saved. Please, try again.'));
            }
        }
        $provinces = $this->Regencies->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('regency', 'provinces'));
        $this->set('_serialize', ['regency']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Regency id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $regency = $this->Regencies->get($id);
        if ($this->Regencies->delete($regency)) {
            $this->Flash->success(__('The regency has been deleted.'));
        } else {
            $this->Flash->error(__('The regency could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
