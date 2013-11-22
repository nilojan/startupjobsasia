<?php

class feeds extends CActiveRecord {
    
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
    public function beforeSave() {
        date_default_timezone_set('Asia/Singapore');
        $date = date('Y-m-d H:i:s');
        if ($this->isNewRecord) 
                $this->created = $date;
                
 
    return parent::beforeSave();
}
    
    
}



?>
