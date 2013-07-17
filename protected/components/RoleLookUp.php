<?php

class RoleLookUp{
      const MEMBER = 0;
      const ADMIN  = 1;
      const COMPANY =2;
      // For CGridView, CListView Purposes
      public static function getLabel( $Role ){
          if($role == self::MEMBER)
             return 'Member';
          if($role == self::ADMIN)
             return 'Administrator';
          if($role == self::COMPANY)
             return 'company';
          return false;
      }
      // for dropdown lists purposes
      public static function getLevelList(){
          return array(
                 self::MEMBER=>'Member',
                 self::ADMIN=>'Administrator',
                 self::COMPANY=>'Company');
    }
}
?>
