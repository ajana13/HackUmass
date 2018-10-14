<?php
include('functions.php');

//stores the res_id to help in hiding and unhiding of exceptions

$id='';
if (isset($_GET['ID'])){
    $id = $_REQUEST['ID'];
}
$query = "SELECT * FROM attractions WHERE ID='".$id."'"; 
$result = mysqli_query($db, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>