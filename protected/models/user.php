<?php

/**
 * This is the model class for table "user1".
 *
 * The followings are the available columns in table 'user1':
 * @property integer $ID
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $name
 * @property string $role
 * @property string $activation_key
 * @property string $last_login
 * @property string $registered
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
		return 'user1';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'length', 'max'=>80),
			array('password', 'length', 'max'=>120),
			array('email, name, activation_key', 'length', 'max'=>100),
			array('role', 'length', 'max'=>2),
			array('last_login, registered', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, username, password, email, name, role, activation_key, last_login, registered', 'safe', 'on'=>'search'),
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
			'company'=> array(self::BELONGS_TO, 'company', 'CID'),
            'Application1'=> array(self::HAS_MANY, 'Application1', 'ID'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'name' => 'Name',
			'role' => 'Role',
			'activation_key' => 'Activation Key',
			'last_login' => 'Last Login',
			'registered' => 'Registered',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('activation_key',$this->activation_key,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('registered',$this->registered,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}