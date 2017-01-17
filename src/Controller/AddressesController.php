<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\ORM\TableRegistry;

/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 */
class AddressesController extends AppController
{
    public $limit = 10;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['addresses', 'Alamat']
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Regencies']
        ];
        $addresses = $this->paginate($this->Addresses);

        $this->set(compact('addresses'));
        $this->set('_serialize', ['addresses']);
    }

    /**
     * View method
     *
     * @param string|null $id Address id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => ['Regencies', 'Companies', 'Offices', 'Users']
        ]);

        $this->set('address', $address);
        $this->set('_serialize', ['address']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $address = $this->Addresses->newEntity();
        if ($this->request->is('post')) {
            $address = $this->Addresses->patchEntity($address, $this->request->data);
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The address could not be saved. Please, try again.'));
            }
        }
        $regencies = $this->Addresses->Regencies->find('list', ['limit' => 200]);
        $companies = $this->Addresses->Companies->find('list', ['limit' => 200]);
        $offices = $this->Addresses->Offices->find('list', ['limit' => 200]);
        $users = $this->Addresses->Users->find('list', ['limit' => 200]);
        $this->set(compact('address', 'regencies', 'companies', 'offices', 'users'));
        $this->set('_serialize', ['address']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Address id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => ['Companies', 'Offices', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $address = $this->Addresses->patchEntity($address, $this->request->data);
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The address could not be saved. Please, try again.'));
            }
        }
        $regencies = $this->Addresses->Regencies->find('list', ['limit' => 200]);
        $companies = $this->Addresses->Companies->find('list', ['limit' => 200]);
        $offices = $this->Addresses->Offices->find('list', ['limit' => 200]);
        $users = $this->Addresses->Users->find('list', ['limit' => 200]);
        $this->set(compact('address', 'regencies', 'companies', 'offices', 'users'));
        $this->set('_serialize', ['address']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Address id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $address = $this->Addresses->get($id);
        if ($this->Addresses->delete($address)) {
            $this->Flash->success(__('The address has been deleted.'));
        } else {
            $this->Flash->error(__('The address could not be deleted. Please, try again.'));
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
            $AddressesUsers = TableRegistry::get('AddressesUsers');

            $id = $this->Auth->user('id');
            $addresses = $AddressesUsers->find()
                ->where(['AddressesUsers.user_id' => $id, 'AddressesUsers.active' => 1])
                ->contain(['Addresses', 'Addresses.Regencies']);

            $breadcrumbs = $this->breadcrumbs;
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set(compact('addresses', $addresses));
            $this->set('_serialize', ['addresses']);
            $this->set('title', 'Alamat');
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
            $AddressesUsers = TableRegistry::get('AddressesUsers');

            $id = $this->Auth->user('id');
            $address = $AddressesUsers->newEntity();
            $user = $this->Addresses->Users->get($id);

            if ($this->request->is('post')) {
                $data = $this->request->data;
                $address_id = $this->getAddressId($data['regency_id'], $data['number'], $data['street'],
                    $data['rt'], $data['rw'], $data['village'], $data['district'], $data['postal']);
                // reformat ended date
                $date = new Date(date('Y-m-d'));
                $data['ended'] = $date->format('Y-m-d');
                $data['started'] = $data['ended'];
                $data['active'] = 1;
                $data['user_id'] = $this->Auth->user('id');
                $data['address_id'] = $address_id;
                $address = $AddressesUsers->patchEntity($address, $data);
                if ($AddressesUsers->save($address)) {
                    return $this->redirect(['controller' => 'addresses', 'action' => 'profile']);
                } else {
                    $this->Flash->error(__('The Address could not be saved. Please, try again.'));
                    $this->set('isError', true);
                }
            }

            $data = $this->Addresses->Regencies->find('all', [
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

            $breadcrumbs = [['addresses/profile', 'Alamat']];
            $breadcrumbs[] = ['profileAdd', 'Tambah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Alamat Tambah');
            $this->set(compact('address'));
            $this->set('_serialize', ['address']);
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
            $AddressesUsers = TableRegistry::get('AddressesUsers');
            $user_id = $this->Auth->user('id');

            if ($AddressesUsers->exists(['user_id' => $user_id, 'id' => $id, 'active' => 1])) {
                $address = $AddressesUsers->get($id, ['contain' => 'Addresses']);

                if ($this->request->is(['patch', 'post', 'put'])) {
                    $data = $this->request->data;
                    $address_id = $this->getAddressId($data['regency_id'], $data['number'], $data['street'],
                        $data['rt'], $data['rw'], $data['village'], $data['district'], $data['postal']);

                    $address->address_id = $address_id;
                    if ($AddressesUsers->save($address)) {
                        return $this->redirect(['controller' => 'addresses', 'action' => 'profile']);
                    } else {
                        $this->Flash->error(__('The email could not be saved. Please, try again.'));
                        $this->set('isError', true);
                    }
                }

                $data = $this->Addresses->Regencies->find('all', [
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

                $breadcrumbs = [['addresses/profile', 'Alamat']];
                $breadcrumbs[] = ['profileEdit', 'Ubah'];
                $this->set('breadcrumbs', $breadcrumbs);
                $this->set('title', 'Alamat Ubah');
                $this->set(compact('address'));
                $this->set('_serialize', ['address']);
            }
        }
    }

    /**
    * Get Address Id method
    *
    * @param string $name
    * @return int $data_id
    */
    private function getAddressId($regency_id = null, $number = null,
        $street = null, $rt = null, $rw = null, $village = null,
        $district = null, $postal = null)
    {
        $number = trim($number);
        $street = trim($street);
        $village = trim($village);
        $district = trim($district);
        if (empty($number)) $number = 0;
        if (empty($rt)) $rt = 1;
        if (empty($rw)) $rw = 1;
        if (empty($village)) $village = $district;
        if (empty($postal)) $postal = 0;

        $data = $this->Addresses->find('all', [
            'conditions' => [
                'Addresses.regency_id' => $regency_id,
                'Addresses.number' => $number,
                'Addresses.street' => $street,
                'Addresses.village' => $village,
                'Addresses.district' => $district,
                'Addresses.active' => 1
            ]
        ]);

        if ($data->count() < 1)
        {
            $newData = $this->Addresses->newEntity();
            $newData->regency_id = $regency_id;
            $newData->number = $number;
            $newData->street = $street;
            $newData->rt = $rt;
            $newData->rw = $rw;
            $newData->village = $village;
            $newData->district = $district;
            $newData->postal = $postal;
            $newData->active = 1;
            if ($this->Addresses->save($newData)) {
                $data_id = $newData->id;
            }
        } else {
            $data = $data->first();
            $data_id = $data->id;
        }
        return $data_id;
    }

}
