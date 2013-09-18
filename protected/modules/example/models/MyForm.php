<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $role
 * @property string $tstamp
 */
class MyForm extends CFormModel
{
    public $my_date;
    public $my_time;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('my_date, my_time', 'required'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
            'my_date' => Yii::t('form', 'My Date'),
			'my_time' => Yii::t('form', 'My Time'),
		);
	}

}