<?php
/**
 * 
 *
 * @property string $salary
 */
class job extends CActiveRecord {
        public $salary;

    
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
  /*  public function relations() {
    return array(
      // other relations
      array('company', self::BELONGS_TO, 'company', 'CID'),
    );
    }
    */
    public function scopes()
    {
        return array(
            'Internship'=>array(
                'condition'=>'type="Internship"',
            ),
             'Fulltime'=>array(
                'condition'=>'type="Full-time"',
            ),
            'Part-time'=>array(
                'condition'=>'type="Part-time"',
            ),
            'Freelance'=>array(
                'condition'=>'type="Freelance"',
            ),
            'Temporary'=>array(
                'condition'=>'type="Temporary"',
            ),
             'Co-Founder'=>array(
                'condition'=>'type="Co-Founder"',
            ),
             'Contract'=>array(
                'condition'=>'type="Contract"',
            ),
			
            'recent'=>array(
                'order'=>'create_time DESC',
                'limit'=>5,
            ),
        );
    }
	
	//http://www.yiiframework.com/forum/index.php/topic/10185-using-relations-and-conditions/ 
	
    public function relations()
    {
        return array(
            'company'=>array(self::BELONGS_TO, 'company', 'CID','condition'=>'registered=1'),
            'Application'=>array(self::HAS_MANY, 'Application', 'JID'),
           
            //'Employee'=>array(self::BELONGS_TO, 'Employee', 'EID'),
            
        );
    }
    public function attributeLabels()
    {
       return array(
            'meta' => 'Meta Title',
			'howtoapply' =>'Additional Email Receive',
			'no_salary' =>'Salary',
			'no_salary_options' =>'Additional Components',
        );
    }

    public function rules() {
   
        return array(
			array('title, description, responsibility, requirement,location, category, tags', 'required'),
			array('title', 'length', 'min'=>5),
            array('full_time,part_time,freelance,intership,temporary,co_founder,contract,salary,no_salary,no_salary_options,howtoapply,cmpny','safe'),
			array('min_salary, max_salary', 'numerical', 'integerOnly'=>true),
			array('max_salary', 'compare', 'compareAttribute' => 'min_salary', 'operator'=>'>=','allowEmpty'=>false , 'message'=> 'Maximum Salary must be greater than or Equal to Minimum salary'),
            //array('howtoapply', 'ext.MultiEmailValidator.MultiEmailValidator', 'delimiter'=>',', 'max'=>5,'message'=> 'Additional emails should be valid email address'),
        );
    }
    public function beforeSave() {
        date_default_timezone_set('Asia/Singapore');
        $date = date('Y-m-d H:i:s');
        if ($this->isNewRecord) {
                $this->created = $date;
                $date2 = date_create();
                $date2->add(new DateInterval('P'.Yii::app()->params['job_expire'].'D'));
                $date2 = $date2->format('Y-m-d H:i:s');
                $this->expire = $date2;
        }
        $this->modified = $date;
 
    return parent::beforeSave();
	}


	public function getUrl(){
		return Yii::app()->controller->createUrl('/job/job/JID', array(
			'JID'=>$this->id,
		));
	}

	public function getAbsoluteUrl(){
		return $_SERVER['SERVER_NAME'] . '/' . $_SERVER['REQUEST_URI'];
	}

}
?>