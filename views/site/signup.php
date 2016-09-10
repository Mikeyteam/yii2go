<?php
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Регистрация</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <? $form = ActiveForm::begin(['class' => 'form-horizontal']);
                echo $form->field($model, 'name')->textInput(['autofocus' => true]);
                echo $form->field($model, 'last_name')->textInput();
                echo $form->field($model, 'login')->textInput();
                echo $form->field($model, 'password')->passwordInput();
                ?>
                <button type="submit" class="btn btn-primary">Submit</button>
                <? ActiveForm::end(); ?>
            </div>
        </div>

    </div>
</div>
