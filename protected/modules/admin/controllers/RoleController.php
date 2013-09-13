<?php

class RoleController extends Controller
{
    /**
    * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
    * using two-column layout. See 'protected/views/layouts/column2.php'.
    */
    public $layout='//layouts/column2';

    /**
    * @return array action filters
    */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
    * Specifies the access control rules.
    * This method is used by the 'accessControl' filter.
    * @return array access control rules
    */
    public function accessRules()
    {
        return array(
            array('allow', 'actions' => array('index', 'view', 'admin'), 'roles' => array('admin:user:read')),
            array('allow', 'actions' => array('create'), 'roles' => array('admin:user:create')),
            array('allow', 'actions' => array('update', 'view', 'admin'), 'roles' => array('admin:user:update')),
            array('allow', 'actions' => array('delete', 'view', 'admin'), 'roles' => array('admin:user:delete')),
            array('deny', 'users'=>array('*')),
        );
    }

    /**
    * Displays a particular model.
    * @param integer $id the ID of the model to be displayed
    */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
    * Creates a new model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    */
    public function actionCreate()
    {
        $model = new AuthItem;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['AuthItem']))
        {
            $model->attributes=$_POST['AuthItem'];
            if($model->save()) {
                $this->redirect(array('view','id'=>$model->name));
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
    * Updates a particular model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id the ID of the model to be updated
    */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if(isset($_POST['AuthItem'])) {
            // Delete all child from this role
            $cmd = Yii::app()->db->createCommand("DELETE FROM {{auth_item_child}} WHERE parent = :parent")->bindValue(':parent', $model->name);
            $cmd->execute();
            $model->attributes = $_POST['AuthItem'];
            if($model->save()) {
                foreach ($_POST as $key => $value) {
                    if (substr($key, 0, 9) == 'authChild' and is_array($value)) {
                        foreach ($value as $item)
                        Yii::app()->authManager->addItemChild($model->name, $item);

                    }
                }
                Yii::app()->authManager->save();
                Yii::app()->user->setFlash('success', Yii::t('app', 'Permissions successfully saved.'));
                $this->redirect(array('view','id'=>$model->name));
            }
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
    * Deletes a particular model.
    * If deletion is successful, the browser will be redirected to the 'admin' page.
    * @param integer $id the ID of the model to be deleted
    */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
    * Lists all models.
    */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('AuthItem');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
    * Manages all models.
    */
    public function actionAdmin()
    {
        $model=new AuthItem('search');
        $model->unsetAttributes();  // clear any default values
        $model->type = CAuthItem::TYPE_ROLE;
        if(isset($_GET['AuthItem'])) {
            $model->attributes=$_GET['AuthItem'];
        }

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
    * Returns the data model based on the primary key given in the GET variable.
    * If the data model is not found, an HTTP exception will be raised.
    * @param integer $id the ID of the model to be loaded
    * @return AuthItem the loaded model
    * @throws CHttpException
    */
    public function loadModel($id)
    {
        $model=AuthItem::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
    * Performs the AJAX validation.
    * @param AuthItem $model the model to be validated
    */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='auth-item-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}