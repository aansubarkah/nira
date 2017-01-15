<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EducationsUsers Controller
 *
 * @property \App\Model\Table\EducationsUsersTable $EducationsUsers
 */
class EducationsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Educations', 'Users', 'Evidences']
        ];
        $educationsUsers = $this->paginate($this->EducationsUsers);

        $this->set(compact('educationsUsers'));
        $this->set('_serialize', ['educationsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Educations User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $educationsUser = $this->EducationsUsers->get($id, [
            'contain' => ['Educations', 'Users', 'Evidences']
        ]);

        $this->set('educationsUser', $educationsUser);
        $this->set('_serialize', ['educationsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $educationsUser = $this->EducationsUsers->newEntity();
        if ($this->request->is('post')) {
            $educationsUser = $this->EducationsUsers->patchEntity($educationsUser, $this->request->data);
            if ($this->EducationsUsers->save($educationsUser)) {
                $this->Flash->success(__('The educations user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The educations user could not be saved. Please, try again.'));
            }
        }
        $educations = $this->EducationsUsers->Educations->find('list', ['limit' => 200]);
        $users = $this->EducationsUsers->Users->find('list', ['limit' => 200]);
        $evidences = $this->EducationsUsers->Evidences->find('list', ['limit' => 200]);
        $this->set(compact('educationsUser', 'educations', 'users', 'evidences'));
        $this->set('_serialize', ['educationsUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Educations User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $educationsUser = $this->EducationsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $educationsUser = $this->EducationsUsers->patchEntity($educationsUser, $this->request->data);
            if ($this->EducationsUsers->save($educationsUser)) {
                $this->Flash->success(__('The educations user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The educations user could not be saved. Please, try again.'));
            }
        }
        $educations = $this->EducationsUsers->Educations->find('list', ['limit' => 200]);
        $users = $this->EducationsUsers->Users->find('list', ['limit' => 200]);
        $evidences = $this->EducationsUsers->Evidences->find('list', ['limit' => 200]);
        $this->set(compact('educationsUser', 'educations', 'users', 'evidences'));
        $this->set('_serialize', ['educationsUser']);
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

            $data = $this->EducationsUsers->get($id);
            if ($data->user_id == $user_id) {
                $data->active = 0;
                $this->EducationsUsers->save($data);
            }

            return $this->redirect(['controller' => 'educations', 'action' => 'profile']);
        }
    }

}
