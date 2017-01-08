<?php
namespace App\Controller;

use App\Controller\AppController;

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
}
