<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 */
class CompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $companies = $this->paginate($this->Companies);

        $this->set(compact('companies'));
        $this->set('_serialize', ['companies']);
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['Categories', 'Addresses', 'Emails', 'Phones', 'Users']
        ]);

        $this->set('company', $company);
        $this->set('_serialize', ['company']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $company = $this->Companies->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companies->patchEntity($company, $this->request->data);
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The company could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Companies->Categories->find('list', ['limit' => 200]);
        $addresses = $this->Companies->Addresses->find('list', ['limit' => 200]);
        $emails = $this->Companies->Emails->find('list', ['limit' => 200]);
        $phones = $this->Companies->Phones->find('list', ['limit' => 200]);
        $users = $this->Companies->Users->find('list', ['limit' => 200]);
        $this->set(compact('company', 'categories', 'addresses', 'emails', 'phones', 'users'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['Addresses', 'Emails', 'Phones', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->data);
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The company could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Companies->Categories->find('list', ['limit' => 200]);
        $addresses = $this->Companies->Addresses->find('list', ['limit' => 200]);
        $emails = $this->Companies->Emails->find('list', ['limit' => 200]);
        $phones = $this->Companies->Phones->find('list', ['limit' => 200]);
        $users = $this->Companies->Users->find('list', ['limit' => 200]);
        $this->set(compact('company', 'categories', 'addresses', 'emails', 'phones', 'users'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Companies->get($id);
        if ($this->Companies->delete($company)) {
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
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
            $CompaniesUsers = TableRegistry::get('CompaniesUsers');

            $id = $this->Auth->user('id');
            $companies = $CompaniesUsers->find()
                ->where(['CompaniesUsers.user_id' => $id, 'CompaniesUsers.active' => 1])
                ->contain([
                    'Companies',
                    'Companies.Categories'
                ])
                ->order(['CompaniesUsers.started' => 'DESC']);

            $breadcrumbs = [['companies', 'Praktek']];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set(compact('companies', $companies));
            $this->set('_serialize', ['companies']);
            $this->set('title', 'Praktek');
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
            $CompaniesUsers = TableRegistry::get('CompaniesUsers');

            $company = $CompaniesUsers->newEntity();

            if ($this->request->is('post')) {
                $data = $this->request->data;

                // get company id
                $company_id = $this->getCompanyId($data['company_name'], $data['company_id'], $data['category_id']);

                // reformat started date
                if (!empty($data['started'])) {
                    $date = new Date($this->request->data['started']);
                } else {
                    $date = new Date(date('Y-m-d'));
                }
                $data['started'] = $date->format('Y-m-d');

                // reformat ended date
                $data['ended'] = null;
                if (!empty($data['ended'])) {
                    $date = new Date($this->request->data['ended']);
                    $data['ended'] = $date->format('Y-m-d');
                }

                $data['user_id'] = $this->Auth->user('id');
                $data['active'] = 1;

                $company = $CompaniesUsers->patchEntity($company, $data);
                if ($CompaniesUsers->save($company)) {
                    return $this->redirect(['controller' => 'companies', 'action' => 'profile']);
                } else {
                    $this->Flash->error(__('The email could not be saved. Please, try again.'));
                    $this->set('isError', true);
                }
            }

            // convert type to cakephp-form-select-options
            $data = $this->Companies->Categories->find('all', [
                'conditions' => ['Categories.active' => 1, 'Categories.id >' => 3],
                'order' => ['name' => 'ASC']
            ]);
            $categoriesOptions = [];
            foreach($data as $datum)
            {
                $categoriesOptions[$datum->id] = $datum->name;
            }
            $this->set('categoriesOptions', $categoriesOptions);

            $data = $this->Companies->find('all', [
                'conditions' => ['active' => 1],
                'order' => ['Companies.name' => 'ASC']
            ]);

            $companiesOptions = [];
            foreach($data as $datum)
            {
                $companiesOptions[$datum->id] = $datum->name;
            }
            $this->set('companiesOptions', $companiesOptions);

            $breadcrumbs = [['companies/profile', 'Praktek']];
            $breadcrumbs[] = ['profileAdd', 'Tambah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Praktek Tambah');
            $this->set(compact('company'));
            $this->set('_serialize', ['company']);
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
            $CompaniesUsers = TableRegistry::get('CompaniesUsers');
            $company = $CompaniesUsers->get($id, [
                'contain' => ['Companies']
            ]);

            if ($CompaniesUsers->exists(['user_id' => $this->Auth->user('id'), 'id' => $id, 'active' => 1])) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $data = $this->request->data;
                    // get company id
                    $company_id = $this->getCompanyId($data['company_name'], $data['company_id'], $data['category_id']);

                    // reformat started date
                    if (!empty($data['started'])) {
                        $date = new Date($this->request->data['started']);
                    } else {
                        $date = new Date(date('Y-m-d'));
                    }
                    $data['started'] = $date->format('Y-m-d');

                    // reformat ended date
                    $data['ended'] = null;
                    if (!empty($data['ended'])) {
                        $date = new Date($this->request->data['ended']);
                        $data['ended'] = $date->format('Y-m-d');
                    }

                    $data['company_id'] = $company_id;
                    unset($data['category_id']);
                    unset($data['company']);
                    unset($data['company_name']);

                    $company = $CompaniesUsers->patchEntity($company, $data);
                    if ($CompaniesUsers->save($company)) {
                        $this->Flash->error(__('Praktek berhasil diubah'));
                        $this->set('isSuccess', true);
                        return $this->redirect(['controller' => 'companies', 'action' => 'profile']);
                    } else {
                        $this->Flash->error(__('The Companies could not be saved. Please, try again.'));
                        $this->set('isError', true);
                    }
                }
            } else {
                return $this->redirect(['action' => 'profile']);
            }

            $company['started'] = new Date($company['started']);
            $company['started'] = $company['started']->format('d-m-Y');

            if (!empty($company['ended'])) {
                $company['ended'] = new Date($company['ended']);
                $company['ended'] = $company['ended']->format('d-m-Y');
            }

            // convert type to cakephp-form-select-options
            $data = $this->Companies->Categories->find('all', [
                'conditions' => ['Categories.active' => 1, 'Categories.id >' => 3],
                'order' => ['name' => 'ASC']
            ]);
            $categoriesOptions = [];
            foreach($data as $datum)
            {
                $categoriesOptions[$datum->id] = $datum->name;
            }
            $this->set('categoriesOptions', $categoriesOptions);

            $data = $this->Companies->find('all', [
                'conditions' => ['active' => 1],
                'order' => ['Companies.name' => 'ASC']
            ]);

            $companiesOptions = [];
            foreach($data as $datum)
            {
                $companiesOptions[$datum->id] = $datum->name;
            }
            $this->set('companiesOptions', $companiesOptions);

            $breadcrumbs = [['companies/profile', 'Praktek']];
            $breadcrumbs[] = ['profileEdit', 'Ubah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Praktek Ubah');
            $this->set(compact('company'));
            $this->set('_serialize', ['company']);
        }
    }

    /**
    * Get College Id method
    *
    * @param string $name
    * @return int $data_id
    */
    private function getCompanyId($name = null, $id = null, $category_id = null)
    {
        $data = $this->Companies->find('all', [
            'conditions' => [
                'Companies.category_id' => $category_id,
                'Companies.name' => $name,
                'Companies.active' => 1
            ]
        ]);

        if ($data->count() < 1)
        {
            $newData = $this->Companies->newEntity();
            $newData->category_id = $category_id;
            $newData->name = $name;
            $newData->active = 1;
            if ($this->Companies->save($newData)) {
                $data_id = $newData->id;
            }
        } else {
            $data = $data->first();
            $data_id = $data->id;
        }
        return $data_id;
    }

}
