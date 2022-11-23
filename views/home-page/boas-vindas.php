<?php 


/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>

<script src="https://kit.fontawesome.com/ee19604253.js" crossorigin="anonymous"></script>
<?php 
    $form = ActiveForm::begin([
        'method' => 'post',
        'action' => 'editar-cadastro',
    ])

?>
<p> Cadastro realizado com sucesso!! Seus dados são:  </p>

<div class="container">
    <div class="row">
        <div class="col">
            <ul> 
                <li>Nome: <?= $request['UsuariosInventario']['usuario_nome']; ?></li>
                <li>E-mail: <?= $request['UsuariosInventario']['usuario_email']; ?></li>
            </ul>   
            <p> Deseja editar ou remover seus dados? </p>
            <button id="editarValores" onclick="showFields()" class=" fa-regular fa-pen-to-square" type="button"></button>
        </div>
    </div>
    <br>
    
    <div class="container" id="campos" style="display:none;"> 
            <?= $form->field($model,'usuario_nome')->textInput( ['id' => 'nomeUsuario']); ?>
            <?= $form->field($model,'usuario_email')->textInput( ['id' => 'emailUsuario']); ?>
            <?= $form->field($model, 'usuario_id',['inputOptions' => ['value' => $idCadastro, 'id' => 'idUsuario']])->hiddenInput()->label(false) ?>
            <div class="form-group"> <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']); ?> </div>
            <div class="form-group"> <?= $form->field($model, 'usu_ativo')->checkbox(['unchecked' => false])?></div>
            <div class="form-group"> <?= Html::Button('Cancelar', ['id' => 'cancelarEdicao','class' => 'btn btn-danger', 'style' => 'margin-left:91%; margin-top:-159px;']); ?> </div>
     
    </div>
</div>

<script>

    function showFields(){
        // Botão editar.
        const botaoEditar = document.querySelector("#editarValores");
        const botaoCancelar = document.querySelector('#cancelarEdicao');
        // Div com campos para editar.
        const camposEditar = document.querySelector("#campos");
        // Faz com que os campos para edição de dados apareçam.
        botaoEditar.addEventListener("click", function(){
                    camposEditar.style.display = "block";
        });
      
        hideFields(botaoEditar, botaoCancelar, camposEditar);

    }

    function hideFields(botaoEditar, botaoCancelar, camposEditar){

        botaoCancelar.addEventListener("click", function(){
            camposEditar.style.display = "none";
        });



    }

    function removeUsu(){
        var usuNome = document.getElementById('nomeUsuario').value;
        var usuEmail = document.getElementById('emailUsuario').value;
        var url = "./remove-usuario";
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", url, `usuNome`);
        xhttp.send();

    }
    



</script>

<?php 
    ActiveForm::end();
?>