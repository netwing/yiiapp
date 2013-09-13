<?php
/* @var $this RoleController */
/* @var $data AuthItem */
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo CHtml::link(CHtml::encode($data->name),array('view','id'=>$data->name)); ?></h3>
  </div>
  <div class="panel-body">
    <b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
    <?php echo CHtml::encode($data->type); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
    <?php echo CHtml::encode($data->description); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('bizrule')); ?>:</b>
    <?php echo CHtml::encode($data->bizrule); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
    <?php echo CHtml::encode($data->data); ?>
    <br />
  </div>
</div>
