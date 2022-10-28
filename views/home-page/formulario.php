<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>

<?php $this->title = 'Inventário'; ?>

<center><h2>Sistema de inventário Leme Forense</h2></center>

<?php $form = ActiveForm::begin() ?>
    
    <?= $form->field($modelCadastro,'usuario_nome')->textInput( ['id' => 'corLetra']); ?>
    <?= $form->field($modelCadastro,'usuario_email'); ?>
    <?= $form->field($modelCadastro, 'usuario_id',['inputOptions' => ['value' => $idCadastro + 1]])->hiddenInput()->label(false) ?>
    <div class="form-group"> <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']); ?> </div>
           
<?php ActiveForm::end();
?>




