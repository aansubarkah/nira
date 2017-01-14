<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PhonesUsers Controller
 *
 * @property \App\Model\Table\PhonesUsersTable $PhonesUsers
 */
class PhonesUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Phones', 'Users']
        ];
        $phonesUsers = $this->paginate($this->PhonesUsers);

        $this->set(compact('phonesUsers'));
        $this->set('_serialize', ['phonesUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Phones User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phonesUser = $this->PhonesUsers->get($id, [
            'contain' => ['Phones', 'Users']
        ]);

        $this->set('phonesUser', $phonesUser);
        $this->set('_serialize', ['phonesUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phonesUser = $this->PhonesUsers->newEntity();
        if ($this->request->is('post')) {
            $phonesUser = $this->PhonesUsers->patchEntity($phonesUser, $this->request->data);
            if ($this->PhonesUsers->save($phonesUser)) {
                $this->Flash->success(__('The phones user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The phones user could not be saved. Please, try again.'));
            }
        }
        $phones = $this->PhonesUsers->Phones->find('list', ['limit' => 200]);
        $users = $this->PhonesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('phonesUser', 'phones', 'users'));
        $this->set('_serialize', ['phonesUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Phones User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phonesUser = $this->PhonesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phonesUser = $this->PhonesUsers->patchEntity($phonesUser, $this->request->data);
            if ($this->PhonesUsers->save($phonesUser)) {
                $this->Flash->success(__('The phones user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The phones user could not be saved. Please, try again.'));
            }
        }
        $phones = $this->PhonesUsers->Phones->find('list', ['limit' => 200]);
        $users = $this->PhonesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('phonesUser', 'phones', 'users'));
        $this->set('_serialize', ['phonesUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Phones User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phonesUser = $this->PhonesUsers->get($id);
        if ($this->PhonesUsers->delete($phonesUser)) {
            $this->Flash->success(__('The phones user has been deleted.'));
        } else {
            $this->Flash->error(__('The phones user could not be deleted. Please, try again.'));
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

            $phone = $this->PhonesUsers->get($id);
            if ($phone->user_id == $user_id) {
                $phone->active = 0;
                $this->PhonesUsers->save($phone);
            }

            return $this->redirect(['controller' => 'emails', 'action' => 'profile']);
        }
    }
}
