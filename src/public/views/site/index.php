<?php

/** @var yii\web\View $this */
$this->title = 'My Yii Application';

use app\models\FileUploadForm;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$model = new FileUploadForm();
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

echo $form->field($model, 'file')->fileInput();

echo Html::Button('Upload', ['class' => 'btn btn-primary upload-file']);

ActiveForm::end();

?>

