<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Educations Controller
 *
 * @property \App\Model\Table\EducationsTable $Educations
 */
class EducationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Colleges', 'Levels']
        ];
        $educations = $this->paginate($this->Educations);

        $this->set(compact('educations'));
        $this->set('_serialize', ['educations']);
    }

    /**
     * View method
     *
     * @param string|null $id Education id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $education = $this->Educations->get($id, [
            'contain' => ['Colleges', 'Levels', 'Users']
        ]);

        $this->set('education', $education);
        $this->set('_serialize', ['education']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $education = $this->Educations->newEntity();
        if ($this->request->is('post')) {
            $education = $this->Educations->patchEntity($education, $this->request->data);
            if ($this->Educations->save($education)) {
                $this->Flash->success(__('The education has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The education could not be saved. Please, try again.'));
            }
        }
        $colleges = $this->Educations->Colleges->find('list', ['limit' => 200]);
        $levels = $this->Educations->Levels->find('list', ['limit' => 200]);
        $users = $this->Educations->Users->find('list', ['limit' => 200]);
        $this->set(compact('education', 'colleges', 'levels', 'users'));
        $this->set('_serialize', ['education']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Education id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $education = $this->Educations->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $education = $this->Educations->patchEntity($education, $this->request->data);
            if ($this->Educations->save($education)) {
                $this->Flash->success(__('The education has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The education could not be saved. Please, try again.'));
            }
        }
        $colleges = $this->Educations->Colleges->find('list', ['limit' => 200]);
        $levels = $this->Educations->Levels->find('list', ['limit' => 200]);
        $users = $this->Educations->Users->find('list', ['limit' => 200]);
        $this->set(compact('education', 'colleges', 'levels', 'users'));
        $this->set('_serialize', ['education']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Education id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $education = $this->Educations->get($id);
        if ($this->Educations->delete($education)) {
            $this->Flash->success(__('The education has been deleted.'));
        } else {
            $this->Flash->error(__('The education could not be deleted. Please, try again.'));
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
            $EducationsUsers = TableRegistry::get('EducationsUsers');

            $id = $this->Auth->user('id');
            $educations = $EducationsUsers->find()
                ->where(['EducationsUsers.user_id' => $id, 'EducationsUsers.active' => 1])
                ->contain([
                    'Educations',
                    'Educations.Colleges',
                    'Educations.Levels'
                ])
                ->order(['EducationsUsers.held' => 'DESC']);

            $breadcrumbs = [['educations', 'Pendidikan']];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set(compact('educations', $educations));
            $this->set('_serialize', ['educations']);
            $this->set('title', 'Pendidikan');
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
            $EducationsUsers = TableRegistry::get('EducationsUsers');

            $education = $EducationsUsers->newEntity();

            if ($this->request->is('post')) {
                $data = $this->request->data;

                // get college id
                $college_id = $this->getCollegeId($data['college_name'], $data['college_id']);

                // get education id
                $education_id = $this->getEducationId($college_id, $data['level_id']);

                // reformat held date
                if (!empty($data['held'])) {
                    $date = new Date($this->request->data['held']);
                } else {
                    $date = new Date(date('Y-m-d'));
                }
                $data['held'] = $date->format('Y-m-d');

                $data['education_id'] = $education_id;
                $data['evidence_id'] = 0;
                $data['user_id'] = $this->Auth->user('id');
                $data['active'] = 1;

                $education = $EducationsUsers->patchEntity($education, $data);
                if ($EducationsUsers->save($education)) {
                    return $this->redirect(['controller' => 'educations', 'action' => 'profile']);
                } else {
                    $this->Flash->error(__('The email could not be saved. Please, try again.'));
                    $this->set('isError', true);
                }
            }

            $data = $this->Educations->Levels->find('all', [
                'conditions' => ['Levels.active' => 1],
                'order' => ['Levels.id' => 'ASC']
            ]);

            $levelOptions = [];
            foreach($data as $datum)
            {
                $levelOptions[$datum->id] = $datum->name;
            }
            $this->set('levelOptions', $levelOptions);

            $data = $this->Educations->Colleges->find('all', [
                'conditions' => ['Colleges.active' => 1],
                'order' => ['Colleges.name' => 'ASC']
            ]);

            $collegesOptions = [];
            foreach($data as $datum)
            {
                $collegesOptions[$datum->id] = $datum->name;
            }
            $this->set('collegesOptions', $collegesOptions);

            $breadcrumbs = [['educations/profile', 'Pendidikan']];
            $breadcrumbs[] = ['profileAdd', 'Tambah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Pendidikan Tambah');
            $this->set(compact('education'));
            $this->set('_serialize', ['education']);
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
            $EducationsUsers = TableRegistry::get('EducationsUsers');
            $education = $EducationsUsers->get($id, [
                'contain' => ['Educations', 'Educations.Colleges']
            ]);

            if ($EducationsUsers->exists(['user_id' => $this->Auth->user('id'), 'id' => $id, 'active' => 1])) {
                if ($this->request->is(['patch', 'post', 'put'])) {

                    $data = $this->request->data;

                    // get college id
                    $college_id = $this->getCollegeId($data['college_name'], $data['college_id']);

                    // get education id
                    $education_id = $this->getEducationId($college_id, $data['level_id']);

                    // reformat held date
                    if (!empty($data['held'])) {
                        $date = new Date($this->request->data['held']);
                    } else {
                        $date = new Date(date('Y-m-d'));
                    }
                    $data['held'] = $date->format('Y-m-d');
                    $data['education_id'] = $education_id;
                    $data['user_id'] = $this->Auth->user('id');
                    $education = $EducationsUsers->patchEntity($education, $data);
                    if ($EducationsUsers->save($education)) {
                        $this->Flash->error(__('Pendidikan berhasil diubah'));
                        $this->set('isSuccess', true);
                        return $this->redirect(['controller' => 'educations', 'action' => 'profile']);
                    } else {
                        $this->Flash->error(__('The email could not be saved. Please, try again.'));
                        $this->set('isError', true);
                    }
                }
            } else {
                return $this->redirect(['action' => 'profile']);
            }

            $education['held'] = new Date($education['held']);
            $education['held'] = $education['held']->format('d-m-Y');

            $data = $this->Educations->Levels->find('all', [
                'conditions' => ['Levels.active' => 1],
                'order' => ['Levels.id' => 'ASC']
            ]);

            $levelOptions = [];
            foreach($data as $datum)
            {
                $levelOptions[$datum->id] = $datum->name;
            }
            $this->set('levelOptions', $levelOptions);

            $data = $this->Educations->Colleges->find('all', [
                'conditions' => ['Colleges.active' => 1],
                'order' => ['Colleges.name' => 'ASC']
            ]);

            $collegesOptions = [];
            foreach($data as $datum)
            {
                $collegesOptions[$datum->id] = $datum->name;
            }
            $this->set('collegesOptions', $collegesOptions);

            $breadcrumbs = [['educations/profile', 'Pendidikan']];
            $breadcrumbs[] = ['profileEdit', 'Ubah'];
            $this->set('breadcrumbs', $breadcrumbs);
            $this->set('title', 'Pendidikan Ubah');
            $this->set(compact('education'));
            $this->set('_serialize', ['education']);
        }
    }

    /**
    * Get College Id method
    *
    * @param string $name
    * @return int $data_id
    */
    private function getCollegeId($name = null, $id = null)
    {
        $data = $this->Educations->Colleges->find('all', [
            'conditions' => [
                'Colleges.id' => $id,
                'Colleges.name' => $name,
                'Colleges.active' => 1
            ]
        ]);

        if ($data->count() < 1)
        {
            $newData = $this->Educations->Colleges->newEntity();
            $newData->name = $name;
            $newData->active = 1;
            if ($this->Educations->Colleges->save($newData)) {
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
    private function getEducationId($college_id = null, $level_id = null)
    {
        $data = $this->Educations->find('all', [
            'conditions' => [
                'Educations.college_id' => $college_id,
                'Educations.level_id' => $level_id,
                'Educations.active' => 1
            ]
        ]);

        if ($data->count() < 1)
        {
            $newData = $this->Educations->newEntity();
            $newData->college_id = $college_id;
            $newData->level_id = $level_id;
            $newData->active = 1;
            if ($this->Educations->save($newData)) {
                $data_id = $newData->id;
            }
        } else {
            $data = $data->first();
            $data_id = $data->id;
        }
        return $data_id;
    }

}
