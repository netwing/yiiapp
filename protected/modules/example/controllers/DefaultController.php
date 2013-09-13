<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionElements()
    {
        $this->render('elements');
    }

    public function actionMessages()
    {
        Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_ERROR,
            '<strong>ERROR!</strong> Nulla vitae elit libero, a pharetra augue.');
        Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_WARNING,
            '<strong>Warning!</strong> Nulla vitae elit libero, a pharetra augue.');
        Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_INFO,
            '<strong>Information!</strong> Nulla vitae elit libero, a pharetra augue.');
        Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,
            '<strong>Success!</strong> Nulla vitae elit libero, a pharetra augue.');

        $this->redirect(array("/example/default/index"));

    }

    public function actionDatetime()
    {
        $model = new MyForm();
        $model->my_date = "2013-08-01";
        $model->my_time = "13:15:00";
        $this->render('datetime', array('model' => $model));   
    }

    public function actionCron()
    {
        $cron = Yii::app()->cron->getInstance('5 */1 * * *');
        $this->render('cron', array('cron' => $cron));
    }

    public function actionCalendar()
    {
        $this->render('calendar');
    }

    public function actionNode()
    {
        $this->render('node');
    }

}