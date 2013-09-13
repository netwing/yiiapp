<?php
$this->menu=array(
    array('label' => Yii::t('menu', 'User operations')),
    array('label' => Yii::t('menu', 'Manage users'),'url'=>array('user/admin')),
    array('label' => Yii::t('menu', 'Create user'),'url'=>array('user/create')),
    array('label' => Yii::t('menu', 'Roles operations')),
    array('label' => Yii::t('menu', 'Manage roles'), 'url'=>array('role/admin')),
    array('label' => Yii::t('menu', 'Create role'), 'url'=>array('role/create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
