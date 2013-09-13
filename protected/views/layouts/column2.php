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
    <div class="col-md-3 col-md-push-9">
        <div id="sidebar">
        <?php 
            $this->widget('ext.netwing.bootstrap.widgets.Menu', array(
                'encodeLabel'   => false,
                'items' => $this->menu,
                'htmlOptions'   => array('class' => 'list-group'),
                'itemCssClass'  => 'list-group-item',
            ));
        ?>
        </div>            
    </div>
    <div class="col-md-9 col-md-pull-3">
        <?php echo $content; ?>
    </div>
</div>

<?php $this->endContent(); ?>