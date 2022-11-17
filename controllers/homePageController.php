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
        // Estancia da Model de usuários.
        $modelCadastro = new UsuariosInventario;
        // Request Post.
        $requestForm = Yii::$app->request->post();
        // Retorna o numero de registros + 1 para gerar um id para o usuário que está sendo cadastrado.
        $idCadastro = $modelCadastro->actionUsuarioIdConsulta();
       
        // Popula request com a model
        if($modelCadastro->load($requestForm)){
            // Valida post inserido.
            $modelCadastro->validate();
            // Salva no banco.
            $modelCadastro->save();
            if(isset($requestForm)){
                return $this->actionBoasVindas($modelCadastro, $requestForm, $idCadastro);
            }
        }  
        
        return $this->render('formulario',[
            'modelCadastro' => $modelCadastro,
            'idCadastro' => $idCadastro
        ]);
    }

    public function actionBoasVindas($modelCadastro, $requestForm, $idCadastro)
    {
        if(!$modelCadastro->validate()){
            $this->actionUpdateUsuario($modelCadastro, $idCadastro, $requestForm);    
         }

        $idUsuario = $modelCadastro->usuario_id;
        return $this->render('boas-vindas',[
            'modelCadastro' => $modelCadastro,
            'requestForm' => $requestForm,
            'idCadastro' => $idCadastro
             
         ]);
       
    }

    public function actionUpdateUsuario($modelCadastro, $idCadastro, $requestForm)
    {   
        $usuarios = UsuariosInventario::findOne($modelCadastro->usuario_id);
        $usuarios->usuario_nome = $modelCadastro->usuario_nome;
        $usuarios->usuario_email = $modelCadastro->usuario_email;
        $usuarios->save();

        return $this->render('boas-vindas',[
            'modelCadastro' => $modelCadastro,
            'requestForm' => $requestForm,
            'idCadastro' => $idCadastro
             
         ]);
        

    }


}



















?>