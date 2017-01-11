<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmailsOffices Controller
 *
 * @property \App\Model\Table\EmailsOfficesTable $EmailsOffices
 */
class EmailsOfficesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Offices', 'Emails']
        ];
        $emailsOffices = $this->paginate($this->EmailsOffices);

        $this->set(compact('emailsOffices'));
        $this->set('_serialize', ['emailsOffices']);
    }

    /**
     * View method
     *
     * @param string|null $id Emails Office id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emailsOffice = $this->EmailsOffices->get($id, [
            'contain' => ['Offices', 'Emails']
        ]);

        $this->set('emailsOffice', $emailsOffice);
        $this->set('_serialize', ['emailsOffice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emailsOffice = $this->EmailsOffices->newEntity();
        if ($this->request->is('post')) {
            $emailsOffice = $this->EmailsOffices->patchEntity($emailsOffice, $this->request->data);
            if ($this->EmailsOffices->save($emailsOffice)) {
                $this->Flash->success(__('The emails office has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emails office could not be saved. Please, try again.'));
            }
        }
        $offices = $this->EmailsOffices->Offices->find('list', ['limit' => 200]);
        $emails = $this->EmailsOffices->Emails->find('list', ['limit' => 200]);
        $this->set(compact('emailsOffice', 'offices', 'emails'));
        $this->set('_serialize', ['emailsOffice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Emails Office id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emailsOffice = $this->EmailsOffices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emailsOffice = $this->EmailsOffices->patchEntity($emailsOffice, $this->request->data);
            if ($this->EmailsOffices->save($emailsOffice)) {
                $this->Flash->success(__('The emails office has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The emails office could not be saved. Please, try again.'));
            }
        }
        $offices = $this->EmailsOffices->Offices->find('list', ['limit' => 200]);
        $emails = $this->EmailsOffices->Emails->find('list', ['limit' => 200]);
        $this->set(compact('emailsOffice', 'offices', 'emails'));
        $this->set('_serialize', ['emailsOffice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Emails Office id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emailsOffice = $this->EmailsOffices->get($id);
        if ($this->EmailsOffices->delete($emailsOffice)) {
            $this->Flash->success(__('The emails office has been deleted.'));
        } else {
            $this->Flash->error(__('The emails office could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
