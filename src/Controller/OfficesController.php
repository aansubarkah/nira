<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Offices Controller
 *
 * @property \App\Model\Table\OfficesTable $Offices
 */
class OfficesController extends AppController
{

    public $limit = 10;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['offices', 'DPD/DPK']
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $query = $this->Offices->find('all', [
            'conditions' => ['Offices.active' => 1],
            'contain' => [
                'Categories',
                'Regencies',
                'Phones',
                'Addresses',
                'ParentOffices'
            ],
            'limit' => $this->limit
        ]);

        $querySearchOld = 'level:semua';
        if ($this->request->query('search'))
        {
            $querySearchOld = strtolower($this->request->query('search'));
            $querySearch = $querySearchOld;

            if (strpos($querySearch, 'level:dpw') !== false) {
                $roleSearch = 1;
                $querySearch = str_replace('level:dpw', '', $querySearch);
            }
            if (strpos($querySearch, 'level:dpd') !== false) {
                $roleSearch = 2;
                $querySearch = str_replace('level:dpd', '', $querySearch);
            }
            if (strpos($querySearch, 'level:dpk') !== false) {
                $roleSearch = 3;
                $querySearch = str_replace('level:dpk', '', $querySearch);
            }
            if (strpos($querySearch, 'level:komisariat') !== false) {
                $roleSearch = 3;
                $querySearch = str_replace('level:komisariat', '', $querySearch);
            }
            if (strpos($querySearch, 'level:semua') !== false) {
                $querySearch = str_replace('level:semua', '', $querySearch);
            }

            $querySearch = trim($querySearch);

            $queryArray = [
                'LOWER(Offices.name) LIKE' => '%' . $querySearch . '%'
            ];

            if (strpos($querySearchOld, 'level:dpw') !== false || strpos($querySearchOld, 'level:dpd') !== false || strpos($querySearchOld, 'level:komisariat') !== false || strpos($querySearchOld, 'level:dpk') !== false) {
                $queryArray['Offices.category_id = '] = $roleSearch;
            }

            $query->where($queryArray);
        }
        if ($this->request->query('sort'))
        {
            $query->order([
                $this->request->query('sort') => $this->request->query('direction')
            ]);
        } else {
            $query->order(['Offices.name' => 'ASC']);
        }
        $this->paginate = ['limit' => $this->limit];
        $breadcrumbs = $this->breadcrumbs;
        $this->set('breadcrumbs', $breadcrumbs);

        $offices = $this->paginate($query);
        $this->set('limit', $this->limit);
        $this->set('isShowAddButton', true);
        $this->set('querySearchOld', $querySearchOld);

        $this->set('title', 'Daftar DPD/DPK');
        $this->set(compact('offices'));
        $this->set('_serialize', ['offices']);
    }

    /**
     * View method
     *
     * @param string|null $id Office id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $office = $this->Offices->get($id, [
            'contain' => ['Categories', 'Regencies', 'ParentOffices', 'Addresses', 'Emails', 'Phones', 'ChildOffices']
        ]);

        $breadcrumbs = $this->breadcrumbs;
        $breadcrumbs[] = ['view', $office['category']['name'] . ' ' . $office['name']];
        $this->set('breadcrumbs', $breadcrumbs);
        $this->set('title', $office['category']['name'] . ' ' . $office['name']);

        $this->set('isShowEditButton', true);

        $this->set('controllerObjectId', $id);

        $this->set('office', $office);
        $this->set('_serialize', ['office']);

        $query = $this->Offices->find('all', [
            'conditions' => ['Offices.active' => 1, 'Offices.parent_id' => $id],
            'limit' => $this->limit,
            'contain' => ['Addresses', 'Phones', 'Categories']
        ]);
        if ($this->request->query('search'))
        {
            $query->where(['Offices.name LIKE' => '%' . $this->request->query('search') . '%']);
        }
        if ($this->request->query('sort'))
        {
            $query->order([
                $this->request->query('sort') => $this->request->query('direction')
            ]);
        } else {
            $query->order(['Offices.name' => 'ASC']);
        }
        $this->paginate = ['limit' => $this->limit];

        $children = $this->paginate($query);
        $this->set('limit', $this->limit);
        $this->set(compact('children'));
        $this->set('_serialize', ['children']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $office = $this->Offices->newEntity();
        $phone = $this->Offices->Phones->newEntity();
        $address = $this->Offices->Addresses->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['active'] = 1;

            // insert new phone
            $phone->type_id = 2;//telepon kantor
            $phone->name = $data['phone'];
            $phone->active = 1;

            // insert new address
            $address->regency_id = $data['regency_id'];
            $address->number = 0;
            $address->street = $data['address'];
            $address->rt = 0;
            $address->rw = 0;
            $address->village = 'Surabaya';
            $address->district = 'Surabaya';
            $address->postal = 0;
            $address->active = 1;

            $office = $this->Offices->patchEntity($office, $data);
            $office->phones = [$phone];
            $office->addresses = [$address];
            if ($this->Offices->save($office)) {
                $this->set('isSuccess', true);
                $this->Flash->success(__('The office has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->set('isError', true);
                $this->Flash->error(__('The office could not be saved. Please, try again.'));
            }
        }

        // convert type to cakephp-form-select-options
        $data = $this->Offices->Categories->find('all', [
            'conditions' => ['Categories.active' => 1, 'Categories.id <=' => 3, 'Categories.id >' => 1],
            'order' => ['name' => 'ASC']
        ]);
        $categoriesOptions = [];
        foreach($data as $datum)
        {
            $categoriesOptions[$datum->id] = $datum->name;
        }
        $this->set('categoriesOptions', $categoriesOptions);

        $data = $this->Offices->Regencies->find('all', [
            'conditions' => ['Regencies.active' => 1],
            'order' => ['kind' => 'DESC', 'name' => 'ASC']
        ]);
        $regenciesOptions = [];
        foreach($data as $datum)
        {
            $datum->kind ? $cityString = 'Kabupaten ' : $cityString = 'Kota ';
            $regenciesOptions[$datum->id] = $cityString . $datum->name;
        }
        $this->set('regenciesOptions', $regenciesOptions);

        $data = $this->Offices->find('all', [
            'conditions' => ['Offices.active' => 1],
            'order' => ['Offices.lft' => 'ASC', 'Offices.name' => 'ASC'],
            'contain' => ['Categories']
        ]);
        $officesOptions = [null => 'PPNI'];
        foreach($data as $datum)
        {
            //print_r($datum);
            if ($datum->parent_id == null) {
                $text = '_';
            } else if ($datum->parent_id == 1) {
                $text = '__';
            } else {
                $text = '___';
            }
            $text = $text . $datum->category->name . ' ' . $datum->name;

            $officesOptions[$datum->id] = $text;
        }
        $this->set('officesOptions', $officesOptions);

        $breadcrumbs = $this->breadcrumbs;
        $breadcrumbs[] = ['add', 'Tambah'];
        $this->set('breadcrumbs', $breadcrumbs);

        $this->set(compact('office'));
        $this->set('_serialize', ['office']);
        $this->set('title', 'DPD/DPK Tambah');
    }

    /**
     * Edit method
     *
     * @param string|null $id Office id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $office = $this->Offices->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $office = $this->Offices->patchEntity($office, $this->request->data);
            if ($this->Offices->save($office)) {
                $this->Flash->success(__('The office has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The office could not be saved. Please, try again.'));
            }
        }
        // convert type to cakephp-form-select-options
        $data = $this->Offices->Categories->find('all', [
            'conditions' => ['Categories.active' => 1, 'Categories.id <=' => 3, 'Categories.id >' => 1],
            'order' => ['name' => 'ASC']
        ]);
        $categoriesOptions = [];
        foreach($data as $datum)
        {
            $categoriesOptions[$datum->id] = $datum->name;
        }
        $this->set('categoriesOptions', $categoriesOptions);

        $data = $this->Offices->Regencies->find('all', [
            'conditions' => ['Regencies.active' => 1],
            'order' => ['kind' => 'DESC', 'name' => 'ASC']
        ]);
        $regenciesOptions = [];
        foreach($data as $datum)
        {
            $datum->kind ? $cityString = 'Kabupaten ' : $cityString = 'Kota ';
            $regenciesOptions[$datum->id] = $cityString . $datum->name;
        }
        $this->set('regenciesOptions', $regenciesOptions);

        $data = $this->Offices->find('all', [
            'conditions' => ['Offices.active' => 1],
            'order' => ['Offices.name' => 'ASC'],
            'contain' => ['Categories']
        ]);
        $officesOptions = [null => 'PPNI'];
        foreach($data as $datum)
        {
            $officesOptions[$datum->id] = $datum->category->name . ' ' . $datum->name;
        }
        $this->set('officesOptions', $officesOptions);

        $breadcrumbs = $this->breadcrumbs;
        $breadcrumbs[] = ['edit', 'Ubah'];
        $this->set('breadcrumbs', $breadcrumbs);

        $this->set(compact('office'));
        $this->set('_serialize', ['office']);
        $this->set('title', 'DPD/DPK Ubah');
    }

    /**
     * Delete method
     *
     * @param string|null $id Office id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $office = $this->Offices->get($id);
        $office->active = 0;
        $this->Offices->save($office);
        return $this->redirect(['action' => 'index']);
        /*$this->request->allowMethod(['post', 'delete']);
        $office = $this->Offices->get($id);
        if ($this->Offices->delete($office)) {
            $this->Flash->success(__('The office has been deleted.'));
        } else {
            $this->Flash->error(__('The office could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);*/
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
            $OfficesUsers = TableRegistry::get('OfficesUsers');

            $id = $this->Auth->user('id');
            $offices = $OfficesUsers->find()
                ->where(['OfficesUsers.user_id' => $id, 'OfficesUsers.active' => 1])
                ->contain([
                    'Offices',
                    'Offices.Categories'
                ])
                ->order(['OfficesUsers.started' => 'DESC']);

            $profile = $this->Offices->Users->get($this->Auth->user('id'));

            $breadcrumbs = [['offices', 'Profesi']];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set(compact('profile', $profile));
            $this->set(compact('offices', $offices));
            $this->set('_serialize', ['offices', 'profile']);
            $this->set('title', 'Profesi');
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
            $OfficesUsers = TableRegistry::get('OfficesUsers');

            $office = $OfficesUsers->newEntity();

            if ($this->request->is('post')) {
                $data = $this->request->data;

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
                $office = $OfficesUsers->patchEntity($office, $data);
                if ($OfficesUsers->save($office)) {
                    return $this->redirect(['controller' => 'offices', 'action' => 'profile']);
                } else {
                    $this->Flash->error(__('The email could not be saved. Please, try again.'));
                    $this->set('isError', true);
                }
            }

            $data = $this->Offices->find('all', [
                'conditions' => ['Categories.active' => 1, 'Categories.id <=' => 3, 'Categories.id >' => 1],
                'order' => ['Offices.lft' => 'ASC', 'Offices.name' => 'ASC'],
                'contain' => ['Categories']
            ]);

            $officesOptions = [];
            foreach($data as $datum)
            {
                if ($datum->parent_id == 1) {
                    $text = '';
                } else {
                    $text = '_';
                }
                $text = $text . $datum->category->name . ' ' . $datum->name;

                $officesOptions[$datum->id] = $text;
            }
            $this->set('officesOptions', $officesOptions);

            $breadcrumbs = [['offices/profile', 'Profesi']];
            $breadcrumbs[] = ['profileAdd', 'Tambah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Profesi Tambah');
            $this->set(compact('office'));
            $this->set('_serialize', ['office']);
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
            $OfficesUsers = TableRegistry::get('OfficesUsers');
            $office = $OfficesUsers->get($id);

            if ($OfficesUsers->exists(['user_id' => $this->Auth->user('id'), 'id' => $id, 'active' => 1])) {
                if ($this->request->is(['patch', 'post', 'put'])) {

                    $data = $this->request->data;

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

                    $office = $OfficesUsers->patchEntity($office, $data);
                    if ($OfficesUsers->save($office)) {
                        $this->Flash->error(__('Profesi berhasil diubah'));
                        $this->set('isSuccess', true);
                        return $this->redirect(['controller' => 'offices', 'action' => 'profile']);
                    } else {
                        $this->Flash->error(__('The email could not be saved. Please, try again.'));
                        $this->set('isError', true);
                    }
                }
            } else {
                return $this->redirect(['action' => 'profile']);
            }

            $office['started'] = new Date($office['started']);
            $office['started'] = $office['started']->format('d-m-Y');

            if (!empty($office['ended'])) {
                $office['ended'] = new Date($office['ended']);
                $office['ended'] = $office['ended']->format('d-m-Y');
            }

            $data = $this->Offices->find('all', [
                'conditions' => ['Categories.active' => 1, 'Categories.id <=' => 3, 'Categories.id >' => 1],
                'order' => ['Offices.lft' => 'ASC', 'Offices.name' => 'ASC'],
                'contain' => ['Categories']
            ]);

            $officesOptions = [];
            foreach($data as $datum)
            {
                if ($datum->parent_id == 1) {
                    $text = '';
                } else {
                    $text = '_';
                }
                $text = $text . $datum->category->name . ' ' . $datum->name;

                $officesOptions[$datum->id] = $text;
            }
            $this->set('officesOptions', $officesOptions);

            $breadcrumbs = [['offices/profile', 'Profesi']];
            $breadcrumbs[] = ['profileEdit', 'Ubah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Profesi Ubah');
            $this->set(compact('office'));
            $this->set('_serialize', ['office']);
        }
    }

    /**
    * Edit Nira method
    *
    * @param
    * @return
    *
    */
    public function niraEdit($id = null)
    {
        if ($this->Auth->user()) {
            $nira = $this->Offices->Users->get($this->Auth->user('id'));

            if ($this->request->is(['patch', 'post', 'put'])) {
                $nira->nira = $this->request->data['nira'];
                if ($this->Offices->Users->save($nira)) {
                    $this->set('isSuccess', true);
                    return $this->redirect(['controller' => 'offices', 'action' => 'profile']);
                } else {
                    $this->Flash->error(__('The nira could not be saved. Please, try again.'));
                    $this->set('isError', true);
                }
            }

            $breadcrumbs = [['offices/profile', 'Profesi']];
            $breadcrumbs[] = ['niraEdit', 'Ubah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'NIRA Ubah');
            $this->set(compact('nira'));
            $this->set('_serialize', ['nira']);
        }
    }

}
