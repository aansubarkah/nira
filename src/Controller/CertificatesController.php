<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Certificates Controller
 *
 * @property \App\Model\Table\CertificatesTable $Certificates
 */
class CertificatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Issuers']
        ];
        $certificates = $this->paginate($this->Certificates);

        $this->set(compact('certificates'));
        $this->set('_serialize', ['certificates']);
    }

    /**
     * View method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $certificate = $this->Certificates->get($id, [
            'contain' => ['Issuers', 'Users']
        ]);

        $this->set('certificate', $certificate);
        $this->set('_serialize', ['certificate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $certificate = $this->Certificates->newEntity();
        if ($this->request->is('post')) {
            $certificate = $this->Certificates->patchEntity($certificate, $this->request->data);
            if ($this->Certificates->save($certificate)) {
                $this->Flash->success(__('The certificate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The certificate could not be saved. Please, try again.'));
            }
        }
        $issuers = $this->Certificates->Issuers->find('list', ['limit' => 200]);
        $users = $this->Certificates->Users->find('list', ['limit' => 200]);
        $this->set(compact('certificate', 'issuers', 'users'));
        $this->set('_serialize', ['certificate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $certificate = $this->Certificates->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $certificate = $this->Certificates->patchEntity($certificate, $this->request->data);
            if ($this->Certificates->save($certificate)) {
                $this->Flash->success(__('The certificate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The certificate could not be saved. Please, try again.'));
            }
        }
        $issuers = $this->Certificates->Issuers->find('list', ['limit' => 200]);
        $users = $this->Certificates->Users->find('list', ['limit' => 200]);
        $this->set(compact('certificate', 'issuers', 'users'));
        $this->set('_serialize', ['certificate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $certificate = $this->Certificates->get($id);
        if ($this->Certificates->delete($certificate)) {
            $this->Flash->success(__('The certificate has been deleted.'));
        } else {
            $this->Flash->error(__('The certificate could not be deleted. Please, try again.'));
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
            $CertificatesUsers = TableRegistry::get('CertificatesUsers');

            $id = $this->Auth->user('id');
            $certificates = $CertificatesUsers->find()
                ->where(['CertificatesUsers.user_id' => $id, 'CertificatesUsers.active' => 1])
                ->contain([
                    'Certificates',
                    'Certificates.Issuers'
                ])
                ->order(['CertificatesUsers.held' => 'DESC']);

            $breadcrumbs = [['certificates', 'Sertifikasi']];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set(compact('certificates', $certificates));
            $this->set('_serialize', ['certificates']);
            $this->set('title', 'Sertifikasi');
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
            $CertificatesUsers = TableRegistry::get('CertificatesUsers');

            $certificate = $CertificatesUsers->newEntity();

            if ($this->request->is('post')) {
                $data = $this->request->data;

                // reformat held date
                if (!empty($data['held'])) {
                    $date = new Date($this->request->data['held']);
                } else {
                    $date = new Date(date('Y-m-d'));
                }
                $data['held'] = $date->format('Y-m-d');

                // get issuer id
                $issuer_id = $this->getIssuerId($data['issuer_name'], $data['issuer_id']);

                // get certificate id
                if (empty($data['description'])) $data['description'] = $data['name'];
                $certificate_id = $this->getCertificateId($issuer_id, $data['name'], $data['description']);

                $data['certificate_id'] = $certificate_id;
                $data['evidence_id'] = 0;
                $data['user_id'] = $this->Auth->user('id');
                $data['active'] = 1;
                /*unset($data['name']);
                unset($data['description']);
                unset($data['issuer']);
                unset($data['issuer_id']);
                unset($data['issuer_name']);*/

                $certificate = $CertificatesUsers->patchEntity($certificate, $data);
                if ($CertificatesUsers->save($certificate)) {
                    return $this->redirect(['controller' => 'certificates', 'action' => 'profile']);
                } else {
                    $this->Flash->error(__('The email could not be saved. Please, try again.'));
                    $this->set('isError', true);
                }
            }

            $data = $this->Certificates->Issuers->find('all', [
                'conditions' => ['Issuers.active' => 1],
                'order' => ['Issuers.name' => 'ASC']
            ]);

            $issuersOptions = [];
            foreach($data as $datum)
            {
                $issuersOptions[$datum->id] = $datum->name;
            }
            $this->set('issuersOptions', $issuersOptions);

            $breadcrumbs = [['certificates/profile', 'Sertifikasi']];
            $breadcrumbs[] = ['profileAdd', 'Tambah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Sertifikasi Tambah');
            $this->set(compact('certificate'));
            $this->set('_serialize', ['certificate']);
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
            $CertificatesUsers = TableRegistry::get('CertificatesUsers');
            $certificate = $CertificatesUsers->get($id, [
                'contain' => ['Certificates', 'Certificates.Issuers']
            ]);

            if ($CertificatesUsers->exists(['user_id' => $this->Auth->user('id'), 'id' => $id, 'active' => 1])) {
                if ($this->request->is(['patch', 'post', 'put'])) {

                    $data = $this->request->data;

                    // reformat held date
                    if (!empty($data['held'])) {
                        $date = new Date($this->request->data['held']);
                    } else {
                        $date = new Date(date('Y-m-d'));
                    }
                    $data['held'] = $date->format('Y-m-d');

                    // get issuer id
                    $issuer_id = $this->getIssuerId($data['issuer_name'], $data['issuer_id']);

                    // get certificate id
                    if (empty($data['description'])) $data['description'] = $data['name'];
                    $certificate_id = $this->getCertificateId($issuer_id, $data['name'], $data['description']);

                    $data['certificate_id'] = $certificate_id;

                    $certificate = $CertificatesUsers->patchEntity($certificate, $data);
                    if ($CertificatesUsers->save($certificate)) {
                        $this->Flash->error(__('Sertifikasi berhasil diubah'));
                        $this->set('isSuccess', true);
                        return $this->redirect(['controller' => 'certificates', 'action' => 'profile']);
                    } else {
                        $this->Flash->error(__('The email could not be saved. Please, try again.'));
                        $this->set('isError', true);
                    }
                }
            } else {
                return $this->redirect(['action' => 'profile']);
            }

            $certificate['held'] = new Date($certificate['held']);
            $certificate['held'] = $certificate['held']->format('d-m-Y');

            $data = $this->Certificates->Issuers->find('all', [
                'conditions' => ['Issuers.active' => 1],
                'order' => ['Issuers.name' => 'ASC']
            ]);

            $issuersOptions = [];
            foreach($data as $datum)
            {
                $issuersOptions[$datum->id] = $datum->name;
            }
            $this->set('issuersOptions', $issuersOptions);

            $breadcrumbs = [['certificates/profile', 'Sertifikasi']];
            $breadcrumbs[] = ['profileEdit', 'Ubah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Sertifikasi Ubah');
            $this->set(compact('certificate'));
            $this->set('_serialize', ['certificate']);
        }
    }

    /**
    * Get issuer Id method
    *
    * @param string $name
    * @return int $data_id
    */
    private function getissuerId($name = null, $id = null)
    {
        $name = trim($name);
        if ($id == 0) {
            $data = $this->Certificates->Issuers->find('all', [
                'conditions' => [
                    'Issuers.name' => $name,
                    'Issuers.active' => 1
                ]
            ]);
        } else {
            $data = $this->Certificates->Issuers->find('all', [
                'conditions' => [
                    'Issuers.id' => $id,
                    'Issuers.name' => $name,
                    'Issuers.active' => 1
                ]
            ]);
        }

        if ($data->count() < 1)
        {
            $newData = $this->Certificates->Issuers->newEntity();
            $newData->name = $name;
            $newData->active = 1;
            if ($this->Certificates->Issuers->save($newData)) {
                $data_id = $newData->id;
            }
        } else {
            $data_id = $id;
        }
        return $data_id;
    }

    /**
    * Get Certificate Id method
    *
    * @param string $name
    * @return int $data_id
    */
    private function getCertificateId($issuer_id = null, $name = null, $description = null)
    {
        $name = trim($name);
        $description = trim($description);
        $data = $this->Certificates->find('all', [
            'conditions' => [
                'Certificates.issuer_id' => $issuer_id,
                'Certificates.name' => $name,
                'Certificates.active' => 1
            ]
        ]);

        if ($data->count() < 1)
        {
            $newData = $this->Certificates->newEntity();
            $newData->issuer_id = $issuer_id;
            $newData->name = $name;
            $newData->description = $description;
            $newData->active = 1;
            if ($this->Certificates->save($newData)) {
                $data_id = $newData->id;
            }
        } else {
            $data = $data->first();

            if($data->description != $description) {
                $data->description = $description;
                $this->Certificates->save($data);
            }
            $data_id = $data->id;
        }
        return $data_id;
    }

}
