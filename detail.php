<?php
if (isset($_POST['id'])){
    $query = "SELECT * from user where id='".$_POST['id']."'"; 
    $result = mysqli_query($db, $query) or die ( mysqli_error());
    
    while($row = mysqli_fetch_assoc($result)){
        
    }
