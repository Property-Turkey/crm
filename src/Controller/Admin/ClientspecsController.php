<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ClientSpecs Controller
 *
 * @property \App\Model\Table\ClientSpecsTable $ClientSpecs
 * @method \App\Model\Entity\ClientSpec[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientSpecsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Currency', 'Persona', 'Style'],
        ];
        $clientSpecs = $this->paginate($this->ClientSpecs);

        $this->set(compact('clientSpecs'));
    }

    /**
     * View method
     *
     * @param string|null $id Client Spec id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clientSpec = $this->ClientSpecs->get($id, [
            'contain' => ['Clients', 'Currency', 'Persona', 'Style'],
        ]);

        $this->set(compact('clientSpec'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clientSpec = $this->ClientSpecs->newEmptyEntity();
        if ($this->request->is('post')) {
            $clientSpec = $this->ClientSpecs->patchEntity($clientSpec, $this->request->getData());
            if ($this->ClientSpecs->save($clientSpec)) {
                $this->Flash->success(__('The client spec has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client spec could not be saved. Please, try again.'));
        }
        $clients = $this->ClientSpecs->Clients->find('list', ['limit' => 200])->all();
        $currency = $this->ClientSpecs->Currency->find('list', ['limit' => 200])->all();
        $persona = $this->ClientSpecs->Persona->find('list', ['limit' => 200])->all();
        $style = $this->ClientSpecs->Style->find('list', ['limit' => 200])->all();
        $this->set(compact('clientSpec', 'clients', 'currency', 'persona', 'style'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client Spec id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clientSpec = $this->ClientSpecs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clientSpec = $this->ClientSpecs->patchEntity($clientSpec, $this->request->getData());
            if ($this->ClientSpecs->save($clientSpec)) {
                $this->Flash->success(__('The client spec has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client spec could not be saved. Please, try again.'));
        }
        $clients = $this->ClientSpecs->Clients->find('list', ['limit' => 200])->all();
        $currency = $this->ClientSpecs->Currency->find('list', ['limit' => 200])->all();
        $persona = $this->ClientSpecs->Persona->find('list', ['limit' => 200])->all();
        $style = $this->ClientSpecs->Style->find('list', ['limit' => 200])->all();
        $this->set(compact('clientSpec', 'clients', 'currency', 'persona', 'style'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client Spec id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clientSpec = $this->ClientSpecs->get($id);
        if ($this->ClientSpecs->delete($clientSpec)) {
            $this->Flash->success(__('The client spec has been deleted.'));
        } else {
            $this->Flash->error(__('The client spec could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
