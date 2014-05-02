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
 * @property string $coverLetter
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
 * @property string $agree 
 * @property integer $views
 * @property string $tags
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
		return 'employee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fname, lname, contact, email, country,gender, edu', 'required'),
			array('fname,lname','nameWithSpace'),
			array('email','validateEmail'),
			array('agree', 'required','message'=>'You must agree the agreement.'),
			//array('email', 'unique','message'=>'Email already registered, Please Login'),
			//array('email', 'unique', 'className' => 'user', 'attributeName' => 'email','on'=>'update', 'message'=>'This email already registered <script> var rr = 1</script>'),
			array('UID, registered, curr_salary, exp_salary, views', 'numerical', 'integerOnly'=>true),
			array('fname, lname', 'length', 'max'=>30),
			array('lastjob, edu', 'length', 'max'=>250),
			array('availability, acc_status', 'length', 'max'=>20),
			array('resume', 'length', 'max'=>256),
			array('last_modified,resume,dob,country,edu,gender,contact,fname,lname,agree', 'safe'),

			array('photo,location,work_exp, tags,curr_salary, exp_salary, availability, content, source, ip, acc_status, views','safe'),
			//image upload		
			array('photo', 'file', 'types'=>'jpg,gif,png', 'allowEmpty'=>true,'wrongType'=>'Only jpg/gif/png allowed.'),

			array('email', 'addressNotInUseByUser'),

			//array('resume', 'required','on'=>'update'),
			array('resume', 'file', 'types'=>'pdf,doc,docx','safe'=>true, 'allowEmpty'=>true,'wrongType'=>'Only pdf/doc/docx allowed.'),
			//array('resume','FileType'),
			array('coverLetter', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EID, UID, registered, fname, lname, contact, email, photo,tags, coverLetter, gender, dob, location, country, lastjob, edu, work_exp, curr_salary, exp_salary, availability, resume, content, source, ip, acc_status, views, last_modified', 'safe', 'on'=>'search'),

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
            'Application'=> array(self::HAS_MANY, 'Application', 'EID'),
            //'job'=> array(self::HAS_MANY, 'job', 'CID'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EID' => 'Employee ID',
			'UID' => 'User ID',
			'registered' => 'Registered',
			'fname' => 'First Name',
			'lname' => 'Last Name',
			'contact' => 'Contact Number',
			'email' => 'Email ID',
			'photo' => 'Photo',
			'coverLetter' => 'Achievements / Summary',
			'gender' => 'Gender',
			'dob' => 'Date of Birth',
			'location' => 'Current Location',
			'country' => 'Nationality',
			'lastjob' => 'Last Job',
			'edu' => 'Education',
			'work_exp' => 'Work Experience',
			'curr_salary' => 'Current Salary',
			'exp_salary' => 'Expected Salary',
			'availability' => 'Availability',
			'resume' => 'Updated Resume',
			'content' => 'Content',
			'source' => 'Source',
			'ip' => 'IP Address',
			'acc_status' => 'Account Status',
			'views' => 'Views',
			'last_modified' => 'Last Modified',
			'tags'=>'Tags/Keywords',
			'agree'=>'<small style="padding-top:20px;font-size:11px;">I agree to Startup Jobs Asia’s <a href ="/site/page/view/privacy-statement" target="_blank">Privacy Statement</a>, <a href ="/site/page/view/terms-and-conditions" target="_blank">Terms & Conditions</a></small>',
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
		$criteria->compare('agree',$this->agree,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('coverLetter',$this->coverLetter,true);
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

	public function checkDuplicate($attribute,$params)
	{
		$attribute = strtolower(trim($attribute));
		$user = user::model()->find('email=:email AND email!=:Crntemail', array(':email'=>$this->$attribute,':Crntemail'=>Yii::app()->user->name));
		
		if($user===null){
            //$message=$this->message!==null?$this->message:Yii::t('yii','{attribute} "{value}" has already been taken.');
            //$this->addError($object,$attribute,$message,array('{value}'=>$value));
			$this->addError($attribute, 'email has already been taken');
        }

	}
	// from http://jeffreifman.com/yii/custom-validation/
// for validating inserts
	public function addressNotInUseByUser($attribute){
		if(user::model()->exists('email=:email and email!=:Crntemail',array(':email'=>$this->$attribute,':Crntemail'=>Yii::app()->user->name)))
		$this->addError($attribute, 'Sorry, this email is already in use<script>var rr = 1</script>');
	}

	public function validateEmail($attribute)
        {
            if(!filter_var($this->$attribute, FILTER_VALIDATE_EMAIL))
             {                
			  $this->addError($attribute, 'Sorry, this is not validate email address');
             } else {
                return true;
            }
            
        }
		
		
		public function NumberONly($attribute)
        {
            if (!preg_match("/^[0-9+]*$/",$this->$attribute))
             {                
			  $this->addError($attribute, 'Sorry, this is not validate number');
             } else {
                return true;
            }
            
        }




		public function nameWithSpace($attribute,$params)
        {
            if (!preg_match("/^[a-zA-Z0-9 ]*$/",$this->$attribute))
             {                
			  $this->addError($attribute, 'Sorry, this is not validate name');
             } else {
                return true;
            }
            
        }
		

		public function FileType($attribute,$params)
        {
			$extt = pathinfo($this->$attribute, PATHINFO_EXTENSION);
				if($extt != 'doc' || $extt != 'docx'  || $extt != 'pdf' )
				{
					$this->addError($attribute, 'Sorry, '.$extt.' this is not a validate file type');
				}else{
                return true;
				}
            
        }
}