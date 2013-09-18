<?php

Yii::import('system.gii.generators.crud.CrudGenerator');

class NwCrudGenerator extends CrudGenerator
{
    public $codeModel='application.gii.nwCrud.NwCrudCode';

    public function actionIndex()
    {
        $model=$this->prepare();
        if($model->files!=array() && isset($_POST['generate'], $_POST['answers']))
        {
            $model->answers=$_POST['answers'];
            $model->status=$model->save() ? CCodeModel::STATUS_SUCCESS : CCodeModel::STATUS_ERROR;
        }

        $this->render('system.gii.generators.crud.views.index',array(
            'model'=>$model,
        ));
    }
}