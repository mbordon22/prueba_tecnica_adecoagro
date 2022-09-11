<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Proveedores Controller
 *
 * @property \App\Model\Table\ProveedoresTable $Proveedores
 * @method \App\Model\Entity\Proveedore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProveedoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $proveedores = $this->paginate($this->Proveedores);

        $this->set(compact('proveedores'));
    }

    /**
     * View method
     *
     * @param string|null $id Proveedore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $proveedore = $this->Proveedores->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('proveedore'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $proveedore = $this->Proveedores->newEmptyEntity();
        if ($this->request->is('post')) {
            $proveedore = $this->Proveedores->patchEntity($proveedore, $this->request->getData());
            if ($this->Proveedores->save($proveedore)) {
                $this->Flash->success(__('El proveedor fue guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El proveedor no pudo ser guardado. Por favor, vuelva a intentarlo.'));
        }
        $this->set(compact('proveedore'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Proveedore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $proveedore = $this->Proveedores->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $proveedore = $this->Proveedores->patchEntity($proveedore, $this->request->getData());
            if ($this->Proveedores->save($proveedore)) {
                $this->Flash->success(__('El proveedor fue editado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El proveedor no pudo ser editado. Por favor, vuelva a intentarlo.'));
        }
        $this->set(compact('proveedore'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Proveedore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proveedore = $this->Proveedores->get($id);
        if ($this->Proveedores->delete($proveedore)) {
            $this->Flash->success(__('El proveedor fue eliminado.'));
        } else {
            $this->Flash->error(__('El proveedor no pudo ser eliminado. Por favor, vuelva a intentarlo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
