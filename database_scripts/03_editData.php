<?php
include_once "01_database_connection.php"; 


$hiddenID=$_POST["hiddenID"];

//////////////////////////////////////////////////////Delete Entry//////////////////////////////////////////////////////////////////////

if (isset($_POST["deleteEntry"])){
        $sql="DELETE FROM songs_chords WHERE id=?"; 

        $statement=mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($statement,$sql)){
                echo "SQL error";
        }else {
                mysqli_stmt_bind_param($statement,"s", $hiddenID);
                mysqli_stmt_execute($statement);
                header("Location: ../index.php?delete=success");
        }


}

////////////////////////////////////////////////////Save Changes/////////////////////////////////////////////////////////////////////

if (isset($_POST["saveChanges"])){

        if (!empty($_POST["editName"])){ 
                $name=mysqli_real_escape_string($connection,$_POST["editName"]);
        } else {
                $name=NULL; 
             
        }
        
        if (!empty($_POST["editKey"])){ 
                $SongKey=mysqli_real_escape_string($connection,$_POST["editKey"]);
        } else {
                $SongKey=NULL; 
             
        }
        
        if (!empty($_POST["editBPM"])){ 
                $BPM=mysqli_real_escape_string($connection,$_POST["editBPM"]);
        } else {
                $BPM=NULL; 
                
        }
        
        if (!empty($_POST["editI"])){ 
                $I=mysqli_real_escape_string($connection,$_POST["editI"]);
        } else {
                $I=NULL; 
             
        }
        
        if (!empty($_POST["editII"])){ 
                $II=mysqli_real_escape_string($connection,$_POST["editII"]);
        } else {
                $II=NULL; 
        }
        
        if (!empty($_POST["editIII"])){ 
                $III=mysqli_real_escape_string($connection,$_POST["editIII"]);
        } else {
                $III=NULL; 
        }
        
        if (!empty($_POST["editIV"])){ 
                $IV=mysqli_real_escape_string($connection,$_POST["editIV"]);
        } else {
                $IV=NULL; 
        }
        
        if (!empty($_POST["editV"])){ 
                $V=mysqli_real_escape_string($connection,$_POST["editV"]);
        } else {
                $V=NULL; 
        }
        
        if (!empty($_POST["editVI"])){ 
                $VI=mysqli_real_escape_string($connection,$_POST["editVI"]);
        } else {
                $VI=NULL; 
        }
        
        if (!empty($_POST["editVII"])){ 
                $VII=mysqli_real_escape_string($connection,$_POST["editVII"]);
        } else {
                $VII=NULL; 
        }
        
        if (!empty($_POST["editVIII"])){ 
                $VIII=mysqli_real_escape_string($connection,$_POST["editVIII"]);
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
        
        $statement=mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($statement,$sql)){
                echo "SQL error";
        }else {
                mysqli_stmt_bind_param($statement,"ssssssssssss", $name,$BPM,$SongKey,$I,$II,$III,$IV,$V,$VI,$VII,$VIII,$hiddenID);
                mysqli_stmt_execute($statement);

                header("Location: ../index.php?update=success");
        }
                              
}
       
?>
