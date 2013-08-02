<?php

class user extends CActiveRecord {
    
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
                'application'=> array(self::HAS_MANY, 'application', 'ID'),
        
        );
    } 
    public function beforeSave() {
        date_default_timezone_set('Asia/Singapore');
        $date = date('Y-m-d H:i:s');
        if ($this->isNewRecord) {
                $this->registered = $date;
           
        }
      //  $this->modified = $date;
 
        return parent::beforeSave();
    }
    
    
    
}

?>
