<?php
namespace App\Controller;

use App\Controller\AppController;

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
        ['users', 'Pengguna']
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
                'Phones'
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

            if (strpos($querySearchOld, 'level:dpw') !== false || strpos($querySearchOld, 'level:dpd') !== false || strpos($querySearchOld, 'level:komisariat') !== false) {
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

        $this->set('title', 'Daftar DPD/Komisariat');
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
            'contain' => ['Categories', 'Regencies', 'ParentOffices', 'Addresses', 'Emails', 'Phones', 'Offices', 'ChildOffices']
        ]);

        $this->set('office', $office);
        $this->set('_serialize', ['office']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $office = $this->Offices->newEntity();
        if ($this->request->is('post')) {
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
            'conditions' => ['Categories.active' => 1, 'Categories.id <= ' => 3],
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
            'order' => ['name' => 'ASC'],
            'contains' => ['Categories']
        ]);
        $officesOptions = [null => 'PPNI'];
        foreach($data as $datum)
        {
            $officesOptions[$datum->id] = $datum->categories->name . ' ' . $datum->name;
        }
        $this->set('officesOptions', $officesOptions);

        $this->set(compact('office'));
        $this->set('_serialize', ['office']);
        $this->set('title', 'DPD/Komisariat Tambah');
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
        $office = $this->Offices->get($id, [
            'contain' => ['Addresses', 'Emails', 'Phones', 'Offices']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $office = $this->Offices->patchEntity($office, $this->request->data);
            if ($this->Offices->save($office)) {
                $this->Flash->success(__('The office has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The office could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Offices->Categories->find('list', ['limit' => 200]);
        $regencies = $this->Offices->Regencies->find('list', ['limit' => 200]);
        $parentOffices = $this->Offices->ParentOffices->find('list', ['limit' => 200]);
        $addresses = $this->Offices->Addresses->find('list', ['limit' => 200]);
        $emails = $this->Offices->Emails->find('list', ['limit' => 200]);
        $phones = $this->Offices->Phones->find('list', ['limit' => 200]);
        $users = $this->Offices->Offices->find('list', ['limit' => 200]);
        $this->set(compact('office', 'categories', 'regencies', 'parentOffices', 'addresses', 'emails', 'phones', 'users'));
        $this->set('_serialize', ['office']);
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
        $this->request->allowMethod(['post', 'delete']);
        $office = $this->Offices->get($id);
        if ($this->Offices->delete($office)) {
            $this->Flash->success(__('The office has been deleted.'));
        } else {
            $this->Flash->error(__('The office could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
