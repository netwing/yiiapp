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
class User extends CActiveRecord
{
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
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('name, username, password', 'required', 'on' => 'create'),
            array('role', 'required'),
			array('name, username, password', 'length', 'max'=>255),
            array('username, password', 'length', 'min'=>8),
            array('username', 'unique', 'on' => 'create'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('name, username', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            // 'admin_count' => array(self::STAT, "User", 'select' => 'COUNT(*)', 'condition' => "role = 'admin'"),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('model', 'ID'),
            'name' => Yii::t('model', 'Name'),
			'username' => Yii::t('model', 'Username'),
			'password' => Yii::t('model', 'Password'),
			'role' => Yii::t('model', 'Role'),
			'tstamp' => Yii::t('model', 'Tstamp'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

        $criteria->compare('name',$this->name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('role',$this->role,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function beforeSave()
    {
        // Force NO change to administrator user
        if (!$this->isNewRecord) {
            $curr = self::findByPk($this->id);
            if ($curr->username == 'administrator') {
                $this->username = "administrator";
                $this->role = $curr->role;
            }
        }

        if ($this->isNewRecord and strlen($this->password) > 0) {
            $this->password = crypt($this->password);
        }
        // If no password on update, reset to original password
        if (!$this->isNewRecord) {
            if (strlen($this->password) == 0) {
                $user = $this->findByPk($this->id);
                $this->password = $user->password;
            } else {
                $this->password = crypt($this->password);       
            }
        }

        if (!is_array($this->role)) {
            $this->role = array();
        }
        $this->role = json_encode($this->role);


        return parent::beforeSave();
    }

    public function afterFind()
    {
        $this->role = json_decode($this->role);
        return parent::afterFind();
    }

    public function beforeDelete()
    {
        if (Yii::app()->user->getId() == $this->id) {
            return false;
        }
        return parent::beforeDelete();
    }

}