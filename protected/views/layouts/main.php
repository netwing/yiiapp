<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo (isset(Yii::app()->language)) ? Yii::app()->language : 'en'; ?>" />
    <?php Yii::app()->bootstrap->register();  // Netwing Bootstrap ?>
    <?php Yii::app()->fontAwesome->register();  // Netwing Font Awesome ?>
    <?php Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' ); ?>
    <?php Yii::app()->getClientScript()->registerCssFile('css/application.css'); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <style>
    #mainsearchresults {
        background-color: #FFF;
        border: 1px solid #CCC;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        padding-left: 10px;
        padding-right: 10px;
        box-shadow: 0px 0px 5px black; 
        z-index: 1001;
    }
    </style>
</head>

<body>

<div id="topNavbar" class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="nabvar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->createUrl('/'); ?>"><?php echo APPLICATION_NAME; ?></a>
        </div>
        <div class="navbar-collapse collapse" id="yw3">
            <ul id="yw1" class="nav navbar-nav" role="menu">
                <?php if (Yii::app()->user->checkAccess('admin:user:read')): ?>
                    <li><a tabindex="-1" href="<?php echo $this->createUrl('/admin/user/admin'); ?>"><?php echo Yii::t('menu', 'Users'); ?></a></li>
                <?php endif; ?>
                <?php if (!Yii::app()->user->isGuest): ?>
                    <li><a tabindex="-1" href="<?php echo $this->createUrl('/simple/link'); ?>"><?php echo Yii::t('menu', 'Simple link'); ?></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href=""><?php echo Yii::t('menu', 'Menu'); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu" id="yt1" aria-labelledby="yt1" role="menu">
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/menu/option1'); ?>"><?php echo Yii::t('menu', 'Option 1'); ?></a></li>
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/menu/option2'); ?>"><?php echo Yii::t('menu', 'Option 2'); ?></a></li>
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/menu/option3'); ?>"><?php echo Yii::t('menu', 'Option 3'); ?></a></li>
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/menu/option4'); ?>"><?php echo Yii::t('menu', 'Option 4'); ?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href=""><?php echo Yii::t('menu', 'Examples'); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu" id="yt2" aria-labelledby="yt2" role="menu">
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/example/default/elements'); ?>"><?php echo Yii::t('menu', 'Elements'); ?></a></li>
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/example/default/messages'); ?>"><?php echo Yii::t('menu', 'Messages'); ?></a></li>
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/example/auth/index'); ?>"><?php echo Yii::t('menu', 'Auth check'); ?></a></li>
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/example/default/datetime'); ?>"><?php echo Yii::t('menu', 'Date and time'); ?></a></li>
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/example/default/cron'); ?>"><?php echo Yii::t('menu', 'Cron'); ?></a></li>
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/example/default/calendar'); ?>"><?php echo Yii::t('menu', 'Calendar'); ?></a></li>
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/example/default/node'); ?>"><?php echo Yii::t('menu', 'Node JS'); ?></a></li>
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/example/default/dnd'); ?>"><?php echo Yii::t('menu', 'Drag & drop'); ?></a></li>
                            <li><a tabindex="-1" href="<?php echo $this->createUrl('/example/default/email', array('send' => 1)); ?>"><?php echo Yii::t('menu', 'Send email'); ?></a></li>
                            <li><a target="_blank" tabindex="-1" href="<?php echo $this->createUrl('/example/pdf/download'); ?>"><?php echo Yii::t('menu', 'PDF download'); ?></a></li>
                            <li><a target="_blank" tabindex="-1" href="<?php echo $this->createUrl('/example/excel/download'); ?>"><?php echo Yii::t('menu', 'Excel download'); ?></a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if (Yii::app()->user->checkAccess('main:search:allow')): ?>
            <form class="navbar-form navbar-right" role="search">
              <div class="form-group">
                <label class="sr-only" for="topNavbarMainSearch">Search</label>
                <input type="text" class="form-control search-query input-sm" id="topNavbarMainSearch" name="search" placeholder="Search" style="width: 80px">
              </div>
              <button type="button" id="topNavbarMainSearchReset" class="btn btn-default btn-sm">x</button>
            </form>
            <?php endif; ?>
            <ul class="nav navbar-nav navbar-right" id="yw2" role="menu">
            <?php if (Yii::app()->user->isGuest): ?>
                <li><a tabindex="-1" href="<?php echo $this->createUrl('/site/login'); ?>"><?php echo Yii::t('menu', 'Login'); ?></a></li>
            <?php else: ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href=""><?php echo Yii::app()->user->getState('name'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu" id="yt3" aria-labelledby="yt3" role="menu">
                        <li><a tabindex="-1" href="<?php echo $this->createUrl('/site/logout'); ?>"><?php echo Yii::t('menu', 'Logout'); ?></a></li>
                    </ul>
                </li>
            <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<div class="container" id="page">

    <?php if (count(Yii::app()->user->getFlashes(false)) > 0): ?>
    <div class="row">
        <div class="col-lg-12">
        <?php foreach (Yii::app()->user->getFlashes() as $k => $v): ?>
        <div class="alert alert-<?php echo $k; ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $v; ?></div>
        <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
        
    <?php echo $content; ?>

<hr />
    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <?php $this->widget('ext.ELanguagePicker', array()); ?><br />
        </div>
        <div class="col-xs-12 col-sm-4 col-sm-push-4 text-right">
            <?php if (isset(Yii::app()->theme)): ?>
                <?php $this->widget('ext.netwing.ThemePicker.EThemePicker', array()); ?><br />
            <?php endif; ?>
        </div>
        <div class="col-xs-12 col-sm-4 col-sm-pull-4" style="text-align: center">
            Copyright &copy; <?php echo date('Y'); ?> by Netwing SRL, All Rights Reserved. 
            <br /><?php echo Yii::powered(); ?> 
        </div>
    </div>
</div>

<!-- Container for search results -->
<div id="mainsearchresults" style="display: none" class="col-lg-6">
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
        $("#mainsearchresults").position({
            my:        "right top",
            at:        "right bottom",
            of:        $("#topNavbar"),
            collision: "none"
        })        
        $("#mainsearchresults").html(\'<div style="text-align: center"><p><img src="images/loading.gif" alt="loading..." /></p></div>\').show();
        myAjax = $.ajax({
            url: "' . $this->createUrl('/search') . '",
            data: {"s": s}
        }).done(function ( data ) {
            $("#mainsearchresults").position({
                my:        "right top",
                at:        "right bottom",
                of:        $("#topNavbar"),
                collision: "none"
            })        
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
    return false;
})
');?>

</body>
</html>
