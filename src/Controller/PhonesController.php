<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Phones Controller
 *
 * @property \App\Model\Table\PhonesTable $Phones
 */
class PhonesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Types']
        ];
        $phones = $this->paginate($this->Phones);

        $this->set(compact('phones'));
        $this->set('_serialize', ['phones']);
    }

    /**
     * View method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phone = $this->Phones->get($id, [
            'contain' => ['Types', 'Companies', 'Offices', 'Users']
        ]);

        $this->set('phone', $phone);
        $this->set('_serialize', ['phone']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phone = $this->Phones->newEntity();
        if ($this->request->is('post')) {
            $phone = $this->Phones->patchEntity($phone, $this->request->data);
            if ($this->Phones->save($phone)) {
                $this->Flash->success(__('The phone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The phone could not be saved. Please, try again.'));
            }
        }
        $types = $this->Phones->Types->find('list', ['limit' => 200]);
        $companies = $this->Phones->Companies->find('list', ['limit' => 200]);
        $offices = $this->Phones->Offices->find('list', ['limit' => 200]);
        $users = $this->Phones->Users->find('list', ['limit' => 200]);
        $this->set(compact('phone', 'types', 'companies', 'offices', 'users'));
        $this->set('_serialize', ['phone']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phone = $this->Phones->get($id, [
            'contain' => ['Companies', 'Offices', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phone = $this->Phones->patchEntity($phone, $this->request->data);
            if ($this->Phones->save($phone)) {
                $this->Flash->success(__('The phone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The phone could not be saved. Please, try again.'));
            }
        }
        $types = $this->Phones->Types->find('list', ['limit' => 200]);
        $companies = $this->Phones->Companies->find('list', ['limit' => 200]);
        $offices = $this->Phones->Offices->find('list', ['limit' => 200]);
        $users = $this->Phones->Users->find('list', ['limit' => 200]);
        $this->set(compact('phone', 'types', 'companies', 'offices', 'users'));
        $this->set('_serialize', ['phone']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phone = $this->Phones->get($id);
        if ($this->Phones->delete($phone)) {
            $this->Flash->success(__('The phone has been deleted.'));
        } else {
            $this->Flash->error(__('The phone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
    * Add Profile Telephone method
    *
    * @param
    * @return
    *
    */
    public function profileAdd()
    {
        if ($this->Auth->user()) {
            $PhonesUsers = TableRegistry::get('PhonesUsers');

            $id = $this->Auth->user('id');
            $phone = $this->Phones->newEntity();
            $user = $this->Phones->Users->get($id);

            if ($this->request->is('post')) {
                $this->request->data['active'] = 1;
                $phone = $this->Phones->patchEntity($phone, $this->request->data);
                $phone->users = [$user];
                if ($this->Phones->save($phone)) {
                    return $this->redirect(['controller' => 'emails', 'action' => 'profile']);
                } else {
                    $this->Flash->error(__('The phone could not be saved. Please, try again.'));
                    $this->set('isError', true);
                }
            }

            // convert type to cakephp-form-select-options
            $types = $this->Phones->Types->find('all', [
                'where' => ['active' => 1],
                'order' => ['name' => 'ASC']
            ]);
            $typesOptions = [];
            foreach($types as $type)
            {
                $typesOptions[$type->id] = $type->name;
            }
            $this->set('typesOptions', $typesOptions);

            $breadcrumbs = [['emails/profile', 'Kontak']];
            $breadcrumbs[] = ['profileAdd', 'Tambah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Kontak Tambah');
            $this->set(compact('phone'));
            $this->set('_serialize', ['phone']);
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
            $PhonesUsers = TableRegistry::get('PhonesUsers');
            $user_id = $this->Auth->user('id');

            if ($PhonesUsers->exists(['user_id' => $user_id, 'phone_id' => $id, 'active' => 1])) {
                $phone = $this->Phones->get($id);

                if ($this->request->is(['patch', 'post', 'put'])) {
                    $phone->name = $this->request->data['name'];
                    $phone->type_id = $this->request->data['type_id'];
                    if ($this->Phones->save($phone)) {
                        $this->Flash->error(__('Telepon berhasil diubah'));
                        $this->set('isSuccess', true);
                        return $this->redirect(['controller' => 'emails', 'action' => 'profile']);
                    } else {
                        $this->Flash->error(__('The email could not be saved. Please, try again.'));
                        $this->set('isError', true);
                    }
                }

                // convert type to cakephp-form-select-options
                $types = $this->Phones->Types->find('all', [
                    'where' => ['active' => 1],
                    'order' => ['name' => 'ASC']
                ]);
                $typesOptions = [];
                foreach($types as $type)
                {
                    $typesOptions[$type->id] = $type->name;
                }
                $this->set('typesOptions', $typesOptions);

                $breadcrumbs = [['emails/profile', 'Kontak']];
                $breadcrumbs[] = ['profileEdit', 'Ubah'];
                $this->set('breadcrumbs', $breadcrumbs);
                $this->set('title', 'Kontak Ubah');
                $this->set(compact('phone'));
                $this->set('_serialize', ['phone']);
            }
        }
    }
}
