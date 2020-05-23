<?php
class dht11{
 public $link='';
 function __construct($cm){
  $this->connect();
  $this->storeInDB($cm);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'project') or die('Cannot select the DB');
 }
 
 function storeInDB($cm){
  $query = "insert into bin set cm='".$cm."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['cm'] != ''){
 $dht11=new dht11($_GET['cm']);
}


?>