<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\bootstrap5\Modal;
use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
echo "<?php\n";
?>
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap5\Modal;
use kartik\grid\GridView;
use igorkri\ajaxcrud\CrudAsset; 
use igorkri\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="container">
    <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
        <div id="ajaxCrudDatatable">
            <?="<?="?>GridView::widget([
                'id'=>'crud-datatable',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pjax'=>true,
                'columns' => require(__DIR__.'/_columns.php'),
                'toolbar'=> [
                    ['content'=>
                        Html::a('<i class="fas fa-plus"></i>', ['create'],
                        ['role'=>'modal-remote','title'=> 'Створити <?= Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>','class'=>'btn btn-default']).
                        Html::a('<i class="fas fa-repeat"></i>', [''],
                        ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Оновити таблицю']).
                        '{toggleData}'.
                        '{export}'
                    ],
                ],          
                'striped' => true,
                'condensed' => true,
                'responsive' => true,          
                'panel' => [
                    'type' => 'primary', 
                    'heading' => '<i class="fas fa-list"></i> <?= Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?> список',
                    //'before'=>'<em>* Змінюйте розмір стовпців таблиці так само, як у електронній таблиці, перетягуючи краї стовпців.</em>',
                    'after'=>BulkButtonWidget::widget([
                                'buttons'=>Html::a('<i class="far fa-trash-alt"></i>&nbsp; Видалити',
                                    ["bulkdelete"] ,
                                    [
                                        "class"=>"btn btn-danger btn-xs",
                                        'role'=>'modal-remote-bulk',
                                        'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                        'data-request-method'=>'post',
                                        'data-confirm-title'=>'Ви впевнені?',
                                        'data-confirm-message'=>'Ви впевнені, що хочете видалити цей елемент?'
                                    ]),
                            ]).                        
                            '<div class="clearfix"></div>',
                ]
            ])<?="?>\n"?>
        </div>
    </div>
</div>
<?='<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    //"size" => Modal::SIZE_EXTRA_LARGE,
    "footer"=>"",// always need it for jquery plugin
])?>'."\n"?>
<?='<?php Modal::end(); ?>'?>

