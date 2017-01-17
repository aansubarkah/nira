<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Date;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public $limit = 10;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['users', 'Pengguna']
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $query = $this->Users->find('all', [
            'conditions' => ['Users.active' => 1],
            'contain' => [
                'Emails' => ['conditions' => ['Emails.active' => 1]],
                'Roles',
            ],
            'limit' => $this->limit
        ]);

        $querySearchOld = 'verifikasi:semua level:semua';
        if ($this->request->query('search'))
        {
            $querySearchOld = strtolower($this->request->query('search'));
            $querySearch = $querySearchOld;

            if (strpos($querySearch, 'verifikasi:sudah') !== false) {
                $verifiedSearch = 1;
                $querySearch = str_replace('verifikasi:sudah', '', $querySearch);
            }
            if (strpos($querySearch, 'verifikasi:belum') !== false) {
                $verifiedSearch = 0;
                $querySearch = str_replace('verifikasi:belum', '', $querySearch);
            }
            if (strpos($querySearch, 'verifikasi:semua') !== false) {
                $querySearch = str_replace('verifikasi:semua', '', $querySearch);
            }

            if (strpos($querySearch, 'level:administrator') !== false) {
                $roleSearch = 1;
                $querySearch = str_replace('level:administrator', '', $querySearch);
            }
            if (strpos($querySearch, 'level:pengguna') !== false) {
                $roleSearch = 2;
                $querySearch = str_replace('level:pengguna', '', $querySearch);
            }
            if (strpos($querySearch, 'level:semua') !== false) {
                $querySearch = str_replace('level:semua', '', $querySearch);
            }

            $querySearch = trim($querySearch);

            $queryArray = [
                'LOWER(fullname) LIKE' => '%' . $querySearch . '%'
            ];

            if (strpos($querySearchOld, 'verifikasi:sudah') !== false || strpos($querySearchOld, 'verifikasi:belum') !== false) {
                $queryArray['verified = '] = $verifiedSearch;
            }
            if (strpos($querySearchOld, 'level:administrator') !== false || strpos($querySearchOld, 'level:pengguna') !== false) {
                $queryArray['role_id = '] = $roleSearch;
            }

            $query->where($queryArray);
        }
        if ($this->request->query('sort'))
        {
            $query->order([
                $this->request->query('sort') => $this->request->query('direction')
            ]);
        } else {
            $query->order(['fullname' => 'ASC']);
        }
        $this->paginate = ['limit' => $this->limit];
        /*$this->paginate = [
            'contain' => ['Senders', 'Users', 'Vias'],
            'order' => ['date' => 'DESC'],
            'limit' => $this->limit
        ];*/
        $breadcrumbs = $this->breadcrumbs;
        $this->set('breadcrumbs', $breadcrumbs);

        $users = $this->paginate($query);
        $this->set('limit', $this->limit);
        //$this->set('isShowAddButton', true);
        $this->set('querySearchOld', $querySearchOld);

        $this->set('title', 'Daftar Pengguna');
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
        $user = $this->Users->get($id);
        $user->active = 0;
        $this->Users->save($user);

        return $this->redirect(['action' => 'index']);

        /*$this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);*/
    }

    /**
     * Verify method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function verify($id = null)
    {
        $user = $this->Users->get($id);
        $user->verified = 1;
        $this->Users->save($user);

        //$this->sendVerifiedEmail($id);

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
            $this->set('isLoginError', true);
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        $this->viewBuilder()->layout('login');
        $this->set('title', 'Login');
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function profile()
    {
        if ($this->Auth->user()) {
            $TrainingsUsers = TableRegistry::get('TrainingsUsers');
            $CertificatesUsers = TableRegistry::get('CertificatesUsers');

            $id = $this->Auth->user('id');
            $profile = $this->Users->get($id, [
                'contain' => [
                    'Emails',
                    'Phones',
                    'Offices',
                    'Offices.Categories',
                    'Addresses',
                    'Educations',
                    'Educations.Colleges',
                    'Educations.Levels',
                    'Companies'
                ]
            ]);

            $trainings = $TrainingsUsers->find('all', [
                'contain' => ['Trainings', 'Trainings.Issuers'],
                'conditions' => ['TrainingsUsers.user_id' => $this->Auth->user('id'), 'TrainingsUsers.active' => 1],
                'order' => ['TrainingsUsers.created' => 'DESC'],
                'limit' => 5
            ]);

            $certificates = $CertificatesUsers->find('all', [
                'contain' => ['Certificates', 'Certificates.Issuers'],
                'condition' => ['CertificatesUsers.user_id' => $this->Auth->user('id'), 'CertificatesUsers.active' => 1],
                'order' => ['CertificatesUsers.held' => 'DESC'],
                'limit' => 5
            ]);

            $breadcrumbs = $this->breadcrumbs;
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set(compact('profile', $profile));
            $this->set(compact('trainings', $trainings));
            $this->set(compact('certificates', $certificates));
            $this->set('title', 'Profil');
        }
    }

    public function profileEdit()
    {
        if ($this->Auth->user()) {
            $id = $this->Auth->user('id');

            $profile = $this->Users->get($id);
            if ($this->request->is(['patch', 'post', 'put'])) {
                // reformat birthday date
                $date = new Date($this->request->data['birthday']);
                $this->request->data['birthday'] = $date->format('Y-m-d');

                $profile = $this->Users->patchEntity($profile, $this->request->data);
                if ($this->Users->save($profile)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'profile']);
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            }

            $birthday = new Date($profile['birthday']);
            $birth = $birthday->format('d-m-Y');
            $this->set('birth', $birth);
            $breadcrumbs[] = ['profileEdit', 'Ubah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set(compact('profile', $profile));

            $this->set('title', 'Profil Ubah');
        }
    }

    private function sendVerifiedEmail($userId)
    {
        // get user info
        $user = $this->Users->get($userId, [
            'contain' => ['Emails']
        ]);

        if (count($user['emails']) > 0) {
            Email::configTransport('gmail', [
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'username' => 'serverppnijatim01@gmail.com',
                'password' => 'G4tewaywaru',
                'className' => 'Smtp',
                'tls' => true
            ]);

            foreach ($user['emails'] as $t) {
                if (!empty($t['name'])) {
                    $email = new Email();
                    $email->transport('gmail');

                    $email->viewVars(['title' => 'Verifikasi Profil Perawat', 'person' => $user]);
                    $email->template('verified', 'default')
                        ->helpers(['Url', 'Time'])
                        ->emailFormat('html')
                        ->from(['serverppnijatim01@gmail.com' => 'Profil Perawat PPNI Jatim'])
                        ->to($t['name'])
                        ->subject('Verifikasi Profil Perawat')
                        ->send();
                }
            }
        }
    }

    /**
     * Change Password method
     *
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function changePassword()
    {
        if ($this->Auth->user()) {
            $this->set('title', 'Pengguna');
            $breadcrumbs = $this->breadcrumbs;
            array_push($breadcrumbs, [
                'changePassword/',
                'Ubah Password'
            ]);
            $this->set('breadcrumbs', $breadcrumbs);

            $id = $this->Auth->user('id');
            $editPassword = $this->Users->get($id);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $editPassword = $this->Users->patchEntity($editPassword, [
                    'oldPassword' => $this->request->data['oldPassword'],
                    'password' => $this->request->data['newPassword1'],
                    'newPassword1' => $this->request->data['newPassword1'],
                    'newPassword2' => $this->request->data['newPassword2']
                ],
                ['validate' => 'password']
            );
                if ($this->Users->save($editPassword)) {
                    $this->redirect(['action' => 'profile']);
                } else {
                    $error_msg = [];
                    foreach ($editPassword->errors() as $errors) {
                        if (is_array($errors)) {
                            foreach ($errors as $error) {
                                $error_msg[] = $error;
                            }
                        } else {
                            $error_msg = $errors;
                        }
                    }

                    if (!empty($error_msg)) {
                        $this->set('isError', true);
                        $this->Flash->error(implode('\n \r', $error_msg));
                    }
                }
            }
            $this->set('editPassword', $editPassword);
        } else {
            $this->redirect(['action' => 'profile']);
        }
    }

}
