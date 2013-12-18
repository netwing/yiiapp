<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array('model'=>$model)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView',array(
'id'            => 'user-grid',
'dataProvider'  => $model->search(),
'filter'        => $model,
'rowCssClass'   => array(),
'itemsCssClass' => 'table table-hover table-bordered',
'columns'       => array(
    'name',
	'username',
    array(
        'name' => 'role',
        'value' => 'implode(", ", $data->role)',
        'filter' => CHtml::textField('User[role]', $model->role, array('id' => 'User_role', 'style' => 'width: 50px')),
    ),
    // Show a column with 3 icons as buttons
    array(
        'class'         => 'zii.widgets.grid.CButtonColumn',
        'htmlOptions'   => array('style' => 'white-space: nowrap'),
        'afterDelete'   => 'function(link,success,data) { if (success && data) alert(data); }',
        // 'template'      => '{plus} {view} {update} {delete}',
        'buttons'       => array(
            /*
            'plus'      => array(
                'options'       => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'View')),
                'label'         => '<i class="fa fa-plus"></i>',
                'imageUrl'      => false,
            ),
            */
            'view'      => array(
                'options'       => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'View')),
                'label'         => '<i class="fa fa-eye"></i>',
                'imageUrl'      => false,
            ),
            'update'      => array(
                'options'       => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Update')),
                'label'         => '<i class="fa fa-pencil"></i>',
                'imageUrl'      => false,
            ),
            'delete'      => array(
                'options'       => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Delete')),
                'label'         => '<i class="fa fa-times"></i>',
                'imageUrl'      => false,
            )
        )
    ),
    /*
    // Show a column with dropdown actions
    array( 'header'=>'Action', 'type'=>'raw',
        'value'=>'\'
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Action <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="\' . Yii::app()->createUrl("/admin/user/update", array("id" => $data->id)) . \'">Edit \' . $data->id . \'</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </div>
            \'', 
        ),    
    */

),
)); ?>
