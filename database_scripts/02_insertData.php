<?php
session_start();
include_once "01_database_connection.php"; 


if (!empty($_POST["name"])){ 
        $name=$_POST["name"];
} else {
        $name=NULL; 
     
}

if (!empty($_POST["Song_Key"])){ 
        $SongKey=$_POST["Song_Key"];
} else {
        $SongKey=NULL; 
     
}

if (!empty($_POST["BPM"])){ 
        $BPM=$_POST["BPM"];
} else {
        $BPM=NULL; 
        
}

if (!empty($_POST["I"])){ 
        $I=$_POST["I"];
} else {
        $I=NULL; 
     
}

if (!empty($_POST["II"])){ 
        $II=$_POST["II"];
} else {
        $II=NULL; 
}

if (!empty($_POST["III"])){ 
        $III=$_POST["III"];
} else {
        $III=NULL; 
}

if (!empty($_POST["IV"])){ 
        $IV=$_POST["IV"];
} else {
        $IV=NULL; 
}

if (!empty($_POST["V"])){ 
        $V=$_POST["V"];
} else {
        $V=NULL; 
}

if (!empty($_POST["VI"])){ 
        $VI=$_POST["VI"];
} else {
        $VI=NULL; 
}

if (!empty($_POST["VII"])){ 
        $VII=$_POST["VII"];
} else {
        $VII=NULL; 
}

if (!empty($_POST["VIII"])){ 
        $VIII=$_POST["VIII"];
} else {
        $VIII=NULL; 
}
     
$sql="INSERT INTO songs_chords(name,BPM,Song_Key,I,II,III,IV,V,VI,VII,VIII)  
VALUES (?,?,?,?,?,?,?,?,?,?,?);"; 

$statement=$connection->prepare($sql);
$statement->execute(array($name,$BPM,$SongKey,$I,$II,$III,$IV,$V,$VI,$VII,$VIII));    
$_SESSION['add_success'] = True;
header("Location: ../index.php?insert=success");
?>
