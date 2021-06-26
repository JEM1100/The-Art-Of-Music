<?php
include_once "01_database_connection.php"; 



if (!empty($_POST["name"])){ 
        $name=mysqli_real_escape_string($connection,$_POST["name"]);
} else {
        $name=NULL; 
     
}

if (!empty($_POST["Song_Key"])){ 
        $SongKey=mysqli_real_escape_string($connection,$_POST["Song_Key"]);
} else {
        $SongKey=NULL; 
     
}

if (!empty($_POST["BPM"])){ 
        $BPM=mysqli_real_escape_string($connection,$_POST["BPM"]);
} else {
        $BPM=NULL; 
        
}

if (!empty($_POST["I"])){ 
        $I=mysqli_real_escape_string($connection,$_POST["I"]);
} else {
        $I=NULL; 
     
}

if (!empty($_POST["II"])){ 
        $II=mysqli_real_escape_string($connection,$_POST["II"]);
} else {
        $II=NULL; 
}

if (!empty($_POST["III"])){ 
        $III=mysqli_real_escape_string($connection,$_POST["III"]);
} else {
        $III=NULL; 
}

if (!empty($_POST["IV"])){ 
        $IV=mysqli_real_escape_string($connection,$_POST["IV"]);
} else {
        $IV=NULL; 
}

if (!empty($_POST["V"])){ 
        $V=mysqli_real_escape_string($connection,$_POST["V"]);
} else {
        $V=NULL; 
}

if (!empty($_POST["VI"])){ 
        $VI=mysqli_real_escape_string($connection,$_POST["VI"]);
} else {
        $VI=NULL; 
}

if (!empty($_POST["VII"])){ 
        $VII=mysqli_real_escape_string($connection,$_POST["VII"]);
} else {
        $VII=NULL; 
}

if (!empty($_POST["VIII"])){ 
        $VIII=mysqli_real_escape_string($connection,$_POST["VIII"]);
} else {
        $VIII=NULL; 
}


        
$sql="INSERT INTO songs_chords(name,BPM,Song_Key,I,II,III,IV,V,VI,VII,VIII)  
VALUES (?,?,?,?,?,?,?,?,?,?,?);"; 

$statement=mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($statement,$sql)){
        echo "SQL error";
}else {
        mysqli_stmt_bind_param($statement,"sssssssssss", $name,$BPM,$SongKey,$I,$II,$III,$IV,$V,$VI,$VII,$VIII);
        mysqli_stmt_execute($statement);
}

header("Location: ../index.php?insert=success");
        
     
        
      
        
?>