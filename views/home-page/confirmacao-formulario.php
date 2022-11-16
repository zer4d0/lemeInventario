<?php 

use \yii\widgets\LinkPager;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<script src="https://kit.fontawesome.com/ee19604253.js" crossorigin="anonymous"></script>
<p> Cadastro realizado com sucesso!! Seus dados são:  </p>

<div class="container">
    <div class="row">
        <div class="col">
            <ul> 
                <li>Nome: <?= $requestForm['UsuariosInventario']['usuario_nome']; ?></li>
                <li>E-mail: <?= $requestForm['UsuariosInventario']['usuario_email']; ?></li>
            </ul>   
            <button id="editarValores" onclick="showFields()" legend="Editar Dados" class=" fa-regular fa-pen-to-square" type="submit"></button>
        </div>
    </div>
    <br>
    
    <div class="container" id="campos" style="display:none;"> 
        <?php $form = ActiveForm::begin() ?>
            <?= $form->field($modelCadastro,'usuario_nome')->textInput( ['id' => 'corLetra']); ?>
            <?= $form->field($modelCadastro,'usuario_email'); ?>
            <?= $form->field($modelCadastro, 'usuario_id',['inputOptions' => ['value' => $idCadastro + 1]])->hiddenInput()->label(false) ?>
            <div class="form-group"> <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']); ?> </div>
            <div class="form-group"> <?= Html::Button('Cancelar', ['id' => 'cancelarEdicao','class' => 'btn btn-danger', 'style' => 'margin-left:92%; margin-top:-59px;']); ?> </div>
        <?php ActiveForm::end();
        ?>
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