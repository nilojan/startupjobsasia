<?php

class resume extends CActiveRecord {
    
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }



    public function rules() {
   
        return array(
            
        );
    }
	
    public function beforeSave() {
        date_default_timezone_set('Asia/Singapore');
        $date = date('Y-m-d H:i:s');
        if ($this->isNewRecord) 
            $this->datee = $date;                
 
    return parent::beforeSave();
}
    
    
}



?>
