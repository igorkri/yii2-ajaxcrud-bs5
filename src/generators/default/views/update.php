<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */


$this->title = 'Редагування : ';
$this->params['breadcrumbs'][] = ['label' => 'Список', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 1, 'url' => ['view', 'id' => 1]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">

        <?= "<?= " ?>$this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
