<?php

class approve extends CActiveRecord {
    
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
    public function rules() {
        return array(
            
        );
    }
    
 public function relations() {
  return array(
   // other relations
     'company'=> array(self::BELONGS_TO, 'company', 'CID'),
        
    );
  }
  
     public function beforeSave() {
        date_default_timezone_set('Asia/Singapore');
        $date = date('Y-m-d H:i:s');
        if ($this->isNewRecord) {
                $this->submitted = $date;
           
        }
        $this->approved = $date;
 
        return parent::beforeSave();
    }
}

?>
