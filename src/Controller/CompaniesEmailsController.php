<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CompaniesEmails Controller
 *
 * @property \App\Model\Table\CompaniesEmailsTable $CompaniesEmails
 */
class CompaniesEmailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies', 'Emails']
        ];
        $companiesEmails = $this->paginate($this->CompaniesEmails);

        $this->set(compact('companiesEmails'));
        $this->set('_serialize', ['companiesEmails']);
    }

    /**
     * View method
     *
     * @param string|null $id Companies Email id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $companiesEmail = $this->CompaniesEmails->get($id, [
            'contain' => ['Companies', 'Emails']
        ]);

        $this->set('companiesEmail', $companiesEmail);
        $this->set('_serialize', ['companiesEmail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $companiesEmail = $this->CompaniesEmails->newEntity();
        if ($this->request->is('post')) {
            $companiesEmail = $this->CompaniesEmails->patchEntity($companiesEmail, $this->request->data);
            if ($this->CompaniesEmails->save($companiesEmail)) {
                $this->Flash->success(__('The companies email has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The companies email could not be saved. Please, try again.'));
            }
        }
        $companies = $this->CompaniesEmails->Companies->find('list', ['limit' => 200]);
        $emails = $this->CompaniesEmails->Emails->find('list', ['limit' => 200]);
        $this->set(compact('companiesEmail', 'companies', 'emails'));
        $this->set('_serialize', ['companiesEmail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Companies Email id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $companiesEmail = $this->CompaniesEmails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $companiesEmail = $this->CompaniesEmails->patchEntity($companiesEmail, $this->request->data);
            if ($this->CompaniesEmails->save($companiesEmail)) {
                $this->Flash->success(__('The companies email has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The companies email could not be saved. Please, try again.'));
            }
        }
        $companies = $this->CompaniesEmails->Companies->find('list', ['limit' => 200]);
        $emails = $this->CompaniesEmails->Emails->find('list', ['limit' => 200]);
        $this->set(compact('companiesEmail', 'companies', 'emails'));
        $this->set('_serialize', ['companiesEmail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Companies Email id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $companiesEmail = $this->CompaniesEmails->get($id);
        if ($this->CompaniesEmails->delete($companiesEmail)) {
            $this->Flash->success(__('The companies email has been deleted.'));
        } else {
            $this->Flash->error(__('The companies email could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
