<?php

//use PDO;
 
class Db {
   protected $db;
   //public $id;


   public function __construct() {
       $dsn = "mysql:host=127.0.0.1;dbname=forma";
       $this->db = new PDO($dsn,'root','dmitry13');
      
        $stmt = $this->db->prepare('TRUNCATE `links`');
       $stmt->execute();
      
   }
   
   public function insLink($sql,$href){
       //echo 'new Db';
       $stmt = $this->db->prepare($sql);
       //echo $sql.'---'.$href.'<hr>';
       $stmt->execute(array('link'=>$href));
       return $stmt;
   }
   
   public function query(){
       $stmt = $this->db->query("SELECT `link` FROM `links`");
    return $stmt;
   }
   
   public function insCont($id,$cont){
      // echo $cont.'<hr>';
       echo $id.'<hr>';
      $sql="INSERT INTO `content` SET `id_href`= :id ,`cont`= :cont";
      $stmt = $this->db->prepare($sql);
       return $stmt->execute(array('id'=>$id,'cont'=>$cont));
   }

}
