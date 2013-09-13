<?php $auth = Yii::app()->authManager; ?>

<h2><?php echo Yii::app()->user->getState('role'); ?></h2>

<?php foreach ($auth->tasks as $k => $task): ?>

    On <strong><?php echo $task->name; ?></strong>: <?php echo (Yii::app()->user->checkAccess($task->name)) ? "1" : "0"; ?>

<?php endforeach; ?>
<br />

<?php foreach ($auth->operations as $k => $operation): ?>

    On <?php echo $operation->name; ?>: <?php echo (Yii::app()->user->checkAccess($operation->name)) ? "1" : "0"; ?><br />

<?php endforeach; ?>
<br />
