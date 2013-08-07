<?php

/**
 * This is the model class for table "employee1".
 *
 * The followings are the available columns in table 'employee1':
 * @property integer $EID
 * @property integer $UID
 * @property integer $registered
 * @property string $fname
 * @property string $lname
 * @property integer $contact
 * @property string $email
 * @property string $photo
 * @property string $coverletter
 * @property string $gender
 * @property string $dob
 * @property string $location
 * @property string $country
 * @property string $lastjob
 * @property string $edu
 * @property integer $work_exp
 * @property integer $curr_salary
 * @property integer $exp_salary
 * @property string $availability
 * @property string $resume
 * @property string $content
 * @property string $source
 * @property string $ip
 * @property string $acc_status
 * @property integer $views
 * @property string $last_modified
 */
class Employee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Employee the static model class
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
		return 'employee1';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fname, lname, contact, email, coverletter, gender, dob, location, country, lastjob, edu, work_exp, curr_salary, exp_salary, availability, content, source, ip, acc_status, views', 'required'),
			array('UID, registered, contact, work_exp, curr_salary, exp_salary, views', 'numerical', 'integerOnly'=>true),
			array('fname, lname', 'length', 'max'=>30),
			array('email, photo', 'length', 'max'=>250),
			array('gender', 'length', 'max'=>10),
			array('location, source, ip', 'length', 'max'=>255),
			array('country', 'length', 'max'=>50),
			array('lastjob, edu', 'length', 'max'=>250),
			array('availability, acc_status', 'length', 'max'=>20),
			array('resume', 'length', 'max'=>256),
			array('last_modified', 'safe'),
			//image upload		
			array('photo', 'file', 'types'=>'jpg,gif,png', 'allowEmpty'=>true,'wrongType'=>'Only jpg/gif/png allowed.'),
			array('resume', 'file', 'types'=>'pdf,doc,docx', 'allowEmpty'=>true,'wrongType'=>'Only pdf/doc/docx allowed.'),
			array('coverletter', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EID, UID, registered, fname, lname, contact, email, photo, coverletter, gender, dob, location, country, lastjob, edu, work_exp, curr_salary, exp_salary, availability, resume, content, source, ip, acc_status, views, last_modified', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EID' => 'Employee ID',
			'UID' => 'user ID',
			'registered' => 'Registered',
			'fname' => 'First Name',
			'lname' => 'Last Name',
			'contact' => 'Contact Number',
			'email' => 'Email ID',
			'photo' => 'Photo',
			'coverletter' => 'Cover Letter',
			'gender' => 'Gender',
			'dob' => 'Date of Birth',
			'location' => 'Location',
			'country' => 'Country',
			'lastjob' => 'Last Job',
			'edu' => 'Education',
			'work_exp' => 'Work Experience',
			'curr_salary' => 'Current Salary',
			'exp_salary' => 'Expected Salary',
			'availability' => 'Availability',
			'resume' => 'Resume',
			'content' => 'Content',
			'source' => 'Source',
			'ip' => 'IP Address',
			'acc_status' => 'Account Status',
			'views' => 'Views',
			'last_modified' => 'Last Modified',
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

		$criteria->compare('EID',$this->EID);
		$criteria->compare('UID',$this->UID);
		$criteria->compare('registered',$this->registered);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('contact',$this->contact);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('coverletter',$this->coverletter,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('lastjob',$this->lastjob,true);
		$criteria->compare('edu',$this->edu,true);
		$criteria->compare('work_exp',$this->work_exp);
		$criteria->compare('curr_salary',$this->curr_salary);
		$criteria->compare('exp_salary',$this->exp_salary);
		$criteria->compare('availability',$this->availability,true);
		$criteria->compare('resume',$this->resume,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('acc_status',$this->acc_status,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('last_modified',$this->last_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}