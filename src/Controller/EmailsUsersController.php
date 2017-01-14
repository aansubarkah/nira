<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmailsUsers Controller
 *
 * @property \App\Model\Table\EmailsUsersTable $EmailsUsers
 */
class EmailsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Emails', 'Users']
        ];
        $emailsUsers = $this->paginate($this->EmailsUsers);

        $this->set(compact('emailsUsers'));
        $this->set('_serialize', ['emailsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Emails User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emailsUser = $this->EmailsUsers->get($id, [
            'contain' => ['Emails', 'Users']
        ]);

        $this->set('emailsUser', $emailsUser);
        $this->set('_serialize', ['emailsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emailsUser = $this->EmailsUsers->newEntity();
        if ($this->request->is('post')) {
            $emailsUser = $this->EmailsUsers->patchEntity($emailsUser, $this->request->data);
            if ($this->EmailsUsers->save($emailsUser)) {
                $this->Flash->success(__('The emails user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emails user could not be saved. Please, try again.'));
            }
        }
        $emails = $this->EmailsUsers->Emails->find('list', ['limit' => 200]);
        $users = $this->EmailsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('emailsUser', 'emails', 'users'));
        $this->set('_serialize', ['emailsUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Emails User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emailsUser = $this->EmailsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emailsUser = $this->EmailsUsers->patchEntity($emailsUser, $this->request->data);
            if ($this->EmailsUsers->save($emailsUser)) {
                $this->Flash->success(__('The emails user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emails user could not be saved. Please, try again.'));
            }
        }
        $emails = $this->EmailsUsers->Emails->find('list', ['limit' => 200]);
        $users = $this->EmailsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('emailsUser', 'emails', 'users'));
        $this->set('_serialize', ['emailsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Emails User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emailsUser = $this->EmailsUsers->get($id);
        if ($this->EmailsUsers->delete($emailsUser)) {
            $this->Flash->success(__('The emails user has been deleted.'));
        } else {
            $this->Flash->error(__('The emails user could not be deleted. Please, try again.'));
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

            $email = $this->EmailsUsers->get($id);
            if ($email->user_id == $user_id) {
                $email->active = 0;
                $this->EmailsUsers->save($email);
            }

            return $this->redirect(['controller' => 'emails', 'action' => 'profile']);
        }
    }
}
