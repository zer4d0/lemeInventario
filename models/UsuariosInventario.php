<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios_inventario".
 *
 * @property int $usuario_id
 * @property string|null $usuario_nome
 * @property string|null $usuario_email
 * @property int|null $usuario_permissao_id
 */
class UsuariosInventario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios_inventario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id'], 'required'],
            [['usuario_id', 'usuario_permissao_id'], 'default', 'value' => null],
            [['usuario_id', 'usuario_permissao_id'], 'integer'],
            [['usuario_nome', 'usuario_email'], 'string', 'max' => 100],
            [['usuario_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => 'Usuario ID',
            'usuario_nome' => 'Usuario Nome',
            'usuario_email' => 'Usuario Email',
            'usuario_permissao_id' => 'Usuario Permissao ID',
        ];
    }
}
