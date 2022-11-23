<?php   

namespace app\controllers;

use yii\base\Controller;
use app\models\UsuariosInventario;
use yii\data\pagination;
use yii\db\ActiveRecord;
use Yii;

class HomePageController extends Controller
{   
    public function actionFormulario()
    {   
        $model = new UsuariosInventario;
        $request = Yii::$app->request->post();
        $consultaIdBanco = $model->actionUsuarioIdConsulta();
        $novoId = $consultaIdBanco + 1;
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

        // Salva dados usuário no ato da criação
        $model = new UsuariosInventario;
        $request = Yii::$app->request->post();
        $consultaIdBanco = $model->actionUsuarioIdConsulta();
        if($model->validate($request)){
            $model->load($request);
            $model->save();
            $idCadastro = $request['UsuariosInventario']['usuario_id'];
            $resultado = $model->actionConsultaUsuExistente($idCadastro);
            
        }

        // Atualiza o cadastro
        if(!empty($resultado)){
            $resultado->usuario_nome = $request['UsuariosInventario']['usuario_nome'];
            $resultado->usuario_email = $request['UsuariosInventario']['usuario_email'];
            $resultado->usu_ativo = $request['UsuariosInventario']['usu_ativo'];
            $resultado->save();
            $this->actionRemoveUsuario($resultado);
            
        }

        return $this->render('boas-vindas',[
            'model' => $model,
            'request' => $request,
            'idCadastro'  => $idCadastro,

        ]);


    }

    public function actionRemoveUsuario($resultado)
    {
     
        if($resultado->usu_ativo == 0){
           echo("usuario inativado com sucesso.");
           die;
        }
        


    }

}


















?>