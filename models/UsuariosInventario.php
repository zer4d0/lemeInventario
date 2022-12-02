<?php

namespace app\models;
use yii\db\ActiveRecord;
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

     public $nome;
     public $email;
    //  public $idade;

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
            [['usuario_id', 'usu_ativo', 'usuario_nome', 'usuario_email'], 'required', 'message' => 'Campo Obrigatório!!!'],
            [['usuario_id', 'usuario_permissao_id'], 'default', 'value' => null],
            [['usu_ativo'], 'default', 'value' => true],
            [['usuario_id', 'usuario_permissao_id'], 'integer'],
            ['usuario_email', 'email'],
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
            'usuario_id' => '',
            'usuario_nome' => 'Nome completo ou Apelido',
            'usuario_email' => 'E-mail',
            'usuario_permissao_id' => '',
            'usu_ativo' => 'Manter ativo'
        ];
    }

    // Consulta a quantidade de registros no banco, a fim de incrementar com +1 e gerar um novo ID de usuário.
    public function actionUsuarioIdConsulta()
    {
        $query = self::find()
        ->select(['usuario_id'])
        ->count();
        return $query;
        
    }

    // Consulta se existe um ID no banco de acordo com o campo de id do POST.
    public function actionConsultaUsuExistente($value = 0)
    {   
        $query = self::findOne($value);
        return $query;
        
    }

}
