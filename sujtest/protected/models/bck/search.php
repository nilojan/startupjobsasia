<?php


class search extends CFormModel
{
    public $username;
    public $name;
    
    public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name','safe')
                            );
         }

 public function attributeLabels()
	{
		return array(
			
		);
	}       
 public function Search()   {
 }
 }       

