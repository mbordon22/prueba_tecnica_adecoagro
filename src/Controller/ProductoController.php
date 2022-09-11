<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Producto Controller
 *
 * @property \App\Model\Table\ProductoTable $Producto
 * @method \App\Model\Entity\Producto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $producto = $this->paginate($this->Producto);

        $this->set(compact('producto'));
    }

    /**
     * View method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $producto = $this->Producto->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('producto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $producto = $this->Producto->newEmptyEntity();
        if ($this->request->is('post')) {
            $producto = $this->Producto->patchEntity($producto, $this->request->getData());
            if ($this->Producto->save($producto)) {
                $this->Flash->success(__('El producto fue guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El producto no pudo ser guardado. Por favor, vuelva a intentarlo.'));
        }
        $this->set(compact('producto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $producto = $this->Producto->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $producto = $this->Producto->patchEntity($producto, $this->request->getData());
            if ($this->Producto->save($producto)) {
                $this->Flash->success(__('El producto fue editado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El producto no pudo ser editado. Por favor, vuelva a intentarlo.'));
        }
        $this->set(compact('producto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producto = $this->Producto->get($id);
        if ($this->Producto->delete($producto)) {
            $this->Flash->success(__('El producto fue eliminado.'));
        } else {
            $this->Flash->error(__('El producto no pudo ser eliminado. Por favor, vuelva a intentarlo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
