<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sales Controller
 *
 * @property \App\Model\Table\SalesTable $Sales
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Tags', 'Categories', 'Sources', 'Pools', 'Status', 'Type'],
        ];
        $sales = $this->paginate($this->Sales);

        $this->set(compact('sales'));
    }

    /**
     * View method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => ['Clients', 'Tags', 'Categories', 'Sources', 'Pools', 'Status', 'Type', 'Reports', 'Books', 'Usersale', 'SaleSpecs'],
        ]);

        $this->set(compact('sale'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sale = $this->Sales->newEmptyEntity();
        if ($this->request->is('post')) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $clients = $this->Sales->Clients->find('list', ['limit' => 200])->all();
        $tags = $this->Sales->Tags->find('list', ['limit' => 200])->all();
        $categories = $this->Sales->Categories->find('list', ['limit' => 200])->all();
        $sources = $this->Sales->Sources->find('list', ['limit' => 200])->all();
        $pools = $this->Sales->Pools->find('list', ['limit' => 200])->all();
        $status = $this->Sales->Status->find('list', ['limit' => 200])->all();
        $type = $this->Sales->Type->find('list', ['limit' => 200])->all();
        $this->set(compact('sale', 'clients', 'tags', 'categories', 'sources', 'pools', 'status', 'type'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $clients = $this->Sales->Clients->find('list', ['limit' => 200])->all();
        $tags = $this->Sales->Tags->find('list', ['limit' => 200])->all();
        $categories = $this->Sales->Categories->find('list', ['limit' => 200])->all();
        $sources = $this->Sales->Sources->find('list', ['limit' => 200])->all();
        $pools = $this->Sales->Pools->find('list', ['limit' => 200])->all();
        $status = $this->Sales->Status->find('list', ['limit' => 200])->all();
        $type = $this->Sales->Type->find('list', ['limit' => 200])->all();
        $this->set(compact('sale', 'clients', 'tags', 'categories', 'sources', 'pools', 'status', 'type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sale = $this->Sales->get($id);
        if ($this->Sales->delete($sale)) {
            $this->Flash->success(__('The sale has been deleted.'));
        } else {
            $this->Flash->error(__('The sale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
