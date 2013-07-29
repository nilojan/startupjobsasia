<?php

/**
 * This is the model class for table "user_details".
 *
 * The followings are the available columns in table 'user_details':
 * @property integer $ud_id
 * @property integer $u_id
 * @property string $fname
 * @property string $lname
 * @property integer $contact
 * @property string $email
 * @property string $gender
 * @property string $dob
 * @property string $country
 * @property string $last_job
 * @property string $h_edu
 * @property integer $work_exp
 * @property integer $curr_salary
 * @property integer $exp_salary
 * @property string $availability
 * @property string $resume1
 * @property string $resume2
 * @property string $resume_uploaded
 * @property string $photo
 * @property string $cover_letter
 * @property string $modified
 */
class Userdetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Userdetails the static model class
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
		return 'user_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('u_id, fname, lname, contact, email, gender, dob, country, last_job, h_edu, work_exp, curr_salary, exp_salary, availability, resume1, resume2, resume_uploaded, photo, cover_letter', 'required'),
			array('u_id, contact, work_exp, curr_salary, exp_salary', 'numerical', 'integerOnly'=>true),
			array('fname, lname', 'length', 'max'=>30),
			array('email', 'length', 'max'=>100),
			array('gender', 'length', 'max'=>10),
			array('country', 'length', 'max'=>50),
			array('last_job, h_edu, resume1, resume2, photo', 'length', 'max'=>250),
			array('availability', 'length', 'max'=>20),
			array('cover_letter', 'length', 'max'=>1500),
			array('modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ud_id, u_id, fname, lname, contact, email, gender, dob, country, last_job, h_edu, work_exp, curr_salary, exp_salary, availability, resume1, resume2, resume_uploaded, photo, cover_letter, modified', 'safe', 'on'=>'search'),
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
			'ud_id' => 'Ud',
			'u_id' => 'U',
			'fname' => 'Fname',
			'lname' => 'Lname',
			'contact' => 'Contact',
			'email' => 'Email',
			'gender' => 'Gender',
			'dob' => 'Dob',
			'country' => 'Country',
			'last_job' => 'Last Job',
			'h_edu' => 'H Edu',
			'work_exp' => 'Work Exp',
			'curr_salary' => 'Curr Salary',
			'exp_salary' => 'Exp Salary',
			'availability' => 'Availability',
			'resume1' => 'Resume1',
			'resume2' => 'Resume2',
			'resume_uploaded' => 'Resume Uploaded',
			'photo' => 'Photo',
			'cover_letter' => 'Cover Letter',
			'modified' => 'Modified',
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

		$criteria->compare('ud_id',$this->ud_id);
		$criteria->compare('u_id',$this->u_id);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('contact',$this->contact);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('last_job',$this->last_job,true);
		$criteria->compare('h_edu',$this->h_edu,true);
		$criteria->compare('work_exp',$this->work_exp);
		$criteria->compare('curr_salary',$this->curr_salary);
		$criteria->compare('exp_salary',$this->exp_salary);
		$criteria->compare('availability',$this->availability,true);
		$criteria->compare('resume1',$this->resume1,true);
		$criteria->compare('resume2',$this->resume2,true);
		$criteria->compare('resume_uploaded',$this->resume_uploaded,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('cover_letter',$this->cover_letter,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}