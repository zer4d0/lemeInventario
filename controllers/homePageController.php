<?php   

namespace app\controllers;

use yii\base\Controller;
use app\models\UsuariosInventario;
use yii\db\ActiveRecord;
use Yii;

class HomePageController extends Controller
{   
    public function actionFormulario()
    {   
        // Estancia model.
        $model = new UsuariosInventario;
        // Request - POST
        $request = Yii::$app->request->post();
        // Declara método de consulta de ID usuário
        $consultaIdBanco = $model->actionUsuarioIdConsulta();
        // pega o count da função e junta com + 1
        $novoId = $consultaIdBanco + 1;
        // Se não existir requisição, redireciona pra view de cadastro, se não, chama próximo método
        if(empty($request)){
            return $this->render('formulario',[
                'model' => $model,
                'request' => $request,
                'novoId'  => $novoId,

            ]);
        }
      
    }

    public function actionEditarCadastro()
    {

        // Estancia model 
        $model = new UsuariosInventario;
        $request = Yii::$app->request->post();
        // Declara método de consulta de ID usuário
        $consultaIdBanco = $model->actionUsuarioIdConsulta();

        if($model->validate($request)){
            $model->load($request);
            $model->save();
            // Atribui o usuario ID a variavel
            $idCadastro = $request['UsuariosInventario']['usuario_id'];
            // Passa o ID gerado na request para verificar se existe registro com o mesmo ID
            $resultado = $model->actionConsultaUsuExistente($idCadastro);
            
        }

        /**
         * Realiza o update do usuário, populando o post com a model.
         * envia o resultado da query "actionConsultaUsuExistente"  para a action de inativação de usuário
         * 
         */
        if(!empty($resultado)){
            $resultado->usuario_nome = $request['UsuariosInventario']['usuario_nome'];
            $resultado->usuario_email = $request['UsuariosInventario']['usuario_email'];
            $resultado->usu_ativo = $request['UsuariosInventario']['usu_ativo'];
            $resultado->save();
            $this->actionRemoveUsuario($resultado);
            
        }
        // Caso não exista POST, renderiza novamente a view de boas vindas
        return $this->render('boas-vindas',[
            'model' => $model,
            'request' => $request,
            'idCadastro'  => $idCadastro,

        ]);


    }

    public function actionRemoveUsuario($resultado)
    {
        // Se o campo usu_ativo receber false, inativa o usuário
        if($resultado->usu_ativo == 0){
           echo("usuario inativado com sucesso.");
           die;
        }
        


    }

}


















?>