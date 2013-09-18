<?php
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

<?php $this->widget('zii.widgets.grid.CGridView',array(
'id'            => 'user-grid',
'dataProvider'  => $model->search(),
'filter'        => $model,
'rowCssClass'   => array(),
'itemsCssClass' => 'table table-hover table-bordered',
'pagerCssClass'     => "col-md-12 text-right",
'pager'             => array(
    'header'                => '',
    'internalPageCssClass'  => '',
    'firstPageCssClass'     => '',
    'lastPageCssClass'      => '',
    'selectedPageCssClass'  => 'active',
    'htmlOptions'   => array(
        'class'     => 'pagination pagination-sm',
    )
),
'columns'       => array(
    'name',
    'description',
    // Show a column with 3 icons as buttons
    array(
        'class'         => 'zii.widgets.grid.CButtonColumn',
        'htmlOptions'   => array('style' => 'white-space: nowrap'),
        'afterDelete'   => 'function(link,success,data) { if (success && data) alert(data); }',
        'buttons'       => array(
            'view'      => array(
                'options'       => array('class' => 'icon-eye-open', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'View')),
                'label'         => false,
                'imageUrl'      => false,
            ),
            'update'      => array(
                'options'       => array('class' => 'icon-pencil', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Update')),
                'label'         => false,
                'imageUrl'      => false,
            ),
            'delete'      => array(
                'options'       => array('class' => 'icon-remove', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Delete')),
                'label'         => false,
                'imageUrl'      => false,
            )
        )
    ),
),
)); ?>
