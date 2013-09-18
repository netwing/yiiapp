<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $data <?php echo $this->getModelClass(); ?> */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php echo "<?php echo CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}), array('view','id'=>\$data->{$this->tableSchema->primaryKey})); ?>\n"; ?>
        </h3>
    </div>
    <div class="panel-body">

<?php
$count = 0;
foreach($this->tableSchema->columns as $column)
{
    if($column->isPrimaryKey)
        continue;
    if(++$count==7) {
        echo "\t<?php /*\n";
    }

    echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</b>\n";
    echo "\t<?php echo CHtml::encode(\$data->{$column->name}); ?><br />\n\n"; 
}
if($count>=7)
    echo "\t*/ ?>\n";
?>
    </div>
</div>

