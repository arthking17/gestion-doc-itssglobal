<?php

$connect = new PDO("mysql:host=localhost;dbname=itss_global", "root", "");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
 $data = array(
  ':nom'   => "%" . $_GET['nom'] . "%",
  ':lecture'   => "%" . $_GET['lecture'] . "%",
  ':ecriture'     => "%" . $_GET['ecriture'] . "%",
  ':suppression'    => "%" . $_GET['suppression'] . "%"
 );
 $query = "SELECT * FROM acces a inner join dossier d on a.id_dossier = d.id WHERE nom LIKE :nom AND lecture LIKE :lecture AND ecriture LIKE :ecriture AND suppression LIKE :suppression ORDER BY dateajout DESC";

 $statement = $connect->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'id_acces'    => $row['id_acces'],   
   'nom'  => $row['nom'],
   'lecture'   => $row['lecture'],
   'ecriture'    => $row['ecriture'],
   'suppression'   => $row['suppression'],
  );
 }
 header("Content-Type: application/json");
 echo json_encode($output);
}
/*
if($method == "POST")
{
 $data = array(
  ':first_name'  => $_POST['first_name'],
  ':last_name'  => $_POST["last_name"],
  ':age'    => $_POST["age"],
  ':gender'   => $_POST["gender"]
 );

 $query = "INSERT INTO sample_data (first_name, last_name, age, gender) VALUES (:first_name, :last_name, :age, :gender)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
 $data = array(
  ':id'   => $_PUT['id'],
  ':first_name' => $_PUT['first_name'],
  ':last_name' => $_PUT['last_name'],
  ':age'   => $_PUT['age'],
  ':gender'  => $_PUT['gender']
 );
 $query = "
 UPDATE sample_data 
 SET first_name = :first_name, 
 last_name = :last_name, 
 age = :age, 
 gender = :gender 
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM sample_data WHERE id = '".$_DELETE["id"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}
*/
?>
