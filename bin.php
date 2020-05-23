<?php
class dht11{
 public $link='';
 function __construct($status){
  $this->connect();
  $this->storeInDB($status);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'project') or die('Cannot select the DB');
 }
 
 function storeInDB($status){
  $query = "insert into bin set status='".$status."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['status'] != ''){
 $dht11=new dht11($_GET['status']);
}


?>