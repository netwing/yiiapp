<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php if(isset($this->breadcrumbs) and count($this->breadcrumbs) > 0): ?>
<div class="row">
    <div class="col-lg-12">
    <?php 
    $this->widget('zii.widgets.CBreadcrumbs', array(
        'links'         => $this->breadcrumbs,
        'tagName'       => 'ol',
        'htmlOptions'   => array('class' => 'breadcrumb'),
    )); 
    ?>
    </div>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12">
        <h2><?php echo $this->pageTitle; ?></h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php echo $content; ?>
    </div>
</div>

<?php $this->endContent(); ?>