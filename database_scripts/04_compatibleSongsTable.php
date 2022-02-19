<!DOCTYPE html>
<html>



<?php     
include_once "01_database_connection.php";                            
$wantedID= $_GET['v'];

$statement = $connection->prepare("SELECT * FROM mix_songs WHERE compatible_id = ?");
$statement->execute(array($wantedID));  
if ($statement->rowCount()>0){
    echo "<div id= 'AJAXContent'>";  
    echo    "<table id='compatibleSongsTable'>";
    echo        "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>BPM</th>
                <th>Key</th>
            </tr>";
            while($row = $statement->fetch()) {
                $sub_statement = $connection->prepare("SELECT id, name, BPM, Song_Key FROM songs_chords WHERE id = ?");
                $sub_statement->execute(array($row["songs_chords_id"])); 
                $result= $sub_statement->fetch();
                $deleteID=$row["mix_id"];
                echo "<tr>";
                    echo "<td>" . $result["id"]. "</td>";
                    echo "<td>" . $result["name"]. "</td>";
                    echo "<td>" . $result["BPM"]. "</td>";
                    echo "<td>" . $result["Song_Key"]. "</td>";
                    echo "<td class=\"td_icon\">
                            <button id=\"icon2\" onclick=\"deleteCompatibleSong($deleteID, $wantedID)\"><i class=\"fa fa-minus-circle\" aria-hidden=\"true\"></i></button>
                         </td>";
                echo "</tr>"; 
            }
    echo    "<table>";
    echo "</div>";
}
else {
    echo "<div id= 'AJAXContent'>"; 
    echo "</div>";
}
?>

</html>