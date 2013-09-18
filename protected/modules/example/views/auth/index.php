<?php $auth = Yii::app()->authManager; ?>

<?php foreach ($auth->operations as $k => $operation): ?>

    <?php if (Yii::app()->user->checkAccess($operation->name)): ?>
        <p class="text-success">You <strong>can</strong> access to <?php echo $operation->name; ?></p>
    <?php else: ?>
        <p class="text-danger">You <strong>cannot</strong> access to <?php echo $operation->name; ?></p>
    <?php endif; ?>

<?php endforeach; ?>
<br />
