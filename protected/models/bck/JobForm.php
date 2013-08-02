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
        public $salary;
        public $created;
        public $modified;
        public $location;
        public $tags;
        public $category;
	/**
	 * Declares the validation rules.
	 */
	public function rules(){
		return array(
			// name, email, subject and body are required
			array('title, description, howtoapply, responsibility, requirement, type,location, category, tags', 'required'),
		
		//array('types', 'in','range'=>array('full_time,part_time,freelance,internship,temporary')),

		
                        array('salary,category,location','safe'),
                    
                      array('created,modified','default',
                            'value'=>new CDbExpression('NOW()'),
                        'setOnEmpty'=>false,'on'=>'insert'),
    
                        // verifyCode needs to be entered correctly
		//	array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
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
			'howtoapply' =>'How to Apply',
			'tags' =>'Key Words',

		);
	}
}