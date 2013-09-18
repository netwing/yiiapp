<?php

Yii::import('system.gii.generators.model.ModelGenerator');

class NwModelGenerator extends ModelGenerator
{
    public $codeModel='application.gii.nwModel.NwModelCode';

    public function actionIndex()
    {
        $model=$this->prepare();
        if($model->files!=array() && isset($_POST['generate'], $_POST['answers']))
        {
            $model->answers=$_POST['answers'];
            $model->status=$model->save() ? CCodeModel::STATUS_SUCCESS : CCodeModel::STATUS_ERROR;
        }

        $this->render('system.gii.generators.model.views.index',array(
            'model'=>$model,
        ));
    }
}