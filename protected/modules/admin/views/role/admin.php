<?php

$this->menu=array(
    array('label' => Yii::t('menu', 'User operations')),
    array('label' => Yii::t('menu', 'Manage users'),'url'=>array('user/admin')),
    array('label' => Yii::t('menu', 'Create user'),'url'=>array('user/create')),
    array('label' => Yii::t('menu', 'Roles operations')),
    array('label' => Yii::t('menu', 'Manage roles'), 'url'=>array('role/admin')),
    array('label' => Yii::t('menu', 'Create role'), 'url'=>array('role/create')),
);

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $('#auth-item-grid').yiiGridView('update', {
            data: $(this).serialize()
        });
    return false;
    });
");
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'auth-item-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
    	'name',
    	'description',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>