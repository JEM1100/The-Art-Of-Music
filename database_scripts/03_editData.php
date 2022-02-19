<?php
session_start();
include_once "01_database_connection.php"; 

$hiddenID=$_POST["hiddenID"];

//////////////////////////////////////////////////////Delete Entry//////////////////////////////////////////////////////////////////////

if (isset($_POST["deleteEntry"])){
       
        try{
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connection->beginTransaction();

                // delete all compatible song entries with foreign key constraints
                $sql1="DELETE FROM mix_songs WHERE songs_chords_id=? OR compatible_id=?";
                $statement1=$connection->prepare($sql1);
                $statement1->execute(array($hiddenID,$hiddenID));
        
                //delete the song in main table
                $sql2="DELETE FROM songs_chords WHERE id=?"; 
                $statement2=$connection->prepare($sql2);
                $statement2->execute(array($hiddenID));

                $connection->commit();
                $_SESSION['delete_success'] = True;
                header("Location: ../index.php?delete=success");

        }

        catch (Exception $e){
                $connection->rollback();
                echo "Failed: " . $e->getMessage();
              }
       
}


////////////////////////////////////////////////////Save Changes/////////////////////////////////////////////////////////////////////

if (isset($_POST["saveChanges"])){

        if (!empty($_POST["editName"])){ 
                $name=$_POST["editName"];
        } else {
                $name=NULL; 
             
        }
        
        if (!empty($_POST["editKey"])){ 
                $SongKey=$_POST["editKey"];
        } else {
                $SongKey=NULL; 
             
        }
        
        if (!empty($_POST["editBPM"])){ 
                $BPM=$_POST["editBPM"];
        } else {
                $BPM=NULL; 
                
        }
        
        if (!empty($_POST["editI"])){ 
                $I=$_POST["editI"];
        } else {
                $I=NULL; 
             
        }
        
        if (!empty($_POST["editII"])){ 
                $II=$_POST["editII"];
        } else {
                $II=NULL; 
        }
        
        if (!empty($_POST["editIII"])){ 
                $III=$_POST["editIII"];
        } else {
                $III=NULL; 
        }
        
        if (!empty($_POST["editIV"])){ 
                $IV=$_POST["editIV"];
        } else {
                $IV=NULL; 
        }
        
        if (!empty($_POST["editV"])){ 
                $V=$_POST["editV"];
        } else {
                $V=NULL; 
        }
        
        if (!empty($_POST["editVI"])){ 
                $VI=$_POST["editVI"];
        } else {
                $VI=NULL; 
        }
        
        if (!empty($_POST["editVII"])){ 
                $VII=$_POST["editVII"];
        } else {
                $VII=NULL; 
        }
        
        if (!empty($_POST["editVIII"])){ 
                $VIII=$_POST["editVIII"];
        } else {
                $VIII=NULL; 
        }
        
         
        $sql="UPDATE songs_chords 
            SET name=?,
            BPM=?, 
            Song_Key=?,
            I=?,
            II=?,
            III=?,
            IV=?,
            V=?,
            VI=?,
            VII=?,
            VIII=?
        WHERE id=?";
        
        $statement=$connection->prepare($sql);
        $statement->execute(array($name,$BPM,$SongKey,$I,$II,$III,$IV,$V,$VI,$VII,$VIII,$hiddenID));
        $_SESSION['update_success'] = True;
        header("Location: ../index.php?update=success");

                              
}      
?>
