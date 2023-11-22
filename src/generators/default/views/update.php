<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */


$this->title = 'Редагування : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Список', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;

echo "<?php\n";
?>

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
?>
<div class="container">
    <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">

        <?= "<?= " ?>$this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
