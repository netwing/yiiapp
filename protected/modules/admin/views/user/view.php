<?php $this->widget('zii.widgets.CDetailView',array(
'data'=>$model,
'htmlOptions' => array(
    'class' => 'table table-bordered table-hover table-condensed'
),
'attributes'=>array(
		'id',
        'name',
		'username',
		array('name' => 'role', 'value' => implode(", ", $model->role)),
),
)); ?>
