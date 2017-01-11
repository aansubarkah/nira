<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CompaniesPhones Controller
 *
 * @property \App\Model\Table\CompaniesPhonesTable $CompaniesPhones
 */
class CompaniesPhonesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies', 'Phones']
        ];
        $companiesPhones = $this->paginate($this->CompaniesPhones);

        $this->set(compact('companiesPhones'));
        $this->set('_serialize', ['companiesPhones']);
    }

    /**
     * View method
     *
     * @param string|null $id Companies Phone id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $companiesPhone = $this->CompaniesPhones->get($id, [
            'contain' => ['Companies', 'Phones']
        ]);

        $this->set('companiesPhone', $companiesPhone);
        $this->set('_serialize', ['companiesPhone']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $companiesPhone = $this->CompaniesPhones->newEntity();
        if ($this->request->is('post')) {
            $companiesPhone = $this->CompaniesPhones->patchEntity($companiesPhone, $this->request->data);
            if ($this->CompaniesPhones->save($companiesPhone)) {
                $this->Flash->success(__('The companies phone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The companies phone could not be saved. Please, try again.'));
            }
        }
        $companies = $this->CompaniesPhones->Companies->find('list', ['limit' => 200]);
        $phones = $this->CompaniesPhones->Phones->find('list', ['limit' => 200]);
        $this->set(compact('companiesPhone', 'companies', 'phones'));
        $this->set('_serialize', ['companiesPhone']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Companies Phone id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $companiesPhone = $this->CompaniesPhones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $companiesPhone = $this->CompaniesPhones->patchEntity($companiesPhone, $this->request->data);
            if ($this->CompaniesPhones->save($companiesPhone)) {
                $this->Flash->success(__('The companies phone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The companies phone could not be saved. Please, try again.'));
            }
        }
        $companies = $this->CompaniesPhones->Companies->find('list', ['limit' => 200]);
        $phones = $this->CompaniesPhones->Phones->find('list', ['limit' => 200]);
        $this->set(compact('companiesPhone', 'companies', 'phones'));
        $this->set('_serialize', ['companiesPhone']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Companies Phone id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $companiesPhone = $this->CompaniesPhones->get($id);
        if ($this->CompaniesPhones->delete($companiesPhone)) {
            $this->Flash->success(__('The companies phone has been deleted.'));
        } else {
            $this->Flash->error(__('The companies phone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
