<?php
$this->pageTitle = Yii::t('app', 'View role {role}', array('{role}' => $model->name));
$this->menu=array(
    array('label' => Yii::t('menu', 'User operations')),
    array('label' => Yii::t('menu', 'Manage users'),'url'=>array('user/admin')),
    array('label' => Yii::t('menu', 'Create user'),'url'=>array('user/create')),
    array('label' => Yii::t('menu', 'Roles operations')),
    array('label' => Yii::t('menu', 'Manage roles'), 'url'=>array('role/admin')),
    array('label' => Yii::t('menu', 'Create role'), 'url'=>array('role/create')),
    array('label' => Yii::t('menu', 'Update role'), 'url'=>array('role/update', 'id' => $model->name)),
);
?>

<?php $this->widget('zii.widgets.CDetailView',array(
'htmlOptions' => array(
'class' => 'table table-striped table-condensed table-hover',
),
'data'=>$model,
'attributes'=>array(
		'name',
		'description',
    ),
)); ?>

<?php 
$tasks = Yii::app()->authManager->tasks;
$i = 0;
foreach ($tasks as $task_name => $task): ?>
<p>
<strong><?php echo $task->description; ?>: </strong>
    <?php foreach ($task->children as $k => $v): ?>
        <?php if (Yii::app()->authManager->hasItemChild($model->name, $v->name)): ?>
            <span class="text-success"><?php echo $v->description; ?></span>
        <?php else: ?>
            <span class="muted"><?php echo $v->description; ?></span>
        <?php endif; ?>
    <?php endforeach; ?>
</p>
<?php endforeach; ?>