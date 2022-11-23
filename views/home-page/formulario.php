<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>

<?php $this->title = 'Inventário'; ?>

<center><h2>Sistema de inventário Leme Forense</h2></center>

<?php 
    $form = ActiveForm::begin([
        'method' => 'post',
        'action' => 'editar-cadastro'
    ]) 
?>
    
    <?= $form->field($model,'usuario_nome')->textInput( ['id' => 'corLetra']); ?>
    <?= $form->field($model,'usuario_email'); ?>
    <?= $form->field($model, 'usuario_id',['inputOptions' => ['value' => $novoId ]])->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'usu_ativo',['inputOptions' => ['value' => true ]])->hiddenInput()->label(false) ?>
    <div class="form-group"> <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']); ?> </div>
           
<?php ActiveForm::end();
?>




