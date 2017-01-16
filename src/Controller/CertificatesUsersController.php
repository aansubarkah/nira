<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CertificatesUsers Controller
 *
 * @property \App\Model\Table\CertificatesUsersTable $CertificatesUsers
 */
class CertificatesUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Certificates', 'Users', 'Evidences']
        ];
        $certificatesUsers = $this->paginate($this->CertificatesUsers);

        $this->set(compact('certificatesUsers'));
        $this->set('_serialize', ['certificatesUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Certificates User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $certificatesUser = $this->CertificatesUsers->get($id, [
            'contain' => ['Certificates', 'Users', 'Evidences']
        ]);

        $this->set('certificatesUser', $certificatesUser);
        $this->set('_serialize', ['certificatesUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $certificatesUser = $this->CertificatesUsers->newEntity();
        if ($this->request->is('post')) {
            $certificatesUser = $this->CertificatesUsers->patchEntity($certificatesUser, $this->request->data);
            if ($this->CertificatesUsers->save($certificatesUser)) {
                $this->Flash->success(__('The certificates user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The certificates user could not be saved. Please, try again.'));
            }
        }
        $certificates = $this->CertificatesUsers->Certificates->find('list', ['limit' => 200]);
        $users = $this->CertificatesUsers->Users->find('list', ['limit' => 200]);
        $evidences = $this->CertificatesUsers->Evidences->find('list', ['limit' => 200]);
        $this->set(compact('certificatesUser', 'certificates', 'users', 'evidences'));
        $this->set('_serialize', ['certificatesUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Certificates User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $certificatesUser = $this->CertificatesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $certificatesUser = $this->CertificatesUsers->patchEntity($certificatesUser, $this->request->data);
            if ($this->CertificatesUsers->save($certificatesUser)) {
                $this->Flash->success(__('The certificates user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The certificates user could not be saved. Please, try again.'));
            }
        }
        $certificates = $this->CertificatesUsers->Certificates->find('list', ['limit' => 200]);
        $users = $this->CertificatesUsers->Users->find('list', ['limit' => 200]);
        $evidences = $this->CertificatesUsers->Evidences->find('list', ['limit' => 200]);
        $this->set(compact('certificatesUser', 'certificates', 'users', 'evidences'));
        $this->set('_serialize', ['certificatesUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Certificates User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $certificatesUser = $this->CertificatesUsers->get($id);
        if ($this->CertificatesUsers->delete($certificatesUser)) {
            $this->Flash->success(__('The certificates user has been deleted.'));
        } else {
            $this->Flash->error(__('The certificates user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Profile Delete method
     *
     * @param string|null $id Emails User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function profileDelete($id = null)
    {
        if ($this->Auth->user()) {
            $user_id = $this->Auth->user('id');

            $data = $this->CertificatesUsers->get($id);
            if ($data->user_id == $user_id) {
                $data->active = 0;
                $this->CertificatesUsers->save($data);
            }

            return $this->redirect(['controller' => 'certificates', 'action' => 'profile']);
        }
    }

}
