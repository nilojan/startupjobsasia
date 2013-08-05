<?php

class company extends CActiveRecord {
    
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
      'job'=> array(self::HAS_MANY, 'job', 'CID'),
      'approve'=> array(self::HAS_ONE, 'approve', 'CID'),
      'user'=> array(self::HAS_ONE, 'user', 'CID'),
      'application'=> array(self::HAS_MANY, 'application', 'ID'),
      
    //  'order'=>'job.created ASC',
        
    );
  }
    
     public function beforeSave() {
        $date = date('Y-m-d H:i:s');
        if ($this->isNewRecord) {
                $this->created = $date;
           
        }
        $this->modified = $date;
 
        return parent::beforeSave();
    }
    
}

?>
