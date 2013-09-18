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
        Yii::app()->user->setFlash('warning',
            '<strong>Warning!</strong> Nulla vitae elit libero, a pharetra augue.');
        Yii::app()->user->setFlash('info',
            '<strong>Information!</strong> Nulla vitae elit libero, a pharetra augue.');
        Yii::app()->user->setFlash('success',
            '<strong>Success!</strong> Nulla vitae elit libero, a pharetra augue.');
        Yii::app()->user->setFlash('danger',
            '<strong>ERROR!</strong> Nulla vitae elit libero, a pharetra augue.');

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
        $expression = "* * * * *";
        $cron = Cron\CronExpression::factory($expression);
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

    public function actionDnd()
    {
        $this->render('dnd');
    }

    public function actionEmail($send = 0)
    {
        if ($send == 1) {
            // require_once Yii::getPathOfAlias('webroot.vendor.swiftmailer.swiftmailer') . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "swift_required.php";

            // Create the Transport the call setUsername() and setPassword()
            $transport = Swift_SmtpTransport::newInstance(EMAIL_SMTP_SERVER, EMAIL_SMTP_PORT)
                ->setUsername(EMAIL_SMTP_USERNAME)
                ->setPassword(EMAIL_SMTP_PASSWORD)
                ;

            // Create the Mailer using your created Transport
            $mailer = Swift_Mailer::newInstance($transport);

            // Create the message
            $message = Swift_Message::newInstance()
                // Give the message a subject
                ->setSubject('Your subject')
                // Set the From address with an associative array
                ->setFrom(array('john@doe.com' => 'John Doe'))
                // Set the To addresses with an associative array
                ->setTo(array('emanuele@deserti.net', 'emanuele.deserti@netwing.it' => 'Emanuele Deserti'))
                // Give it a body
                ->setBody('Here is the message itself')
                // And optionally an alternative body
                ->addPart('<q>Here is the message itself</q>', 'text/html')
                // Optionally add any attachments
                ->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('application.data') . DIRECTORY_SEPARATOR . "my-document.pdf"));
                ;

            if ($result = $mailer->send($message)) {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Email sent successfully'));
            } else {
                Yii::app()->user->setFlash('danger', Yii::t('app', 'Email error: ') . print_r($result, true));
            }

            $this->redirect(array("/example/default/email"));
        }

        $this->render('email');
    }

}