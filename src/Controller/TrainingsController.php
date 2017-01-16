<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Trainings Controller
 *
 * @property \App\Model\Table\TrainingsTable $Trainings
 */
class TrainingsController extends AppController
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
        $trainings = $this->paginate($this->Trainings);

        $this->set(compact('trainings'));
        $this->set('_serialize', ['trainings']);
    }

    /**
     * View method
     *
     * @param string|null $id Training id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $training = $this->Trainings->get($id, [
            'contain' => ['Issuers', 'Users']
        ]);

        $this->set('training', $training);
        $this->set('_serialize', ['training']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $training = $this->Trainings->newEntity();
        if ($this->request->is('post')) {
            $training = $this->Trainings->patchEntity($training, $this->request->data);
            if ($this->Trainings->save($training)) {
                $this->Flash->success(__('The training has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The training could not be saved. Please, try again.'));
            }
        }
        $issuers = $this->Trainings->Issuers->find('list', ['limit' => 200]);
        $users = $this->Trainings->Users->find('list', ['limit' => 200]);
        $this->set(compact('training', 'issuers', 'users'));
        $this->set('_serialize', ['training']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Training id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $training = $this->Trainings->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $training = $this->Trainings->patchEntity($training, $this->request->data);
            if ($this->Trainings->save($training)) {
                $this->Flash->success(__('The training has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The training could not be saved. Please, try again.'));
            }
        }
        $issuers = $this->Trainings->Issuers->find('list', ['limit' => 200]);
        $users = $this->Trainings->Users->find('list', ['limit' => 200]);
        $this->set(compact('training', 'issuers', 'users'));
        $this->set('_serialize', ['training']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Training id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $training = $this->Trainings->get($id);
        if ($this->Trainings->delete($training)) {
            $this->Flash->success(__('The training has been deleted.'));
        } else {
            $this->Flash->error(__('The training could not be deleted. Please, try again.'));
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
            $TrainingsUsers = TableRegistry::get('TrainingsUsers');

            $id = $this->Auth->user('id');
            $trainings = $TrainingsUsers->find()
                ->where(['TrainingsUsers.user_id' => $id, 'TrainingsUsers.active' => 1])
                ->contain([
                    'Trainings',
                    'Trainings.Issuers'
                ])
                ->order(['TrainingsUsers.created' => 'DESC']);

            $breadcrumbs = [['trainings', 'Pelatihan']];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set(compact('trainings', $trainings));
            $this->set('_serialize', ['trainings']);
            $this->set('title', 'Pelatihan');
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
            $TrainingsUsers = TableRegistry::get('TrainingsUsers');

            $training = $TrainingsUsers->newEntity();

            if ($this->request->is('post')) {
                $data = $this->request->data;

                // reformat held date
                if (!empty($data['held'])) {
                    $date = new Date($this->request->data['held']);
                } else {
                    $date = new Date(date('Y-m-d'));
                }
                $data['held'] = $date->format('Y-m-d');

                // reformat started date
                if (!empty($data['started'])) {
                    $date = new Date($this->request->data['started']);
                } else {
                    $date = new Date(date('Y-m-d'));
                }
                $data['started'] = $date->format('Y-m-d');

                // reformat ended date
                if (!empty($data['ended'])) {
                    $date = new Date($this->request->data['ended']);
                } else {
                    $date = new Date(date('Y-m-d'));
                }
                $data['ended'] = $date->format('Y-m-d');

                // get issuer id
                $issuer_id = $this->getIssuerId($data['issuer_name'], $data['issuer_id']);

                // get training id
                if (empty($data['description'])) $data['description'] = $data['name'];
                $training_id = $this->getTrainingId($issuer_id, $data['name'], $data['description'], $data['started'], $data['ended'], $data['held']);

                $data['training_id'] = $training_id;
                $data['evidence_id'] = 0;
                $data['user_id'] = $this->Auth->user('id');
                $data['active'] = 1;

                $training = $TrainingsUsers->patchEntity($training, $data);
                if ($TrainingsUsers->save($training)) {
                    return $this->redirect(['controller' => 'trainings', 'action' => 'profile']);
                } else {
                    $this->Flash->error(__('The email could not be saved. Please, try again.'));
                    $this->set('isError', true);
                }
            }

            $data = $this->Trainings->Issuers->find('all', [
                'conditions' => ['Issuers.active' => 1],
                'order' => ['Issuers.name' => 'ASC']
            ]);

            $issuersOptions = [];
            foreach($data as $datum)
            {
                $issuersOptions[$datum->id] = $datum->name;
            }
            $this->set('issuersOptions', $issuersOptions);

            $breadcrumbs = [['trainings/profile', 'Pelatihan']];
            $breadcrumbs[] = ['profileAdd', 'Tambah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Pelatihan Tambah');
            $this->set(compact('training'));
            $this->set('_serialize', ['training']);
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
            $TrainingsUsers = TableRegistry::get('TrainingsUsers');
            $training = $TrainingsUsers->get($id, [
                'contain' => ['Trainings', 'Trainings.Issuers']
            ]);

            if ($TrainingsUsers->exists(['user_id' => $this->Auth->user('id'), 'id' => $id, 'active' => 1])) {
                if ($this->request->is(['patch', 'post', 'put'])) {

                    $data = $this->request->data;

                    // reformat held date
                    if (!empty($data['held'])) {
                        $date = new Date($this->request->data['held']);
                    } else {
                        $date = new Date(date('Y-m-d'));
                    }
                    $data['held'] = $date->format('Y-m-d');

                    // reformat started date
                    if (!empty($data['started'])) {
                        $date = new Date($this->request->data['started']);
                    } else {
                        $date = new Date(date('Y-m-d'));
                    }
                    $data['started'] = $date->format('Y-m-d');

                    // reformat ended date
                    if (!empty($data['ended'])) {
                        $date = new Date($this->request->data['ended']);
                    } else {
                        $date = new Date(date('Y-m-d'));
                    }
                    $data['ended'] = $date->format('Y-m-d');

                    // get issuer id
                    $issuer_id = $this->getIssuerId($data['issuer_name'], $data['issuer_id']);

                    // get training id
                    if (empty($data['description'])) $data['description'] = $data['name'];
                    $training_id = $this->getTrainingId($issuer_id, $data['name'], $data['description'], $data['started'], $data['ended'], $data['held']);

                    $data['training_id'] = $training_id;

                    $training = $TrainingsUsers->patchEntity($training, $data);
                    if ($TrainingsUsers->save($training)) {
                        $this->Flash->error(__('Pelatihan berhasil diubah'));
                        $this->set('isSuccess', true);
                        return $this->redirect(['controller' => 'trainings', 'action' => 'profile']);
                    } else {
                        $this->Flash->error(__('The email could not be saved. Please, try again.'));
                        $this->set('isError', true);
                    }
                }
            } else {
                return $this->redirect(['action' => 'profile']);
            }

            $training['started'] = new Date($training['started']);
            $training['started'] = $training['started']->format('d-m-Y');
            $training['ended'] = new Date($training['ended']);
            $training['ended'] = $training['ended']->format('d-m-Y');
            $training['held'] = new Date($training['held']);
            $training['held'] = $training['held']->format('d-m-Y');

            $data = $this->Trainings->Issuers->find('all', [
                'conditions' => ['Issuers.active' => 1],
                'order' => ['Issuers.name' => 'ASC']
            ]);

            $issuersOptions = [];
            foreach($data as $datum)
            {
                $issuersOptions[$datum->id] = $datum->name;
            }
            $this->set('issuersOptions', $issuersOptions);

            $breadcrumbs = [['trainings/profile', 'Pelatihan']];
            $breadcrumbs[] = ['profileEdit', 'Ubah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Pelatihan Ubah');
            $this->set(compact('training'));
            $this->set('_serialize', ['training']);
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
            $newData = $this->Trainings->Issuers->newEntity();
            $newData->name = $name;
            $newData->active = 1;
            if ($this->Trainings->Issuers->save($newData)) {
                $data_id = $newData->id;
            }
        } else {
            $data_id = $id;
        }
        return $data_id;
    }

    /**
    * Get Education Id method
    *
    * @param string $name
    * @return int $data_id
    */
    private function getTrainingId($issuer_id = null, $name = null, $description = null, $started = null, $ended = null, $held = null)
    {
        $data = $this->Trainings->find('all', [
            'conditions' => [
                'Trainings.issuer_id' => $issuer_id,
                'Trainings.name' => $name,
                'Trainings.description' => $description,
                'Trainings.started' => $started,
                'Trainings.ended' => $ended,
                'Trainings.held' => $held,
                'Trainings.active' => 1
            ]
        ]);

        if ($data->count() < 1)
        {
            $newData = $this->Trainings->newEntity();
            $newData->issuer_id = $issuer_id;
            $newData->name = $name;
            $newData->description = $description;
            $newData->started = $started;
            $newData->ended = $ended;
            $newData->held = $held;
            $newData->active = 1;
            if ($this->Trainings->save($newData)) {
                $data_id = $newData->id;
            }
        } else {
            $data = $data->first();
            $data_id = $data->id;
        }
        return $data_id;
    }

}
