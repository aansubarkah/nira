<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TrainingsUsers Controller
 *
 * @property \App\Model\Table\TrainingsUsersTable $TrainingsUsers
 */
class TrainingsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Trainings', 'Users', 'Evidences']
        ];
        $trainingsUsers = $this->paginate($this->TrainingsUsers);

        $this->set(compact('trainingsUsers'));
        $this->set('_serialize', ['trainingsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Trainings User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainingsUser = $this->TrainingsUsers->get($id, [
            'contain' => ['Trainings', 'Users', 'Evidences']
        ]);

        $this->set('trainingsUser', $trainingsUser);
        $this->set('_serialize', ['trainingsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trainingsUser = $this->TrainingsUsers->newEntity();
        if ($this->request->is('post')) {
            $trainingsUser = $this->TrainingsUsers->patchEntity($trainingsUser, $this->request->data);
            if ($this->TrainingsUsers->save($trainingsUser)) {
                $this->Flash->success(__('The trainings user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trainings user could not be saved. Please, try again.'));
            }
        }
        $trainings = $this->TrainingsUsers->Trainings->find('list', ['limit' => 200]);
        $users = $this->TrainingsUsers->Users->find('list', ['limit' => 200]);
        $evidences = $this->TrainingsUsers->Evidences->find('list', ['limit' => 200]);
        $this->set(compact('trainingsUser', 'trainings', 'users', 'evidences'));
        $this->set('_serialize', ['trainingsUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trainings User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainingsUser = $this->TrainingsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainingsUser = $this->TrainingsUsers->patchEntity($trainingsUser, $this->request->data);
            if ($this->TrainingsUsers->save($trainingsUser)) {
                $this->Flash->success(__('The trainings user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trainings user could not be saved. Please, try again.'));
            }
        }
        $trainings = $this->TrainingsUsers->Trainings->find('list', ['limit' => 200]);
        $users = $this->TrainingsUsers->Users->find('list', ['limit' => 200]);
        $evidences = $this->TrainingsUsers->Evidences->find('list', ['limit' => 200]);
        $this->set(compact('trainingsUser', 'trainings', 'users', 'evidences'));
        $this->set('_serialize', ['trainingsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trainings User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainingsUser = $this->TrainingsUsers->get($id);
        if ($this->TrainingsUsers->delete($trainingsUser)) {
            $this->Flash->success(__('The trainings user has been deleted.'));
        } else {
            $this->Flash->error(__('The trainings user could not be deleted. Please, try again.'));
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

            $data = $this->TrainingsUsers->get($id);
            if ($data->user_id == $user_id) {
                $data->active = 0;
                $this->TrainingsUsers->save($data);
            }

            return $this->redirect(['controller' => 'trainings', 'action' => 'profile']);
        }
    }

}
