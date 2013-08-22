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
			array('fname, lname, contact, email, coverLetter, gender, country, edu', 'required'),
			array('UID, registered, work_exp, curr_salary, exp_salary, views', 'numerical', 'integerOnly'=>true),
			array('fname, lname', 'length', 'max'=>30),
			array('email, photo', 'length', 'max'=>250),
			array('gender', 'length', 'max'=>10),
			array('location, source, ip', 'length', 'max'=>255),
			array('country', 'length', 'max'=>50),
			array('lastjob, edu', 'length', 'max'=>250),
			array('availability, acc_status', 'length', 'max'=>20),
			array('resume', 'length', 'max'=>256),
			array('last_modified', 'safe'),
			array('dob', 'safe'),

			array('work_exp, curr_salary, exp_salary, availability, content, source, ip, acc_status, views','safe'),
			//image upload		
			array('photo', 'file', 'types'=>'jpg,gif,png', 'allowEmpty'=>true,'wrongType'=>'Only jpg/gif/png allowed.'),
			array('resume', 'file', 'types'=>'pdf,doc,docx', 'allowEmpty'=>true,'wrongType'=>'Only pdf/doc/docx allowed.'),
			array('coverLetter', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EID, UID, registered, fname, lname, contact, email, photo, coverLetter, gender, dob, location, country, lastjob, edu, work_exp, curr_salary, exp_salary, availability, resume, content, source, ip, acc_status, views, last_modified', 'safe', 'on'=>'search'),

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
            'Application1'=> array(self::HAS_MANY, 'Application1', 'EID'),
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
			'coverLetter' => 'Cover Letter',
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

<<<<<<< HEAD
	public function getCountryList()
    {
      return array(
		      'afghan'=>'Afghan',
		      'albanian'=>'Albanian',
		      'algerian'=>'Algerian',
		      'american'=>'American',
		      'andorran'=>'Andorran',
		      'angolan'=>'Angolan',
		      'antiguans'=>'Antiguans',
		      'argentinean'=>'Argentinean',
		      'armenian'=>'Armenian',
		      'australian'=>'Australian',
		      'austrian'=>'Austrian',
		      'azerbaijani'=>'Azerbaijani',
		      'bahamian'=>'Bahamian',
		      'bahraini'=>'Bahraini',
		      'bangladeshi'=>'Bangladeshi',
		      'barbadian'=>'Barbadian',
		      'barbudans'=>'Barbudans',
		      'batswana'=>'Batswana',
		      'belarusian'=>'Belarusian',
		      'belgian'=>'Belgian',
		      'belizean'=>'Belizean',
		      'beninese'=>'Beninese',
		      'bhutanese'=>'Bhutanese',
		      'bolivian'=>'Bolivian',
		      'bosnian'=>'Bosnian',
		      'brazilian'=>'Brazilian',
		      'british'=>'British',
		      'bruneian'=>'Bruneian',
		      'bulgarian'=>'Bulgarian',
		      'burkinabe'=>'Burkinabe',
		      'burmese'=>'Burmese',
		      'burundian'=>'Burundian',
		      'cambodian'=>'Cambodian',
		      'cameroonian'=>'Cameroonian',
		      'canadian'=>'Canadian',
		      'cape verdean'=>'Cape Verdean',
		      'central african'=>'Central African',
		      'chadian'=>'Chadian',
		      'chilean'=>'Chilean',
		      'chinese'=>'Chinese',
		      'colombian'=>'Colombian',
		      'comoran'=>'Comoran',
		      'congolese'=>'Congolese',
		      'costa rican'=>'Costa Rican',
		      'croatian'=>'Croatian',
		      'cuban'=>'Cuban',
		      'cypriot'=>'Cypriot',
		      'czech'=>'Czech',
		      'danish'=>'Danish',
		      'djibouti'=>'Djibouti',
		      'dominican'=>'Dominican',
		      'dutch'=>'Dutch',
		      'east timorese'=>'East Timorese',
		      'ecuadorean'=>'Ecuadorean',
		      'egyptian'=>'Egyptian',
		      'emirian'=>'Emirian',
		      'equatorial guinean'=>'Equatorial Guinean',
		      'eritrean'=>'Eritrean',
		      'estonian'=>'Estonian',
		      'ethiopian'=>'Ethiopian',
		      'fijian'=>'Fijian',
		      'filipino'=>'Filipino',
		      'finnish'=>'Finnish',
		      'french'=>'French',
		      'gabonese'=>'Gabonese',
		      'gambian'=>'Gambian',
		      'georgian'=>'Georgian',
		      'german'=>'German',
		      'ghanaian'=>'Ghanaian',
		      'greek'=>'Greek',
		      'grenadian'=>'Grenadian',
		      'guatemalan'=>'Guatemalan',
		      'guinea-bissauan'=>'Guinea-Bissauan',
		      'guinean'=>'Guinean',
		      'guyanese'=>'Guyanese',
		      'haitian'=>'Haitian',
		      'herzegovinian'=>'Herzegovinian',
		      'honduran'=>'Honduran',
		      'hungarian'=>'Hungarian',
		      'icelander'=>'Icelander',
		      'indian'=>'Indian',
		      'indonesian'=>'Indonesian',
		      'iranian'=>'Iranian',
		      'iraqi'=>'Iraqi',
		      'irish'=>'Irish',
		      'israeli'=>'Israeli',
		      'italian'=>'Italian',
		      'ivorian'=>'Ivorian',
		      'jamaican'=>'Jamaican',
		      'japanese'=>'Japanese',
		      'jordanian'=>'Jordanian',
		      'kazakhstani'=>'Kazakhstani',
		      'kenyan'=>'Kenyan',
		      'kittian and nevisian'=>'Kittian and Nevisian',
		      'kuwaiti'=>'Kuwaiti',
		      'kyrgyz'=>'Kyrgyz',
		      'laotian'=>'Laotian',
		      'latvian'=>'Latvian',
		      'lebanese'=>'Lebanese',
		      'liberian'=>'Liberian',
		      'libyan'=>'Libyan',
		      'liechtensteiner'=>'Liechtensteiner',
		      'lithuanian'=>'Lithuanian',
		      'luxembourger'=>'Luxembourger',
		      'macedonian'=>'Macedonian',
		      'malagasy'=>'Malagasy',
		      'malawian'=>'Malawian',
		      'malaysian'=>'Malaysian',
		      'maldivan'=>'Maldivan',
		      'malian'=>'Malian',
		      'maltese'=>'Maltese',
		      'marshallese'=>'Marshallese',
		      'mauritanian'=>'Mauritanian',
		      'mauritian'=>'Mauritian',
		      'mexican'=>'Mexican',
		      'micronesian'=>'Micronesian',
		      'moldovan'=>'Moldovan',
		      'monacan'=>'Monacan',
		      'mongolian'=>'Mongolian',
		      'moroccan'=>'Moroccan',
		      'mosotho'=>'Mosotho',
		      'motswana'=>'Motswana',
		      'mozambican'=>'Mozambican',
		      'namibian'=>'Namibian',
		      'nauruan'=>'Nauruan',
		      'nepalese'=>'Nepalese',
		      'new zealander'=>'New Zealander',
		      'ni-vanuatu'=>'Ni-Vanuatu',
		      'nicaraguan'=>'Nicaraguan',
		      'nigerien'=>'Nigerien',
		      'north korean'=>'North Korean',
		      'northern irish'=>'Northern Irish',
		      'norwegian'=>'Norwegian',
		      'omani'=>'Omani',
		      'pakistani'=>'Pakistani',
		      'palauan'=>'Palauan',
		      'panamanian'=>'Panamanian',
		      'papua new guinean'=>'Papua New Guinean',
		      'paraguayan'=>'Paraguayan',
		      'peruvian'=>'Peruvian',
		      'polish'=>'Polish',
		      'portuguese'=>'Portuguese',
		      'qatari'=>'Qatari',
		      'romanian'=>'Romanian',
		      'russian'=>'Russian',
		      'rwandan'=>'Rwandan',
		      'saint lucian'=>'Saint Lucian',
		      'salvadoran'=>'Salvadoran',
		      'samoan'=>'Samoan',
		      'san marinese'=>'San Marinese',
		      'sao tomean'=>'Sao Tomean',
		      'saudi'=>'Saudi',
		      'scottish'=>'Scottish',
		      'senegalese'=>'Senegalese',
		      'serbian'=>'Serbian',
		      'seychellois'=>'Seychellois',
		      'sierra leonean'=>'Sierra Leonean',
		      'singaporean'=>'Singaporean',
		      'slovakian'=>'Slovakian',
		      'slovenian'=>'Slovenian',
		      'solomon islander'=>'Solomon Islander',
		      'somali'=>'Somali',
		      'south african'=>'South African',
		      'south korean'=>'South Korean',
		      'spanish'=>'Spanish',
		      'sri lankan'=>'Sri Lankan',
		      'sudanese'=>'Sudanese',
		      'surinamer'=>'Surinamer',
		      'swazi'=>'Swazi',
		      'swedish'=>'Swedish',
		      'swiss'=>'Swiss',
		      'syrian'=>'Syrian',
		      'taiwanese'=>'Taiwanese',
		      'tajik'=>'Tajik',
		      'tanzanian'=>'Tanzanian',
		      'thai'=>'Thai',
		      'togolese'=>'Togolese',
		      'tongan'=>'Tongan',
		      'trinidadian or tobagonian'=>'Trinidadian or Tobagonian',
		      'tunisian'=>'Tunisian',
		      'turkish'=>'Turkish',
		      'tuvaluan'=>'Tuvaluan',
		      'ugandan'=>'Ugandan',
		      'ukrainian'=>'Ukrainian',
		      'uruguayan'=>'Uruguayan',
		      'uzbekistani'=>'Uzbekistani',
		      'venezuelan'=>'Venezuelan',
		      'vietnamese'=>'Vietnamese',
		      'welsh'=>'Welsh',
		      'yemenite'=>'Yemenite',
		      'zambian'=>'Zambian',
		      'zimbabwean'=>'Zimbabwean',
			);
    }
=======

>>>>>>> viv_changes
}