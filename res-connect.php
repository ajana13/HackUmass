<?php
    include('res-id.php');
    if(!isLoggedIn()){
        header('location:login.php');
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            Connect
        </title>
        <link rel="stylesheet" href="connect.css">

    </head>
    
    <body>
        <div class = "wrapper" style="padding-bottom: 50px">
        <a href=""><div class="button" style="text-decoration: underline">Join Our Community</div></a>
        <br>
        
        <div class="sections">
            <ul>
                <a href="restaurants.php"><li class="sidemenu">Restaurants</li></a>
                <a href="attractions.php"><li class="sidemenu">Attractions</li></a>
                <a href="events.php"><li class="sidemenu">Events</li></a>
                <a href=""><li class="sidemenu">Convenience Stores</li></a>
                <a href=""><li class="sidemenu">Hotels</li></a>
                <br>
                <a href=""><li class="sidemenu">Schools</li></a>
                <a href=""><li class="sidemenu">Hospitals</li></a>
                <a href=""><li class="sidemenu">Personal Care</li></a>
                <a href=""><li class="sidemenu">Leisure</li></a>
            </ul>
        </div>
        
            <div class="data">
            <?php
            $user_id = $_SESSION['user']['id']; 
            $search = "SELECT Name FROM restuarants_bars WHERE ID='$id'";
            $ssql = mysqli_query($db, $search);    
            while($sresult=mysqli_fetch_assoc($ssql)){
                ?>
                <div class="title">
                <?php
                echo $sresult['Name'];
                ?>
                </div>
                <?php
            }
                
            $query = "SELECT * FROM res WHERE user_id='$user_id' AND event_id='$id' AND comment IS NULL";
            $sql0 = mysqli_query($db, $query);
            if(mysqli_num_rows($sql0)==0){
                $insert = "INSERT INTO res (event_id, user_id) VALUES ('$id', '$user_id')";
                $sql = mysqli_query($db, $insert);
            }
        
            $query1 = "SELECT * FROM res WHERE event_id='$id' AND comment IS NULL";
            $sql1 = mysqli_query($db, $query1);
        
            while($result = mysqli_fetch_assoc($sql1)){
                $user_id = $result['user_id'];
                $query2 = "SELECT * FROM user WHERE id='$user_id'";
                $sql2 = mysqli_query($db, $query2);
                ?>
                <div class="temp">
                    <?php
                while($result1 = mysqli_fetch_assoc($sql2)){
                    
                if($result1['username']!=$_SESSION['user']['username']){
                    ?>
                    
                <div class="info-user">
                <?php
                        echo $result1['username'];
                    
                    ?>
                    <br>
                    <br>
                    <td><input type="button" name="Add" class="butt friend" value="<?php echo $result1["id"]; ?>"></td>
                </div>
                <br>
                <?php
                }
                }
                ?>
                    </div>
                <?php
            }
            ?>
            </div>
            
        <div class="push"></div>            
        </div>
        <div class="foot">
        Created With Love By:
        <br>
        Anushree Jana;
        Shreya Sawant;
        Akash Munjial
        </div>

    </body>
        
        

    
    <?php
    if(isset($_POST['Add'])){
        
    }
    ?>
        
    
</html>