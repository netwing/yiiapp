    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
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
            array('allow', 'actions' => array('index', 'view', 'admin'), 'roles' => array('<?php echo str_replace("/", ":", $controller->controller); ?>:read')),
            array('allow', 'actions' => array('create'), 'roles' => array('<?php echo str_replace("/", ":", $controller->controller); ?>:create')),
            array('allow', 'actions' => array('update'), 'roles' => array('<?php echo str_replace("/", ":", $controller->controller); ?>:update')),
            array('allow', 'actions' => array('delete'), 'roles' => array('<?php echo str_replace("/", ":", $controller->controller); ?>:delete')),
            array('deny', 'users'=>array('*')),
        );
    }
