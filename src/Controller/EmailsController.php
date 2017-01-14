<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Emails Controller
 *
 * @property \App\Model\Table\EmailsTable $Emails
 */
class EmailsController extends AppController
{
    public $limit = 10;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['emails', 'Kontak']
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $emails = $this->paginate($this->Emails);

        $this->set(compact('emails'));
        $this->set('_serialize', ['emails']);
    }

    /**
     * View method
     *
     * @param string|null $id Email id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $email = $this->Emails->get($id, [
            'contain' => ['Companies', 'Offices', 'Users']
        ]);

        $this->set('email', $email);
        $this->set('_serialize', ['email']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $email = $this->Emails->newEntity();
        if ($this->request->is('post')) {
            $email = $this->Emails->patchEntity($email, $this->request->data);
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The email could not be saved. Please, try again.'));
            }
        }
        $companies = $this->Emails->Companies->find('list', ['limit' => 200]);
        $offices = $this->Emails->Offices->find('list', ['limit' => 200]);
        $users = $this->Emails->Users->find('list', ['limit' => 200]);
        $this->set(compact('email', 'companies', 'offices', 'users'));
        $this->set('_serialize', ['email']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Email id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $email = $this->Emails->get($id, [
            'contain' => ['Companies', 'Offices', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $email = $this->Emails->patchEntity($email, $this->request->data);
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The email could not be saved. Please, try again.'));
            }
        }
        $companies = $this->Emails->Companies->find('list', ['limit' => 200]);
        $offices = $this->Emails->Offices->find('list', ['limit' => 200]);
        $users = $this->Emails->Users->find('list', ['limit' => 200]);
        $this->set(compact('email', 'companies', 'offices', 'users'));
        $this->set('_serialize', ['email']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Email id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $email = $this->Emails->get($id);
        if ($this->Emails->delete($email)) {
            $this->Flash->success(__('The email has been deleted.'));
        } else {
            $this->Flash->error(__('The email could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
    * Profile method
    *
    * @param
    * @return
    *
    */
    public function profile()
    {
        if ($this->Auth->user()) {
            $EmailsUsers = TableRegistry::get('EmailsUsers');
            $PhonesUsers = TableRegistry::get('PhonesUsers');

            $id = $this->Auth->user('id');
            $emails = $EmailsUsers->find()
                ->where(['EmailsUsers.user_id' => $id, 'EmailsUsers.active' => 1])
                ->contain([
                    'Emails' => function($q) {
                        return $q
                            ->where(['Emails.active' => 1]);
                    }
                ]);

            $phones = $PhonesUsers->find()
                ->where(['user_id' => $id, 'PhonesUsers.active' => 1])
                ->contain([
                    'Phones' => function($q) {
                        return $q
                            ->where(['Phones.active' => 1]);
                    }
                ]);

            $breadcrumbs = $this->breadcrumbs;
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set(compact('emails', $emails));
            $this->set(compact('phones', $phones));
            $this->set('_serialize', ['emails', 'phones']);
            $this->set('title', 'Kontak');
        }
    }

    /**
    * Add Profile Email method
    *
    * @param
    * @return
    *
    */
    public function profileAdd()
    {
        if ($this->Auth->user()) {
            $EmailsUsers = TableRegistry::get('EmailsUsers');

            $id = $this->Auth->user('id');
            $email = $this->Emails->newEntity();
            $user = $this->Emails->Users->get($id);

            if ($this->request->is('post')) {
                $this->request->data['active'] = 1;
                $email = $this->Emails->patchEntity($email, $this->request->data);
                $email->users = [$user];
                if ($this->Emails->save($email)) {
                    return $this->redirect(['controller' => 'emails', 'action' => 'profile']);
                } else {
                    $this->Flash->error(__('The email could not be saved. Please, try again.'));
                    $this->set('isError', true);
                }
            }

            $breadcrumbs = [['emails/profile', 'Kontak']];
            $breadcrumbs[] = ['profileAdd', 'Tambah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Kontak Tambah');
            $this->set(compact('email'));
            $this->set('_serialize', ['email']);
        }
    }

    /**
    * Edit Profile Email method
    *
    * @param
    * @return
    *
    */
    public function profileEdit($id = null)
    {
        if ($this->Auth->user()) {
            $EmailsUsers = TableRegistry::get('EmailsUsers');
            $user_id = $this->Auth->user('id');

            if ($EmailsUsers->exists(['user_id' => $user_id, 'email_id' => $id, 'active' => 1])) {
                $email = $this->Emails->get($id);

                if ($this->request->is(['patch', 'post', 'put'])) {
                    $email->name = $this->request->data['name'];
                    if ($this->Emails->save($email)) {
                        $this->Flash->error(__('Email berhasil diubah'));
                        $this->set('isSuccess', true);
                        return $this->redirect(['controller' => 'emails', 'action' => 'profile']);
                    } else {
                        $this->Flash->error(__('The email could not be saved. Please, try again.'));
                        $this->set('isError', true);
                    }
                }

                $breadcrumbs = [['emails/profile', 'Kontak']];
                $breadcrumbs[] = ['profileEdit', 'Ubah'];
                $this->set('breadcrumbs', $breadcrumbs);
                $this->set('title', 'Kontak Ubah');
                $this->set(compact('email'));
                $this->set('_serialize', ['email']);
            }
        }
    }
}
