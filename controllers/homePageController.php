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
        // var_dump($requestForm);die;
        $this->actionUpdate($requestForm);
        // Popula request com a model
        if($modelCadastro->load($requestForm)){
            // Valida post inserido.
            $modelCadastro->validate();
            // Salva no banco.
            $modelCadastro->save();

            // Renderiza view de boas vindas.
            return $this->render('confirmacao-formulario',[
               'modelCadastro' => $modelCadastro,
               'requestForm' => $requestForm,
               'idCadastro' => $idCadastro
                
            ]);

        }else{

            return $this->render('formulario',[
                'modelCadastro' => $modelCadastro,
                'idCadastro' => $idCadastro
            ]);
    
        }
    }

    public function actionConsultaIdUsuario()
    {
       $modelCadastro = new UsuariosInventario;
       var_dump($usuId);die;

    }
    public function actionUsuarios()
    {
        $usuariosCadastrados = new UsuariosInventario;
        
        $query = $usuariosCadastrados::find();
      
        return $this->render('confirmacao-formulario', [
          
        ]);


    }
    
    public function actionUpdate($requestForm){
        var_dump($requestForm);die;
    }



}



















?>