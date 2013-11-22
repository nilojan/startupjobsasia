<?php


class JobForm extends CFormModel
{
	public $title;
	public $description;
	public $responsibility;
	public $requirement;
	public $howtoapply;
	public $type;
	public $types;
	public $full_time;
	public $part_time;
	public $freelance;
	public $internship;
	public $temporary;
	public $co_founder;
    public $salary;
    public $min_salary;
    public $max_salary;
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
			array('title, description, responsibility, requirement,location, category, tags,salary', 'required'),
		
		//array('types', 'in','range'=>array('full_time,part_time,freelance,internship,temporary,co_founder')),

		
                        array('salary,category,meta,location','safe'),
                    
                      array('created,modified','default',
                            'value'=>new CDbExpression('NOW()'),
                        'setOnEmpty'=>false,'on'=>'insert'),
    
                        // verifyCode needs to be entered correctly
		//	array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}else{

		return array(
			// name, email, subject and body are required
			array('title, description', 'required'),
		
		//array('types', 'in','range'=>array('full_time,part_time,freelance,internship,temporary,co_founder')),

		
                        array('salary,category,meta,location','safe'),
                    
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
			'verifyCode'=>'Verification Code',
			'howtoapply' =>'Additional Email Receive',
			'tags' =>'Key Words',
			'meta'=>'Meta Description',
			'meta_title'=> 'Meta Title',
			'ulr'=> 'URL',
			'premium'=>'Add to Premium',
 
		);
	}
}