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
        'action' => 'aaaaaaaaaaa',
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
            <p> Deseja editar seus dados? Caso não, clique em prosseguir. </p>
            <button id="editarValores" onclick="showFields()" legend="Editar Dados" class=" fa-regular fa-pen-to-square" type="submit"></button>
        </div>
    </div>
    <br>
    
    <div class="container" id="campos" style="display:none;"> 
        <?php $form = ActiveForm::begin() ?>
            <?= $form->field($model,'usuario_nome')->textInput( ['id' => 'corLetra']); ?>
            <?= $form->field($model,'usuario_email'); ?>
            <?= $form->field($model, 'usuario_id',['inputOptions' => ['value' => $idCadastro]])->hiddenInput()->label(false) ?>
            <div class="form-group"> <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']); ?> </div>
            <div class="form-group"> <?= Html::Button('Cancelar', ['id' => 'cancelarEdicao','class' => 'btn btn-danger', 'style' => 'margin-left:92%; margin-top:-59px;']); ?> </div>
     
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
    



</script>

<?php 
    ActiveForm::end();
?>