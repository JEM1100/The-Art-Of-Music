<?php 
include_once "01_database_connection.php";
 
$deleteID=$_GET['compatible_song_id'];
$sql="DELETE FROM mix_songs WHERE mix_id=?"; 

$statement=$connection->prepare($sql);
$statement->execute(array($deleteID));


$OriginalID=$_GET['main_table_song_id'];
$sql2="DELETE FROM mix_songs WHERE 
(songs_chords_id=? AND mix_id=(?-1))
OR (songs_chords_id=? AND mix_id=(?+1))"; 

$statement2=$connection->prepare($sql2);
$statement2->execute(array($OriginalID,$deleteID,$OriginalID,$deleteID));

?>