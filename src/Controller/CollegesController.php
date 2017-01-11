<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Colleges Controller
 *
 * @property \App\Model\Table\CollegesTable $Colleges
 */
class CollegesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $colleges = $this->paginate($this->Colleges);

        $this->set(compact('colleges'));
        $this->set('_serialize', ['colleges']);
    }

    /**
     * View method
     *
     * @param string|null $id College id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $college = $this->Colleges->get($id, [
            'contain' => ['Educations']
        ]);

        $this->set('college', $college);
        $this->set('_serialize', ['college']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $college = $this->Colleges->newEntity();
        if ($this->request->is('post')) {
            $college = $this->Colleges->patchEntity($college, $this->request->data);
            if ($this->Colleges->save($college)) {
                $this->Flash->success(__('The college has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The college could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('college'));
        $this->set('_serialize', ['college']);
    }

    /**
     * Edit method
     *
     * @param string|null $id College id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $college = $this->Colleges->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $college = $this->Colleges->patchEntity($college, $this->request->data);
            if ($this->Colleges->save($college)) {
                $this->Flash->success(__('The college has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The college could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('college'));
        $this->set('_serialize', ['college']);
    }

    /**
     * Delete method
     *
     * @param string|null $id College id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $college = $this->Colleges->get($id);
        if ($this->Colleges->delete($college)) {
            $this->Flash->success(__('The college has been deleted.'));
        } else {
            $this->Flash->error(__('The college could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
