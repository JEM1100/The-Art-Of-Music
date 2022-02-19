<?php  
///////////////////////////////////////////////Add Compatible Songs Entry//////////////////////////////////////////////////////////////////////
include_once "01_database_connection.php"; 

if (isset($_GET['c'])){

    $compatibleSongName=$_GET['c'];
    $selectedSongID=$_GET['v'];

    // Select id of compatible song in songs chords table
    $sql1="SELECT id FROM songs_chords WHERE name=? LIMIT 1"; 
    $statement1=$connection->prepare($sql1);
    $statement1->execute(array($compatibleSongName));
    $result1=$statement1->fetch();
    $compatibleSongID=$result1["id"];


    //Insert compatible song into compatible songs table
    $sql2="INSERT INTO mix_songs(name,songs_chords_id,compatible_id)  
    VALUES (?,?,?);"; 
    $statement2=$connection->prepare($sql2);
    $statement2->execute(array($compatibleSongName,$compatibleSongID,$selectedSongID));   

     // Select name of selected song in songs chords table
    $sql3="SELECT name FROM songs_chords WHERE id=?"; 
    $statement3=$connection->prepare($sql3);
    $statement3->execute(array($selectedSongID));
    $result3=$statement3->fetch();
    $selectedSongName=$result3["name"]; 
    
    //Insert selected song into compatible songs table
    $sql4="INSERT INTO mix_songs(name,songs_chords_id,compatible_id)  
    VALUES (?,?,?);"; 
    $statement4=$connection->prepare($sql4);
    $statement4->execute(array($selectedSongName,$selectedSongID,$compatibleSongID));
}
?>