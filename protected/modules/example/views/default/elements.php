<style>
.bs-docs-example {
    position: relative;
    margin: 15px 0;
    padding: 39px 19px 14px;
    background-color: 
    #fff;
    border: 1px solid 
    #ddd;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.bs-docs-example::after {
    content: "Example";
    position: absolute;
    top: -1px;
    left: -1px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: bold;
    background-color: 
    #f5f5f5;
    border: 1px solid 
    #ddd;
    color: 
    #9da0a4;
    -webkit-border-radius: 4px 0 4px 0;
    -moz-border-radius: 4px 0 4px 0;
    border-radius: 4px 0 4px 0;
}    
</style>

<?php
$this->breadcrumbs=array(
	'Example' => array($this->module->id),
    'Elements'
);
?>
<div class="bs-docs-example">
<h1>Bibendum Adipiscing Consectetur Pharetra Purus</h1>
<h2>Bibendum Adipiscing Consectetur Pharetra Purus</h2>
<h3>Bibendum Adipiscing Consectetur Pharetra Purus</h3>
<h4>Bibendum Adipiscing Consectetur Pharetra Purus</h4>
<h5>Bibendum Adipiscing Consectetur Pharetra Purus</h5>
<h6>Bibendum Adipiscing Consectetur Pharetra Purus</h6>
</div>

<div class="bs-docs-example">
<?php echo TbHtml::muted('Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.'); ?>
<?php echo TbHtml::em('Etiam porta sem malesuada magna mollis euismod.', array('color' => TbHtml::TEXT_COLOR_WARNING)); ?>
<?php echo TbHtml::em('Donec ullamcorper nulla non metus auctor fringilla.', array('color' => TbHtml::TEXT_COLOR_ERROR)); ?>
<?php echo TbHtml::em('Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.', array('color' => TbHtml::TEXT_COLOR_INFO)); ?>
<?php echo TbHtml::em('Duis mollis, est non commodo luctus, nisi erat porttitor ligula.', array('color' => TbHtml::TEXT_COLOR_SUCCESS)); ?>
</div>

<div class="bs-docs-example">
<?php echo TbHtml::beginFormTb(); ?>
    <fieldset>
        <legend>Legend</legend>
        <?php echo TbHtml::label('Label name', 'text'); ?>
        <?php echo TbHtml::textField('text', '', array('placeholder' => 'Type something...')); ?>
        <?php echo TbHtml::checkBox('checkMeOut', false, array('label' => 'Check me out')); ?>
        <?php echo TbHtml::submitButton('Submit'); ?>
    </fieldset>
<?php echo TbHtml::endForm(); ?>
</div>

<div class="bs-docs-example">
<?php echo TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_SEARCH); ?>
    <?php echo TbHtml::searchQueryField('search'); ?>
    <?php echo TbHtml::submitButton('Submit'); ?>
<?php echo TbHtml::endForm(); ?>
</div>

<div class="bs-docs-example">
<?php echo TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_INLINE); ?>
    <?php echo TbHtml::textField('email', '',
        array('placeholder' => 'Email', 'size' => TbHtml::INPUT_SIZE_SMALL)); ?>
    <?php echo TbHtml::passwordField('password', '',
        array('placeholder' => 'Password', 'size' => TbHtml::INPUT_SIZE_SMALL)); ?>
    <?php echo TbHtml::checkBox('rememberMe', false, array('label' => 'Remember me')); ?>
    <?php echo TbHtml::submitButton('Sign in'); ?>
<?php echo TbHtml::endForm(); ?>
</div>

<div class="bs-docs-example">
<?php echo TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_HORIZONTAL); ?>
    <?php echo TbHtml::emailFieldControlGroup('email', '',
        array('label' => 'Email', 'placeholder' => 'Email')); ?>
    <?php echo TbHtml::passwordFieldControlGroup('password', '',
        array('label' => 'Password', 'placeholder' => 'Password')); ?>
    <?php echo TbHtml::checkBoxControlGroup('rememberMe', false, array(
        'label' => 'Remember me',
        'controlOptions' => array('after' => TbHtml::submitButton('Sign in')),
    )); ?>
<?php echo TbHtml::endForm(); ?>
</div>

<div class="bs-docs-example">
<?php echo TbHtml::button('Default'); ?>
<?php echo TbHtml::button('Primary', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?> 
<?php echo TbHtml::button('Danger', array('color' => TbHtml::BUTTON_COLOR_DANGER)); ?> 
<?php echo TbHtml::button('Warning', array('color' => TbHtml::BUTTON_COLOR_WARNING)); ?> 
<?php echo TbHtml::button('Success', array('color' => TbHtml::BUTTON_COLOR_SUCCESS)); ?> 
<?php echo TbHtml::button('Info', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?> 
<?php echo TbHtml::button('Inverse', array('color' => TbHtml::BUTTON_COLOR_INVERSE)); ?> 
<?php echo TbHtml::button('Link', array('color' => TbHtml::BUTTON_COLOR_LINK)); ?> 
</div>

<div class="bs-docs-example">
<?php echo TbHtml::button('Large button',
    array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE)); ?> 
<?php echo TbHtml::button('Large button', array('size' => TbHtml::BUTTON_SIZE_LARGE)); ?><br /><br />
<?php echo TbHtml::button('Default button', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?> 
<?php echo TbHtml::button('Default button'); ?><br /><br />
<?php echo TbHtml::button('Small button',
    array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_SMALL)); ?>
<?php echo TbHtml::button('Small button',
    array('size' => TbHtml::BUTTON_SIZE_SMALL)); ?><br /><br />
<?php echo TbHtml::button('Mini button',
    array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_MINI)); ?>
<?php echo TbHtml::button('Mini button',
    array('size' => TbHtml::BUTTON_SIZE_MINI)); ?>
</div>

<div class="bs-docs-example">
<?php echo TbHtml::buttonToolbar(array(
    array('items' => array(
        array('label' => '1'),
        array('label' => '2'),
        array('label' => '3'),
        array('label' => '4'),
    )),
    array('items' => array(
        array('label' => '5'),
        array('label' => '6'),
        array('label' => '7'),
    )),
    array('items' => array(
        array('label' => '8'),
    )),
)); ?>
</div>

<div class="bs-docs-example">
<?php echo TbHtml::buttonDropdown('Action', array(
    array('label' => 'Action', 'url' => '#'),
    array('label' => 'Another action', 'url' => '#'),
    array('label' => 'Something else here', 'url' => '#'),
    TbHtml::menuDivider(),
    array('label' => 'Separate link', 'url' => '#'),
)); ?> 
<?php echo TbHtml::buttonDropdown('Action', array(
    array('label' => 'Action', 'url' => '#'),
    array('label' => 'Another action', 'url' => '#'),
    array('label' => 'Something else here', 'url' => '#'),
    TbHtml::menuDivider(),
    array('label' => 'Separate link', 'url' => '#'),
), array('split' => true)); ?>

</div>

<div class="bs-docs-example">

<div class="well" style="max-width: 340px; padding: 8px 0;">

<?php $this->widget('bootstrap.widgets.TbNav', array(
        'type' => TbHtml::NAV_TYPE_LIST,
        'items' => array(
            array('label' => 'List header'),
            array('label' => 'Home', 'url' => '#', 'active' => true),
            array('label' => 'Library', 'url' => '#'),
            array('label' => 'Applications', 'url' => '#'),
            array('label' => 'Another list header'),
            array('label' => 'Profile', 'url' => '#'),
            array('label' => 'Settings', 'url' => '#'),
            TbHtml::menuDivider(),
            array('label' => 'Help', 'url' => '#'),
        ),
    )); ?>
</div>

</div>

<div class="bs-docs-example">
<?php echo TbHtml::pagination(array(
      array('label' => '&laquo;', 'url' => '#'),
      array('label' => '1', 'url' => '#'),
      array('label' => '2', 'url' => '#'),
      array('label' => '3', 'url' => '#'),
      array('label' => '4', 'url' => '#'),
      array('label' => '5', 'url' => '#'),
      array('label' => '&raquo;', 'url' => '#'),
)); ?>
</div>

<div class="bs-docs-example">

<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et.'); ?>
<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_WARNING, 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et.'); ?>
<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et.'); ?>
<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et.'); ?>
<?php echo TbHtml::animatedProgressBar(40); ?>    
</div>
