<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Date;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Addresses', 'Certificates', 'Companies', 'Educations', 'Emails', 'Offices', 'Phones', 'Trainings']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $addresses = $this->Users->Addresses->find('list', ['limit' => 200]);
        $certificates = $this->Users->Certificates->find('list', ['limit' => 200]);
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $educations = $this->Users->Educations->find('list', ['limit' => 200]);
        $emails = $this->Users->Emails->find('list', ['limit' => 200]);
        $offices = $this->Users->Offices->find('list', ['limit' => 200]);
        $phones = $this->Users->Phones->find('list', ['limit' => 200]);
        $trainings = $this->Users->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'addresses', 'certificates', 'companies', 'educations', 'emails', 'offices', 'phones', 'trainings'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Addresses', 'Certificates', 'Companies', 'Educations', 'Emails', 'Offices', 'Phones', 'Trainings']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $addresses = $this->Users->Addresses->find('list', ['limit' => 200]);
        $certificates = $this->Users->Certificates->find('list', ['limit' => 200]);
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $educations = $this->Users->Educations->find('list', ['limit' => 200]);
        $emails = $this->Users->Emails->find('list', ['limit' => 200]);
        $offices = $this->Users->Offices->find('list', ['limit' => 200]);
        $phones = $this->Users->Phones->find('list', ['limit' => 200]);
        $trainings = $this->Users->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'addresses', 'certificates', 'companies', 'educations', 'emails', 'offices', 'phones', 'trainings'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     *  Before Filter method
     *
     *
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['register', 'logout']);
    }

    /**
    * Register method
    *
    * @param string
    * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
    */
    public function register()
    {
        $user = $this->Users->newEntity();
        $email = $this->Users->Emails->newEntity();

        if ($this->request->is('post')) {
            $date = new Date(date('Y-m-d'));

            $data = $this->request->data;
            $data['active'] = true;
            $data['birthday'] = $date->format('Y-m-d');
            $data['birthplace'] = 'Surabaya';
            $data['localnumber'] = 0;
            $data['marital'] = false;
            $data['name'] = $data['fullname'];
            $data['nik'] = 0;
            $data['role_id'] = 3;
            $data['sex'] = false;
            $data['verified'] = false;

            // insert new email
            $email->name = $data['email'];

            $user = $this->Users->patchEntity($user, $data);
            $user->emails = [$email];

            if ($this->Users->save($user)) {
            } else {
                $errors = ['Terjadi Kesalahan Saat Pendaftaran'];
                $this->set(compact('errors'));
                $this->set('_serialize', ['errors']);
            }
        }
        $this->viewBuilder()->layout('user');
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function profile()
    {
        $this->set('title', 'Profil');
    }
}
