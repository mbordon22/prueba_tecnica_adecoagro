<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Proveedore;
use App\Model\Entity\CompraDetalle;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Compras Controller
 *
 * @property \App\Model\Table\ComprasTable $Compras
 * @method \App\Model\Entity\Compra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComprasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $compras = $this->paginate($this->Compras, [
            'contain' => ['Proveedores']
        ]);
        
        $this->set(compact('compras'));
    }

    /**
     * View method
     *
     * @param string|null $id Compra id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $compra = $this->Compras->get($id, [
            'contain' => ['Proveedores','CompraDetalle.Productos'],
        ]);

        $this->set(compact('compra'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $compra = $this->Compras->newEmptyEntity();

        //Información para el select de proveedores
        $proveedores = $this->fetchTable('Proveedores')->find('list', [
            'keyField' => 'id',
            'valueField' => function ($proveedores) {
                return $proveedores->get('label');
            }
        ]);

        //Información para el select de productos
        $productos = $this->fetchTable('Productos')->find('list', [
            'keyField' => 'id',
            'valueField' => function ($productos) {
                return $productos->get('label');
            }
        ]);

        
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            
            $array_productos = json_decode($this->request->getData('productos'),true);
            
            $compra = $this->Compras->newEmptyEntity();
            $compra->id_proveedor = $this->request->getData('id_proveedor');
            $compra->fecha = $this->request->getData('fecha');
            $compra->importe = filter_var($this->request->getData('importe'),FILTER_SANITIZE_NUMBER_FLOAT);

            if ($this->Compras->save($compra)) {
                $id_compra = $compra->id;
                
                foreach($array_productos as $producto){
                    $compra_detalle_table = $this->getTableLocator()->get('CompraDetalle');
                    $detalle = $compra_detalle_table->newEmptyEntity();
                    $detalle->id_compra = $id_compra;
                    $detalle->id_producto = $producto['id_producto'];
                    $detalle->cantidad = $producto['cantidad'];
                    $compra_detalle_table->save($detalle);
                }
                $this->Flash->success(__('La compra fue guardada con éxito.'));
                

                return $this->response->withType('application/json')
                                        ->withStringBody(json_encode(['status' => 'success', "action" => 'add']));
            }
            $this->Flash->error(__('La compra no pudo ser guardada. Intente de nuevo'));
        }
        $this->set(compact('compra','proveedores','productos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Compra id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $compra = $this->Compras->get($id, [
            'contain' => ['Proveedores', 'CompraDetalle.Productos'],
        ]);

        //Información para el select de proveedores
        $proveedores = $this->fetchTable('Proveedores')->find('list', [
            'keyField' => 'id',
            'valueField' => function ($proveedores) {
                return $proveedores->get('label');
            }
        ]);

        //Información para el select de productos
        $productos = $this->fetchTable('Productos')->find('list', [
            'keyField' => 'id',
            'valueField' => function ($productos) {
                return $productos->get('label');
            }
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->getData();
            $array_productos = json_decode($this->request->getData('productos'),true);

            $this->Compras->patchEntity($compra,$this->request->getData());

            if ($this->Compras->save($compra)) {
                
                //Eliminamos el detalle de la compra
                $compra_detalle_table = $this->getTableLocator()->get('CompraDetalle');
                $compra_detalle_table->deleteAll(["id_compra" => $id]);

                foreach($array_productos as $producto){
                    //Guardamos los datos de la tabla
                    $detalle = $compra_detalle_table->newEmptyEntity();
                    $detalle->id_compra = $id;
                    $detalle->id_producto = $producto['id_producto'];
                    $detalle->cantidad = $producto['cantidad'];
                    $compra_detalle_table->save($detalle);
                }

                $this->Flash->success(__('La compra fue guardada con éxito.'));

                return $this->response->withType('application/json')
                                        ->withStringBody(json_encode(['status' => 'success', "action" => 'edit']));
            }
            $this->Flash->error(__('La compra no pudo ser guardada. Intente de nuevo'));
        }
        $this->set(compact('compra','proveedores','productos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Compra id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $compra = $this->Compras->get($id);
        if ($this->Compras->delete($compra)) {
            $compra_detalle_table = $this->getTableLocator()->get('CompraDetalle');
            $compra_detalle_table->deleteAll(["id_compra" => $id]);

            $this->Flash->success(__('La compra fue eliminada.'));
        } else {
            $this->Flash->error(__('La compra no pudo ser eliminada. Intente de nuevo'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
