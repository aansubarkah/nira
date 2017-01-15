<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OfficesUsers Controller
 *
 * @property \App\Model\Table\OfficesUsersTable $OfficesUsers
 */
class OfficesUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Offices', 'Users']
        ];
        $officesUsers = $this->paginate($this->OfficesUsers);

        $this->set(compact('officesUsers'));
        $this->set('_serialize', ['officesUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Offices User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $officesUser = $this->OfficesUsers->get($id, [
            'contain' => ['Offices', 'Users']
        ]);

        $this->set('officesUser', $officesUser);
        $this->set('_serialize', ['officesUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $officesUser = $this->OfficesUsers->newEntity();
        if ($this->request->is('post')) {
            $officesUser = $this->OfficesUsers->patchEntity($officesUser, $this->request->data);
            if ($this->OfficesUsers->save($officesUser)) {
                $this->Flash->success(__('The offices user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The offices user could not be saved. Please, try again.'));
            }
        }
        $offices = $this->OfficesUsers->Offices->find('list', ['limit' => 200]);
        $users = $this->OfficesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('officesUser', 'offices', 'users'));
        $this->set('_serialize', ['officesUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Offices User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $officesUser = $this->OfficesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $officesUser = $this->OfficesUsers->patchEntity($officesUser, $this->request->data);
            if ($this->OfficesUsers->save($officesUser)) {
                $this->Flash->success(__('The offices user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The offices user could not be saved. Please, try again.'));
            }
        }
        $offices = $this->OfficesUsers->Offices->find('list', ['limit' => 200]);
        $users = $this->OfficesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('officesUser', 'offices', 'users'));
        $this->set('_serialize', ['officesUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Offices User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $officesUser = $this->OfficesUsers->get($id);
        if ($this->OfficesUsers->delete($officesUser)) {
            $this->Flash->success(__('The offices user has been deleted.'));
        } else {
            $this->Flash->error(__('The offices user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Profile Delete method
     *
     * @param string|null $id Emails User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function profileDelete($id = null)
    {
        if ($this->Auth->user()) {
            $user_id = $this->Auth->user('id');

            $data = $this->OfficesUsers->get($id);
            if ($data->user_id == $user_id) {
                $data->active = 0;
                $this->OfficesUsers->save($data);
            }

            return $this->redirect(['controller' => 'offices', 'action' => 'profile']);
        }
    }

}
