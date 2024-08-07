<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Enquires Controller
 *
 * @property \App\Model\Table\EnquiresTable $Enquires
 * @method \App\Model\Entity\Enquire[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnquiresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Sources', 'Country'],
        ];
        $enquires = $this->paginate($this->Enquires);

        $this->set(compact('enquires'));
    }

    /**
     * View method
     *
     * @param string|null $id Enquire id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enquire = $this->Enquires->get($id, [
            'contain' => ['Clients', 'Sources', 'Country'],
        ]);

        $this->set(compact('enquire'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enquire = $this->Enquires->newEmptyEntity();
        if ($this->request->is('post')) {
            $enquire = $this->Enquires->patchEntity($enquire, $this->request->getData());
            if ($this->Enquires->save($enquire)) {
                $this->Flash->success(__('The enquire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enquire could not be saved. Please, try again.'));
        }
        $clients = $this->Enquires->Clients->find('list', ['limit' => 200])->all();
        $sources = $this->Enquires->Sources->find('list', ['limit' => 200])->all();
        $country = $this->Enquires->Country->find('list', ['limit' => 200])->all();
        $this->set(compact('enquire', 'clients', 'sources', 'country'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enquire id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enquire = $this->Enquires->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enquire = $this->Enquires->patchEntity($enquire, $this->request->getData());
            if ($this->Enquires->save($enquire)) {
                $this->Flash->success(__('The enquire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enquire could not be saved. Please, try again.'));
        }
        $clients = $this->Enquires->Clients->find('list', ['limit' => 200])->all();
        $sources = $this->Enquires->Sources->find('list', ['limit' => 200])->all();
        $country = $this->Enquires->Country->find('list', ['limit' => 200])->all();
        $this->set(compact('enquire', 'clients', 'sources', 'country'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enquire id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enquire = $this->Enquires->get($id);
        if ($this->Enquires->delete($enquire)) {
            $this->Flash->success(__('The enquire has been deleted.'));
        } else {
            $this->Flash->error(__('The enquire could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
