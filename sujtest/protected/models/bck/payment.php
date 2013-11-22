<?php


class payment extends CFormModel
{
    public $card_number;
    public $expiration_month;
    public $expiration_year;
    public $cv_code;
             
    public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('card_number, expiration_month, expiration_year, cv_code','required')
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

