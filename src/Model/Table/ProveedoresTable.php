<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Proveedores Model
 *
 * @method \App\Model\Entity\Proveedore newEmptyEntity()
 * @method \App\Model\Entity\Proveedore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Proveedore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Proveedore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Proveedore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Proveedore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Proveedore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Proveedore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proveedore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proveedore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Proveedore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Proveedore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Proveedore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProveedoresTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('proveedores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 255)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('apellido')
            ->maxLength('apellido', 255)
            ->requirePresence('apellido', 'create')
            ->notEmptyString('apellido');

        $validator
            ->numeric('dni', 'El campo tiene que ser númerico')
            ->maxLength('dni', 255)
            ->requirePresence('dni', 'create')
            ->notEmptyString('dni')
            ->add('dni',[
                'length' => [
                    'rule' => ['minLength', 7],
                    'message' => 'El número de DNI debe tener al menos 7 digitos'
                ]
            ]);

        $validator
            ->scalar('domicilio')
            ->maxLength('domicilio', 500)
            ->requirePresence('domicilio', 'create')
            ->notEmptyString('domicilio')
            ->add('domicilio',[
                'length' => [
                    'rule' => ['minLength', 10],
                    'message' => 'El domicilio debe tener al menos 10 digitos'
                ]
            ]);

        $validator
            ->email('mail',false,'El campo tiene que ser un email valido')
            ->maxLength('mail', 255)
            ->requirePresence('mail', 'create')
            ->notEmptyString('mail');

        $validator
            ->numeric('telefono', 'El campo tiene que ser númerico')
            ->maxLength('telefono', 255)
            ->requirePresence('telefono', 'create')
            ->notEmptyString('telefono')
            ->add('telefono',[
                'length' => [
                    'rule' => ['minLength', 8],
                    'message' => 'El telefono debe tener al menos 8 digitos'
                ]
            ]);

        return $validator;
    }
}
