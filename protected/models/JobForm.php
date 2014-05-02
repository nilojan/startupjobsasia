<?php


class JobForm extends CFormModel
{
	public $title;
	public $description;
	public $responsibility;
	public $requirement;
	public $full_time;
	public $part_time;
	public $freelance;
	public $internship;
	public $temporary;
	public $co_founder;
	public $contract;
   // public $salary;
    public $min_salary;
    public $max_salary;
	public $no_salary;
	public $no_salary_options;
	public $currency;
	public $howtoapply;	
    public $created;
    public $modified;
    public $location;
    public $tags;
    public $premium;
    public $category;
    public $meta;
    public $meta_title;
    public $url;
        
	/**
	 * Declares the validation rules.
	 */
public function rules(){
	if(!(Yii::app()->user->isAdmin()))
	{
		return array(
			// name, email, subject and body are required
			array('title, description, responsibility, requirement,location, category, tags', 'required'),
		
		//array('types', 'in','range'=>array('full_time,part_time,freelance,internship,temporary,co_founder,contract')),
		
		//http://www.yiiframework.com/forum/index.php/topic/22651-validation-rule-at-least-one-of-three-fields-is-filled/

		
            array('min_salary,max_salary,no_salary,no_salary_options,currency,category,meta,location,full_time,contract,temporary,part_time,freelance,internship,co_founder,howtoapply','safe'),
			array('min_salary, max_salary', 'numerical', 'integerOnly'=>true),
			array('min_salary, max_salary', 'length', 'min'=>1, 'max'=>9),
			array('title', 'length', 'min'=>5),
			array('max_salary', 'compare', 'compareAttribute' => 'min_salary', 'operator'=>'>=','allowEmpty'=>false , 'message'=> 'Maximum Salary must be greater than or Equal to Minimum salary'),
                    
            array('created,modified','default',
                            'value'=>new CDbExpression('NOW()'),
                        'setOnEmpty'=>false,'on'=>'insert'),
						
			//array('howtoapply', 'ext.MultiEmailValidator.MultiEmailValidator', 'max'=>5,'message'=> 'Additional emails should be valid email address'),

    //array('howtoapply', 'validateEmil','message'=> 'Additional emails should be valid email addresss'),
                        // verifyCode needs to be entered correctly
		//	array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}else{

		return array(
			// name, email, subject and body are required
			array('title, description', 'required'),
		
		//array('types', 'in','range'=>array('full_time,part_time,freelance,internship,temporary,co_founder,contract')),

		
                        array('min_salary,max_salary,no_salary,no_salary_options,currency,category,meta,location,howtoapply','safe'),
						array('min_salary, max_salary', 'numerical', 'integerOnly'=>true),
						array('max_salary', 'compare', 'compareAttribute' => 'min_salary', 'operator'=>'>=','allowEmpty'=>false , 'message'=> 'Maximum Salary must be greater than or Equal to Minimum salary'),
                    
                      array('created,modified','default',
                            'value'=>new CDbExpression('NOW()'),
                        'setOnEmpty'=>false,'on'=>'insert'),
    
                        // verifyCode needs to be entered correctly
		//	array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}
		
	}
	
	
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'title'=>'Job Title',
			'category'=>'Job Category',
			'verifyCode'=>'Verification Code',
			'howtoapply' =>'Additional Email Receive',
			'tags' =>'Key Words',
			'meta'=>'Meta Description',
			'meta_title'=> 'Meta Title',
			'ulr'=> 'URL',
			'premium'=>'Add to Premium',
			'responsibility'=>'Job Responsibilities',
			'description'=>'Startup Description',
			'no_salary' =>'Salary',
			'no_salary_options' =>'Additional Components',
 
		);
	}
	
	/*
    public function validateEmil($attribute,$params)
    {
    
		$attribute = trim($attribute);
		$values = preg_split(",",$attribute);

		foreach($values as $value)
		{

			if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
				$this->addError($attribute, 'your email is not valid!');
				//return false;
			}else{
				$this->addError($attribute, 'your email is valid!');
				//return true;
			}

		}
    }
*/
	
}