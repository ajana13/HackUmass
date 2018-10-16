<?php
include('functions.php');

        if(isset($_POST['user_id'])){
            
                $query = "SELECT * from user where id='".$_POST['user_id']."'"; 
                $result = mysqli_query($db, $query) or die ( mysqli_error());

            
            $table = $_SESSION['user']['username'];
            $friend = "INSERT INTO $table (friend_id) VALUES ('$user_id')";
            $friendSql = mysqli_query($db,$friend);
            
            $user = "SELECT * FROM user WHERE id='$user_id'";
            $sqlCall = mysqli_query($db,$user);
            while($rest=mysqli_fetch_assoc($sqlCall)){
                $friend_user = $rest['username'];
                $user2 = "INSERT INTO '$friend_user' (friend_id) VALUES ('$id')";
                $userSql = mysqli_query($db,$user2);
            }
        }
        ?>


<?php

//data inside the "View Details" modal in exceptions and hidden exceptions page
if (isset($_POST['exp_id'])){
    $query = "SELECT * from excep where exp_id='".$_POST['exp_id']."'"; 
    $result = mysqli_query($db, $query) or die ( mysqli_error());

    
    $output = '';
      while($row = mysqli_fetch_array($result))  
      {  
          //start printing the data and exception details
           $output .= '  
                <tr>  
                     <td width="30%" class="info"><label>Exception ID: </label></td>  
                     <td width="70%">'.$row["exp_id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%" class="info"><label>Exception Type: </label></td>  
                     <td width="70%">'.$row["exp_type"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%" class="info"><label>Exceptions Date: </label></td>  
                     <td width="70%">'.$row["exp_date"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%" class="info"><label>Details: </label></td>  
                     <td width="70%">'.$row["exp_detail"].'</td>  
                </tr>
                ';  
      }  
      $output .='';  
      echo $output;  
 }  
 ?>
