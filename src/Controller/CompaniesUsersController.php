<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CompaniesUsers Controller
 *
 * @property \App\Model\Table\CompaniesUsersTable $CompaniesUsers
 */
class CompaniesUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies', 'Users']
        ];
        $companiesUsers = $this->paginate($this->CompaniesUsers);

        $this->set(compact('companiesUsers'));
        $this->set('_serialize', ['companiesUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Companies User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $companiesUser = $this->CompaniesUsers->get($id, [
            'contain' => ['Companies', 'Users']
        ]);

        $this->set('companiesUser', $companiesUser);
        $this->set('_serialize', ['companiesUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $companiesUser = $this->CompaniesUsers->newEntity();
        if ($this->request->is('post')) {
            $companiesUser = $this->CompaniesUsers->patchEntity($companiesUser, $this->request->data);
            if ($this->CompaniesUsers->save($companiesUser)) {
                $this->Flash->success(__('The companies user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The companies user could not be saved. Please, try again.'));
            }
        }
        $companies = $this->CompaniesUsers->Companies->find('list', ['limit' => 200]);
        $users = $this->CompaniesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('companiesUser', 'companies', 'users'));
        $this->set('_serialize', ['companiesUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Companies User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $companiesUser = $this->CompaniesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $companiesUser = $this->CompaniesUsers->patchEntity($companiesUser, $this->request->data);
            if ($this->CompaniesUsers->save($companiesUser)) {
                $this->Flash->success(__('The companies user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The companies user could not be saved. Please, try again.'));
            }
        }
        $companies = $this->CompaniesUsers->Companies->find('list', ['limit' => 200]);
        $users = $this->CompaniesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('companiesUser', 'companies', 'users'));
        $this->set('_serialize', ['companiesUser']);
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

            $data = $this->CompaniesUsers->get($id);
            if ($data->user_id == $user_id) {
                $data->active = 0;
                $this->CompaniesUsers->save($data);
            }

            return $this->redirect(['controller' => 'companies', 'action' => 'profile']);
        }
    }

}
