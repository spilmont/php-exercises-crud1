
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 14/01/2019
 * Time: 10:10
 */


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colyseum";


$conn = new mysqli($servername,$username,$password);

if ($conn->connect_error){
die("connection failed: ".$conn->connect_error);
}else{
    $conn->select_db($dbname);

}

function afficherClients(){
    echo "<h1>exo 1:</h1>";

    global $conn;

    $sql = "select * from clients ";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        echo "<span id='exo1'>".$row['id']." ".$row['lastName']." ".$row['firstName']."</span><br>";
    }
echo "<hr>";
}
afficherClients();

function afficheSpectacle(){

    echo "<h1>exo 2:</h1>";

    global $conn;

    $sql = "select * from showtypes ";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        echo $row['type']."<br>";
    }
    echo "<hr>";
}
afficheSpectacle();

function afficherClients20(){
    echo "<h1>exo 3:</h1>";

    global $conn;

    $sql = "select * from clients order by id asc limit 20  ";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        echo $row['id'].".".$row['lastName']." ".$row['firstName']."<br>";
    }
    echo "<hr>";
}
afficherClients20();

function cartedefidelité(){

        echo "<h1>exo 4:</h1>";

        global $conn;



            $sql = "SELECT * FROM clients,cards WHERE cards.cardTypesId =1 and cards.cardNumber = clients.cardNumber  ";




        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            echo $row['lastName']." ".$row['firstName']."<br>";
        }
        echo "<hr>";
    }

cartedefidelité();

function nomM(){
    echo "<h1>exo 5:</h1>";

    global $conn;

    $sql = "select * from clients where lastName like 'M%' order by lastName ";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        echo "Nom : ".$row['lastName']."<br>"."Prenom : ".$row['firstName']."<br>";
    }
    echo "<hr>";
}

nomM();

function artiste(){
    echo "<h1>exo 6:</h1>";

    global $conn;

    $sql = "select * from shows order by title ";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        echo $row['title']." par ". $row['performer'].", le ".$row['date']." à ".$row['startTime'].".<br>";
    }
    echo "<hr>";
}
artiste();

function ana(){

    echo "<h1>exo 7:</h1>";

    global $conn;



    $sql = "SELECT  *  FROM clients left join cards on (cards.cardNumber = clients.cardNumber)  ";


    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){


        if($row["cardTypesId"]==1){
            $kk = "oui";
            $pp = " numero de carte : ".$row['cardNumber'];
        }
        else{
            $kk = "non";
            $pp ="";
        }


        echo "Nom : ".$row['lastName']."<br>"."Prenom : ".$row['firstName']."<br>"."date de naissance : ".$row['birthDate'].
            "<br>"."carte de fidelité: ".$kk.$pp."<br><br>";
    }
    echo "<hr>";

}

ana();



?>
</body>
</html>