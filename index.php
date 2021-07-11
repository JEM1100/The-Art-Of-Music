<!-------------------------------------------DATABASE CONNECTION--------------------------------------------------------->

<?php    
session_start();                      
include_once "database_scripts/01_database_connection.php";    
?>

<!------------------------------------------------HEADER---------------------------------------------------------->
<!DOCTYPE html>
<html>
<head>     
  <title>The Art of Music</title> 

  <!-- css-->
  <link rel="stylesheet" href="css/styles.css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
  <!--  jquery cdn -->
  <script                            
      src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous">
  </script> 

  <!-- jquery dataTables css --> 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">  <!-- jquery dataTables css -->
  
  <!--  jquery data tables cdn   -->  
  <script 
    type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
  </script> 
  
  
</head>
<!------------------------------------------------BODY---------------------------------------------------------->
<body background="img/background1.jpg">
<h1 class="heading1">The Art of Music</h1>

<!--------------------------------------CHORD SEARCH DROPDOWN MENU---------------------------------------------------------->

<form action="index.php" method="POST">
  <label>Look for a chord</label>
  <select name="chords" id="chords">
  <?php
         $sql="SELECT DISTINCT I,II,III,IV,V,VI,VII,VIII FROM songs_chords;";      
         $result=mysqli_query($connection,$sql);      
         $resultCheck=mysqli_num_rows($result);  
         $testarray=array();  
         if ($resultCheck > 0) {
             while($row=mysqli_fetch_assoc($result)){
               foreach($row as $column){
                if (!in_array ( $column, $testarray)){
                  $testarray[]=$column;
                } 
               } 
             }  
           }
 
        sort($testarray);
        foreach($testarray as $item){
            echo "<option>$item</option>";
        }
  ?>
  </select>
  <button type="submit" name="submit">Search</button>
</form>
<p></p>

<!-----------------------------------------------MAIN TABLE---------------------------------------------------------->
<form id="addEntryForm" action="database_scripts/02_insertData.php" method="POST">
<table id="table1" class="display">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>BPM</th>
      <th>Key</th>
      <th>I</th>
      <th>II</th>
      <th>III</th>
      <th>IV</th>
      <th>V</th>
      <th>VI</th>
      <th>VII</th>
      <th>VIII</th>
      <th></th>
    </tr>
  </thead>
  <tbody id="editor">       <!--  //make table body editable -->

    <?php

        if(!empty($_POST["chords"]))
        {
          $valueToSearch = $_POST['chords'];
          $sql = "SELECT * FROM `songs_chords` WHERE I='$valueToSearch' OR II='$valueToSearch' OR III='$valueToSearch' OR IV='$valueToSearch' OR V='$valueToSearch' OR VI='$valueToSearch' OR VII='$valueToSearch' OR VIII='$valueToSearch'";
          
        }
        else {
          $sql = "SELECT * FROM songs_chords;";
          $valueToSearch = "Bad Motherfucker";
        
        }

        


        $result=mysqli_query($connection,$sql);      //calling sql command
        $resultCheck=mysqli_num_rows($result);    //checking whether the command returns a result
        if ($resultCheck > 0) {
            while($row=mysqli_fetch_assoc($result)){      //while loop necessary to display all results
              echo "<tr>";
                echo "<td>" . $row["id"]. "</td>";
                echo "<td>" . $row["name"]. "</td>";
                echo "<td>" . $row["BPM"]. "</td>";
                echo "<td>" . $row["Song_Key"]. "</td>";
                if ($row["I"]== $valueToSearch){
                  echo "<td style='background-color: #00FF00;'>".$row["I"]."</td>"; 
                } 
                else{
                  echo  "<td>" . $row["I"]. "</td>";
                }
                if ($row["II"]== $valueToSearch){
                  echo "<td style='background-color: #00FF00;'>".$row["II"]."</td>"; 
                } 
                else{
                  echo  "<td>" . $row["II"]. "</td>";
                }
                if ($row["III"]== $valueToSearch){
                  echo "<td style='background-color: #00FF00;'>".$row["III"]."</td>"; 
                } 
                else{
                  echo  "<td>" . $row["III"]. "</td>";
                }
                if ($row["IV"]== $valueToSearch){
                  echo "<td style='background-color: #00FF00;'>".$row["IV"]."</td>"; 
                } 
                else{
                  echo  "<td>" . $row["IV"]. "</td>";
                }
                if ($row["V"]== $valueToSearch){
                  echo "<td style='background-color: #00FF00;'>".$row["V"]."</td>"; 
                } 
                else{
                  echo  "<td>" . $row["V"]. "</td>";
                }
                if ($row["VI"]== $valueToSearch){
                  echo "<td style='background-color: #00FF00;'>".$row["VI"]."</td>"; 
                } 
                else{
                  echo  "<td>" . $row["VI"]. "</td>";
                }
                if ($row["VII"]== $valueToSearch){
                  echo "<td style='background-color: #00FF00;'>".$row["VII"]."</td>"; 
                } 
                else{
                  echo  "<td>" . $row["VII"]. "</td>";
                }
                if ($row["VIII"]== $valueToSearch){
                  echo "<td style='background-color: #00FF00;'>".$row["VIII"]."</td>"; 
                } 
                else{
                  echo  "<td>" . $row["VIII"]. "</td>";
                }
                echo "<td class=\"td_icon\">
                        <i id=\"icon1\"class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                      </td>";
              echo "</tr>";  

            }
        }
    ?>

    
  </tbody>

  <!----------------------- Table Footer for adding database records------------------------- -->
  <tfoot>
    <tr>
    
        <td><button id="addData" type="submit" name="addData">Add</button></td> 
        <td><input type="text" id="fucker" name="name" placeholder="Name"></td>
        <td><input type="number" name="BPM" placeholder="BPM"></td>
        <td><input type="text" name="Song_Key" placeholder="Key"></td>
        <td><input type="text" name="I" placeholder="I"></td>
        <td><input type="text" name="II" placeholder="II"></td> 
        <td><input type="text" name="III" placeholder="III"></td>
        <td><input type="text" name="IV" placeholder="IV"></td>
        <td><input type="text" name="V" placeholder="V"></td>
        <td><input type="text" name="VI" placeholder="VI"></td>
        <td><input type="text" name="VII" placeholder="VII"></td>
        <td><input type="text" name="VIII" placeholder="VIII"></td>
        
  

    </tr>
  </tfoot>
</table>
</form>

<!-- ---------------------------Modal Window for editing and deleting database records ------------------------------------------------------->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form id="editForm" action="database_scripts/03_editData.php" method="POST">
      <table class="editTable">
        <tbody>
          <tr>
            <th>Name</th>
            <th>BPM</th>
            <th>Key</th>
            <th>I</th>
            <th>II</th>
            <th>III</th>
            <th>IV</th>
            <th>V</th>
            <th>VI</th>
            <th>VII</th>
            <th>VIII</th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td><input class="editInput" type="text" name="editName" id="editName"></td>
            <td><input class="editInput" type="number" name="editBPM" id="editBPM"></td>
            <td><input class="editInput" type="text" name="editKey" id="editKey"></td>
            <td><input class="editInput"  type="text" name="editI" id="editI"></td>
            <td><input class="editInput" type="text" name="editII" id="editII"></td>
            <td><input class="editInput" type="text" name="editIII" id="editIII"></td>
            <td><input class="editInput" type="text" name="editIV" id="editIV"></td>
            <td><input class="editInput" type="text" name="editV" id="editV"></td>
            <td><input class="editInput" type="text" name="editVI" id="editVI"></td>
            <td><input class="editInput" type="text" name="editVII" id="editVII"></td>
            <td><input class="editInput" type="text" name="editVIII" id="editVIII"></td>
            <td><button id="saveChanges" class="iconEdit" type="submit" name="saveChanges"><i class="fa fa-floppy-o" aria-hidden="true"></i></button></td>
            <td><button id="deleteEntry" class="iconEdit" type="submit" name="deleteEntry"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
          </tr>
          <tr>
            <td><input type="hidden" id="hiddenID" name="hiddenID" readonly></td>
          </tr>
        </tbody>
      </table>
      </form>
  </div>

</div>

<!---Snackbar which displays confirmation messages after adding, updating or deleting database records----------------------------------------------------- -->
<div id="snackbar"></div>


<!------------------------------------------ JavaScript------------------------------------------------------->
     
<script>

//calling jquery ready function to initialise  jquery table///////////
  $(document).ready(function(){  
    $('#table1').DataTable();  
  });  

///////////////// display edit/delete Modal when clicked on edit icon/////////////////////////////// 
var table=$('#table1').DataTable(); 
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];

 $('#table1').on( 'click', ".td_icon", function () {
    var row_array=table.row(this).data();
    modal.style.display = "block";
    document.getElementById("hiddenID").value = row_array[0];
    document.getElementById("editName").value = row_array[1];
    document.getElementById("editBPM").value = row_array[2];
    document.getElementById("editKey").value = row_array[3];
    document.getElementById("editI").value = row_array[4];
    document.getElementById("editII").value = row_array[5];
    document.getElementById("editIII").value = row_array[6];
    document.getElementById("editIV").value = row_array[7];
    document.getElementById("editV").value = row_array[8];
    document.getElementById("editVI").value = row_array[9];
    document.getElementById("editVII").value = row_array[10];
    document.getElementById("editVIII").value = row_array[11];


} );

span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

////////////////SnackBar Function/////////////////////////////

function SnackbarMessage(sessionVariable) {
  if (sessionVariable=="add"){
    var x = document.getElementById("snackbar");
    x.innerHTML="Entry added succesfully"
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
  if (sessionVariable=="delete"){
    var x = document.getElementById("snackbar");
    x.innerHTML="Entry deleted succesfully"
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
  if (sessionVariable=="update"){
    var x = document.getElementById("snackbar");
    x.innerHTML="Entry updated succesfully"
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
 
}

////////////////////////////addEntry//////////////////////////////////////////////////////////
$('#addData').on( 'click', function (event) {
  if (confirm('Add this Entry?')) {
    document.forms["addEntryForm"].submit();
  
} else {
  event.preventDefault();
}
} );



////////////////////////////editData//////////////////////////////////////////////////////////
$('#saveChanges').on( 'click', function (event) {
  if (confirm('Save your changes?')) {
    document.forms["editForm"].submit();
  
} else {
  event.preventDefault();
}
} );


$('#deleteEntry').on( 'click', function (event) {
  if (confirm('Are you sure you want to delete this entry?')) {
    document.forms["editForm"].submit();
  
} else {
  event.preventDefault();
}
} );
    
</script>






<!---------------------------------------- PHP script which checks for session variables--------------------------------------------------- -->
<?php        

if (isset($_SESSION['add_success'])) {
  echo "<script> SnackbarMessage('add'); </script>";
  unset($_SESSION['add_success']);
} 

if (isset($_SESSION['delete_success'])) {
  echo "<script> SnackbarMessage('delete'); </script>";
  unset($_SESSION['delete_success']);
}

if (isset($_SESSION['update_success'])) {
  echo "<script> SnackbarMessage('update'); </script>";
  unset($_SESSION['update_success']);
}

?>


<!-- ------------ ------------------------------------------------------------------------------------->
</body>

</html>