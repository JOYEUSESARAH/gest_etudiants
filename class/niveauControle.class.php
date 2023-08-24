<?php

class niveauControle
{

  private $_db;

   public function __construct($db)
   {
       $this->_db=$db;
   }

   public function add(niveau $niveau)
   {
     $sql=$this->_db->prepare("INSERT INTO niveau(id_niveau,niveau_etude) VALUES(:id_niveau,:niveau_etude)");
     $sql->execute(array(
      "id_niveau"=>$niveau->id_niveau,
      "niveau_etude"=>$niveau->niveau_etude,
    ));
   }

   public function get($niveau)
   {
     $sql=$this->_db->prepare("SELECT * FROM niveau WHERE id_niveau=?");
     $sql->execute(array($id_niveau));
     $row=$sql->fetch();
     $sql->closeCursor();
     $niv=new niveau($row);
     return $niv;
   }

   public function delete($id_niveau)
   {
       $sql=$this->_db->prepare("DELETE FROM niveau WHERE id_niveau=?");
       $sql->execute(array($id_niveau));
   }
   
   public function liste()
   {
     $serv=[];
     $sql=$this->_db->query("SELECT * FROM niveau");
     $rows=$sql->fetchAll();
     $sql->closeCursor();
     
     foreach ($rows as $row) {
     $niv[]=new niveau($row);
     }
     return $niv;
   }

 public function edit(niveau $niveau)
   {
     try{ 
            $sql=$this->_db->prepare("UPDATE niveau SET id_niveau=:id_niveau, niveau_etude=:niveau_etude WHERE id_niveau=:id_niveau");
            $sql->execute(array(
            "id_niveau"=>$niveau->id_niveau,
            "niveau_etude"=>$niveau->niveau_etude));  

     } catch (Exception $ex) {
         echo $ex->getMessage();
     }
   }
}