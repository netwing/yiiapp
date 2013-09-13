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
<h1>Justo Nullam Dapibus Venenatis Malesuada</h1>
<h2>Justo Nullam Dapibus Venenatis Malesuada</h2>
<h3>Justo Nullam Dapibus Venenatis Malesuada</h3>
<h4>Justo Nullam Dapibus Venenatis Malesuada</h4>
<h5>Justo Nullam Dapibus Venenatis Malesuada</h5>
<h6>Justo Nullam Dapibus Venenatis Malesuada</h6>
</div>

<div class="bs-docs-example">
<p class="text-muted">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
<p class="text-primary">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
<p class="text-success">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
<p class="text-info">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
<p class="text-warning">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
<p class="text-danger">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
</div>

<div class="bs-docs-example">
<blockquote>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
  <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
</blockquote>
</div>

<div class="bs-docs-example">
<form role="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

<div class="bs-docs-example">
<form class="form-inline" role="form">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail2">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword2">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-default">Sign in</button>
</form>
</div>

<div class="bs-docs-example">
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-10">
      <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Password</label>
    <div class="col-lg-10">
      <input type="password" class="form-control" id="inputPassword1" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
</div>

<div class="bs-docs-example">
<!-- Standard gray button with gradient -->
<button type="button" class="btn btn-default">Default</button>

<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
<button type="button" class="btn btn-primary">Primary</button>

<!-- Indicates a successful or positive action -->
<button type="button" class="btn btn-success">Success</button>

<!-- Contextual button for informational alert messages -->
<button type="button" class="btn btn-info">Info</button>

<!-- Indicates caution should be taken with this action -->
<button type="button" class="btn btn-warning">Warning</button>

<!-- Indicates a dangerous or potentially negative action -->
<button type="button" class="btn btn-danger">Danger</button>

<!-- Deemphasize a button by making it look like a link while maintaining button behavior -->
<button type="button" class="btn btn-link">Link</button>
</div>

<div class="bs-docs-example">
<p>
  <button type="button" class="btn btn-primary btn-lg">Large button</button>
  <button type="button" class="btn btn-default btn-lg">Large button</button>
</p>
<p>
  <button type="button" class="btn btn-primary">Default button</button>
  <button type="button" class="btn btn-default">Default button</button>
</p>
<p>
  <button type="button" class="btn btn-primary btn-sm">Small button</button>
  <button type="button" class="btn btn-default btn-sm">Small button</button>
</p>
<p>
  <button type="button" class="btn btn-primary btn-xs">Extra small button</button>
  <button type="button" class="btn btn-default btn-xs">Extra small button</button>
</p></div>

<div class="bs-docs-example">
<div class="btn-group">
  <button type="button" class="btn btn-default">Left</button>
  <button type="button" class="btn btn-default">Middle</button>
  <button type="button" class="btn btn-default">Right</button>
</div>
</div>

<div class="bs-docs-example">
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>

</div>

<div class="bs-docs-example">

<h3>Example heading <span class="label label-default">New</span></h3>

<span class="label label-default">Default</span>
<span class="label label-primary">Primary</span>
<span class="label label-success">Success</span>
<span class="label label-info">Info</span>
<span class="label label-warning">Warning</span>
<span class="label label-danger">Danger</span>

<a href="#">Inbox <span class="badge">42</span></a>


</div>

<div class="bs-docs-example">
<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
    <span class="sr-only">40% Complete (success)</span>
  </div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
    <span class="sr-only">20% Complete</span>
  </div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
    <span class="sr-only">60% Complete (warning)</span>
  </div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
    <span class="sr-only">80% Complete</span>
  </div>
</div>
</div>

<div class="bs-docs-example">
<div class="alert alert-success">Cras justo odio, dapibus ac facilisis in, egestas eget quam.</div>
<div class="alert alert-info">Cras justo odio, dapibus ac facilisis in, egestas eget quam.</div>
<div class="alert alert-warning">Cras justo odio, dapibus ac facilisis in, egestas eget quam.</div>
<div class="alert alert-danger">Cras justo odio, dapibus ac facilisis in, egestas eget quam.</div>
</div>


<div class="bs-docs-example">
<div class="panel panel-default">
  <div class="panel-heading">Panel heading without title</div>
  <div class="panel-body">
    Panel content
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Panel title</h3>
  </div>
  <div class="panel-body">
    Panel content
  </div>
</div>    
</div>