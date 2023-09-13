<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Uzersale Controller
 *
 * @method \App\Model\Entity\Uzersale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UzersaleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $uzersale = $this->paginate($this->Uzersale);

        $this->set(compact('uzersale'));
    }

    /**
     * View method
     *
     * @param string|null $id Uzersale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $uzersale = $this->Uzersale->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('uzersale'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $uzersale = $this->Uzersale->newEmptyEntity();
        if ($this->request->is('post')) {
            $uzersale = $this->Uzersale->patchEntity($uzersale, $this->request->getData());
            if ($this->Uzersale->save($uzersale)) {
                $this->Flash->success(__('The uzersale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uzersale could not be saved. Please, try again.'));
        }
        $this->set(compact('uzersale'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Uzersale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $uzersale = $this->Uzersale->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $uzersale = $this->Uzersale->patchEntity($uzersale, $this->request->getData());
            if ($this->Uzersale->save($uzersale)) {
                $this->Flash->success(__('The uzersale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uzersale could not be saved. Please, try again.'));
        }
        $this->set(compact('uzersale'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Uzersale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $uzersale = $this->Uzersale->get($id);
        if ($this->Uzersale->delete($uzersale)) {
            $this->Flash->success(__('The uzersale has been deleted.'));
        } else {
            $this->Flash->error(__('The uzersale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
