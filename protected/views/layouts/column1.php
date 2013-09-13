<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php if(isset($this->breadcrumbs) and count($this->breadcrumbs) > 0): ?>
<div class="row-fluid">
    <div class="span12">
    <?php echo TbHtml::breadcrumbs($this->breadcrumbs); ?>
    </div>
</div>
<?php endif; ?>

<div class="row-fluid">
    <div class="span12">
        <h2><?php echo $this->pageTitle; ?></h2>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <?php echo $content; ?>
    </div>
</div>

<?php $this->endContent(); ?>