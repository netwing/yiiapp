<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <?php Yii::app()->bootstrap->register(); // Yiistrap  ?>
    <?php Yii::app()->fontAwesome->register();  // Netwing Font Awesome ?>
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <style>
#mainsearchresults {
    position: absolute;
    top: 55px;
    right: 10px;
    background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    padding-left: 10px;
    padding-right: 10px;
    box-shadow: 0px 0px 5px black; 
}
    </style>
</head>

<body>

<?php
$this->widget('bootstrap.widgets.TbNavbar', array(
    'brandLabel'=> APPLICATION_NAME,
    'brandUrl'  => array('/'),
    'collapse'      => true, // requires bootstrap-responsive.css
    'display'       => TbHtml::NAVBAR_DISPLAY_STATICTOP, 
    'items'     => array(
        array(
            'class'=>'bootstrap.widgets.TbNav',
            // Decomment this for putting HTML in label
            // 'encodeLabel' => false,
            'items'=>array(
                array(
                    'label' => Yii::t('menu', 'Users'), 
                    'url' => array('/admin/user/admin'),
                    'visible' => Yii::app()->user->checkAccess('admin:user:read'),
                ),
                array(
                    'label' => Yii::t('menu', 'Simple link'), 'url' => array('/simple/link'), 'visible' => !Yii::app()->user->isGuest
                ),
                array(
                    'label' => Yii::t('menu', 'Menu'), 
                    'items' => array(
                        array('label' => Yii::t('menu', 'Option 1'), 'url' => array('/menu/option1')),
                        array('label' => Yii::t('menu', 'Option 2'), 'url' => array('/menu/option2')),
                        array('label' => Yii::t('menu', 'Option 3'), 'url' => array('/menu/option3')),
                        array('label' => Yii::t('menu', 'Option 4'), 'url' => array('/menu/option4')),
                    ),
                    'visible' => !Yii::app()->user->isGuest,
                ),
                array(
                    'label' => Yii::t('menu', 'Examples'), 
                    'items' => array(
                        array('label' => Yii::t('menu', 'Elements'), 'url' => array('/example/default/elements')),
                        array('label' => Yii::t('menu', 'Messages'), 'url' => array('/example/default/messages')),
                        array('label' => Yii::t('menu', 'Auth check'), 'url' => array('/example/auth/index')),
                        array('label' => Yii::t('menu', 'Date and time'), 'url' => array('/example/default/datetime')),
                        array('label' => Yii::t('menu', 'Cron'), 'url' => array('/example/default/cron')),
                        array('label' => Yii::t('menu', 'Calendar'), 'url' => array('/example/default/calendar')),
                        array('label' => Yii::t('menu', 'PDF download'), 'url' => array('/example/pdf/download'),
                            'linkOptions' => array('target' => '_blank')),
                        array('label' => Yii::t('menu', 'Excel download'), 'url' => array('/example/excel/download'),
                            'linkOptions' => array('target' => '_blank')),
                        array('label' => Yii::t('menu', 'Node'), 'url' => array('/example/default/node')),
                    ),
                    'visible' => !Yii::app()->user->isGuest,
                ),
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbNav',
            'encodeLabel'=>false,
            'htmlOptions'=>array('class'=>'pull-right'),
            'encodeLabel' => false,
            'items'=>array(
                array(
                    'label' => Yii::app()->user->getState('name'), 
                    'items' => array(
                        array('label' => Yii::t('menu', 'Logout'), 'url' => array('/site/logout')), 
                    ),
                    'visible' => !Yii::app()->user->isGuest,
                ),
                array(
                    'label' => Yii::t('menu', 'Login'), 
                    'url' => array('/site/login'),
                    'visible' => Yii::app()->user->isGuest,
                ),
                (Yii::app()->user->checkAccess('main:search:allow')) ? TbHtml::navbarSearchForm('#', 'post', array('inputOptions' => array('id' => 'topNavbarMainSearch', 'class' => 'input-small'))) : "",
                array(
                    'label' => Yii::t('menu', '<i class="icon-remove"></i>'), 
                    'url' => "#",
                    'visible' => Yii::app()->user->checkAccess('main:search:allow'),
                    'linkOptions' => array('id' => 'topNavbarMainSearchReset'),
                ),
            ),
        ),
    )
));
?>

<div class="container" id="page">

    <?php if (count(Yii::app()->user->getFlashes(false)) > 0): ?>
    <div class="row-fluid"><div class="span12">
        <?php
        // Alert
        $this->widget('bootstrap.widgets.TbAlert', array(
            'block'     => false, // display a larger alert block?
            'fade'      => FALSE, // use transitions?
            'closeText' => '×', // close link text - if set to false, no close link is displayed
        ));
        ?>
    </div></div>
    <?php endif; ?>
        
    <?php echo $content; ?>

</div>

<div class="container-fluid" id="footer">
<hr />
    <div class="row-fluid">
        <div class="span3">
            <?php if (isset(Yii::app()->theme)): ?>
            <?php $this->widget('ext.netwing.ThemePicker.EThemePicker', array()); ?>
            <?php endif; ?>
        </div>
        <div class="span6" style="text-align: center">
            Copyright &copy; <?php echo date('Y'); ?> by Netwing SRL, All Rights Reserved. 
            <br /><?php echo Yii::powered(); ?> 
        </div>
        <div class="span3">
            <div class="pull-right"><?php $this->widget('ext.ELanguagePicker', array()); ?></div>
        </div>
    </div>
</div>

<!-- Container for search results -->
<div id="mainsearchresults" style="display: none" class="span6">
    &nbsp;
</div>

<?php Yii::app()->clientScript->registerScript('main_search', '
var myAjax = undefined;
$("#topNavbarMainSearch").on("keyup", function() {
    var s = $("#topNavbarMainSearch").val();
    if (s.length >= 3) {
        if (myAjax !== undefined) {
            $("#mainsearchresults").html("").hide();
            myAjax.abort();
        }
        $("#mainsearchresults").html(\'<div style="text-align: center"><p><img src="images/loading.gif" alt="loading..." /></p></div>\').show();
        myAjax = $.ajax({
            url: "' . $this->createUrl('/search') . '",
            data: {"s": s}
        }).done(function ( data ) {
            $("#mainsearchresults").html(data).show();
        });        
    } else {
        $("#mainsearchresults").html("").hide();
    }
})
$("#topNavbarMainSearchReset").on("click", function() {
    if (myAjax !== undefined) {
        myAjax.abort();
    }
    $("#topNavbarMainSearch").val("");
    $("#mainsearchresults").html("").hide();
})
');?>

</body>
</html>
