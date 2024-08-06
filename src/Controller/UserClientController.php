<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UserClient Controller
 *
 * @property \App\Model\Table\UserClientTable $UserClient
 * @method \App\Model\Entity\UserClient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserClientController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $userClient = $this->paginate($this->UserClient);

        $this->set(compact('userClient'));
    }

    /**
     * View method
     *
     * @param string|null $id User Client id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userClient = $this->UserClient->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('userClient'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userClient = $this->UserClient->newEmptyEntity();
        if ($this->request->is('post')) {
            $userClient = $this->UserClient->patchEntity($userClient, $this->request->getData());
            if ($this->UserClient->save($userClient)) {
                $this->Flash->success(__('The user client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user client could not be saved. Please, try again.'));
        }
        $users = $this->UserClient->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userClient', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Client id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userClient = $this->UserClient->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userClient = $this->UserClient->patchEntity($userClient, $this->request->getData());
            if ($this->UserClient->save($userClient)) {
                $this->Flash->success(__('The user client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user client could not be saved. Please, try again.'));
        }
        $users = $this->UserClient->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userClient', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Client id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userClient = $this->UserClient->get($id);
        if ($this->UserClient->delete($userClient)) {
            $this->Flash->success(__('The user client has been deleted.'));
        } else {
            $this->Flash->error(__('The user client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
