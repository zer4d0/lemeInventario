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

        $model = new UsuariosInventario;
        $request = Yii::$app->request->post();
        // var_dump($request);die;
        $consultaIdBanco = $model->actionUsuarioIdConsulta();
        if($model->validate($request)){
            $model->load($request);
            $model->save();
            $idCadastro = $request['UsuariosInventario']['usuario_id'];
            $resultado = $model->actionConsultaUsuExistente($idCadastro);
            
        }

        if(!empty($resultado)){
            $resultado->usuario_nome = $request['UsuariosInventario']['usuario_nome'];
            $resultado->usuario_email = $request['UsuariosInventario']['usuario_email'];
            $resultado->save();

        }

        return $this->render('boas-vindas',[
            'model' => $model,
            'request' => $request,
            'idCadastro'  => $idCadastro,

        ]);


    }

    public function actionRemoveUsuario()
    {

        $model = new UsuariosInventario;
        $request = Yii::$app->request->post();
        $requestId = $request['UsuariosInventario']['usuario_id'];
        $consultaIdBanco = $model->actionConsultaUsuExistente($requestId);
        if(isset($consultaIdBanco)){
            $consultaIdBanco->delete();
        }

        return $this->render('remove-usuario',[
            
        ]);


    }

}


















?>