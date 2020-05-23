<?php
class dht11{
 public $link='';
 function __construct($latitude,$longitude,$located_in){
  $this->connect();
  $this->storeInDB($latitude,$longitude,$located_in);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'project') or die('Cannot select the DB');
 }
 
 function storeInDB($latitude,$longitude,$located_in){
  $query = "insert into location set latitude='".$latitude."' and longitude='".$longitude."' and located_in='".$located_in."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['status','longitude','located_in'] != ''){
 $dht11=new dht11($_GET['status']);
}


?>