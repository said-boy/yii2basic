<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\checkbox\CheckboxX;

/** @var yii\web\View $this */
/** @var app\models\Mahasiswa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Masukkan tanggal lahir..'],
        'pluginOptions' => [
            'autoClose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]) ?>

    <?= $form->field($model, 'jenis_kelamin')->radioList([ 'pria' => 'Pria', 'wanita' => 'Wanita', ]) ?>

    <?= $form->field($model, 'hobbies')->checkboxList([
        "Makan" => "Makan",
        "Tidur" => "Tidur",
        "Game" => "Game",
        "Roasting" => "Roasting",
    ])?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
