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
    
  <p>Seus dados foram apagados!! </P>
           
<?php ActiveForm::end();
?>




