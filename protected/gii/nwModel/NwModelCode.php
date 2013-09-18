<?php

Yii::import('system.gii.generators.model.ModelCode');

class NwModelCode extends ModelCode
{
    public $baseModelPath;

    public $baseModelClass;

    /**
     * Lists the template files.
     * #MethodTracker
     * This method is based on {@link ModelCode::requiredTemplates}, from version 1.1.7 (r3135). Changes:
     * <ul>
     * <li>Includes the base model.</li>
     * </ul>
     * @return array A list of required template filenames.
     */
    public function requiredTemplates() {
        $array = parent::requiredTemplates();
        $array[] = "base" . DIRECTORY_SEPARATOR . "model.php";
        return $array;
    }

    public function prepare()
    {
        if (($pos = strrpos($this->tableName, '.')) !== false) {
            $schema = substr($this->tableName, 0, $pos);
            $tableName = substr($this->tableName, $pos + 1);
        } else {
            $schema = '';
            $tableName = $this->tableName;
        }
        if ($tableName[strlen($tableName) - 1] === '*') {
            $tables = Yii::app()->db->schema->getTables($schema);
            if ($this->tablePrefix != '') {
                foreach ($tables as $i => $table) {
                    if (strpos($table->name, $this->tablePrefix) !== 0)
                        unset($tables[$i]);
                }
            }
        }
        else {
            $tables=array($this->getTableSchema($this->tableName));
        }

        $this->files = array();
        $templatePath = $this->templatePath;

        $this->relations = $this->generateRelations();

        foreach ($tables as $table) {
            $tableName = $this->removePrefix($table->name);
            $className = $this->generateClassName($table->name);

            $params = array(
                'tableName'=>$schema==='' ? $tableName : $schema.'.'.$tableName,
                'modelClass'=>$className,
                'columns'=>$table->columns,
                'labels'=>$this->generateLabels($table),
                'rules'=>$this->generateRules($table),
                'relations'=>isset($this->relations[$className]) ? $this->relations[$className] : array(),
                'connectionId'=>$this->connectionId,
            );

            // Setup base model information.
            $this->baseModelPath = $this->modelPath . '.base';
            $this->baseModelClass = 'Base' . $className;
            // Generate the model.
            $this->files[] = new CCodeFile(
                            Yii::getPathOfAlias($this->modelPath . '.' . $className) . '.php',
                            $this->render($templatePath . DIRECTORY_SEPARATOR . 'model.php', $params)
            );
            // Generate the base model.
            $this->files[] = new CCodeFile(
                            Yii::getPathOfAlias($this->baseModelPath . '.' . $this->baseModelClass) . '.php',
                            $this->render($templatePath . DIRECTORY_SEPARATOR . 'base' . DIRECTORY_SEPARATOR . 'model.php', $params)
            );
        }
    }

}