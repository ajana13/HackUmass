<?php include('res-id.php'); ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HACK UMASS VI</title>
        <link rel="stylesheet" href="res-info.css">
    </head>
    
    <body>
        <a href=""><div class="button" style="text-decoration: underline">Join Our Community</div></a>
        <br>
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
        
        <form method="post">
        <div>
            <h2><?php echo $row['Name']; ?> </h2>
            <img src="<?php echo $row['img_link']; ?>"/>
            <div class="button" style="margin-right: 32%; margin-top: 10px;">
                    <?php echo "<td><a href=\"res-connect.php?ID=" . $id . "\">Connect!</a></td>"; ?>

            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
        <div class="texter">
            <p style="float: left"> Location: <?php echo $row['Location']; ?></p>
            <p style="float: right; margin-right: 30px"> Rating: <?php echo $row['Ratings']; ?></p>
        </div>
            <br>
            <br>
        <div class="texter">
            <p> Description: "<?php echo $row['Description']; ?>" </p>
            <br>
        </div>
        </div>
        </form>
        <div class="texter">
            <table>
                <tr><p style="font-size: 30px;">Reviews</p></tr>
                <?php
                    $query="SELECT * FROM res WHERE event_id='$id' AND comment IS NOT NULL";
                    $sql=mysqli_query($db,$query);
                while($res=mysqli_fetch_assoc($sql))
                {
                    $user_id = $res['user_id'];
                    $q="SELECT * FROM user WHERE id='$user_id'";
                    $s=mysqli_query($db,$q);
                    while($r=mysqli_fetch_assoc($s)){
                    ?>
                    <tr><p><?php echo $r['username']; ?>:<?php echo $res['comment']; ?></p></tr>
                <?php
                    }
                }
                ?>
            </table>
        <form  method="post">
        <input type="text" name="comment">
        <input type="submit" value="Submit" name="Submit">
        </form>
                    </div>

        <?php 
            if(isset($_POST['Submit'])){
                $comment = e($_POST['comment']);
                $user_id = $_SESSION['user']['id'];
                $query= "INSERT INTO res (comment, event_id, user_id) VALUES('$comment','$id','$user_id')";
                mysqli_query($db,$query);
                ?>
                <script>
                    location.href = location.href;
                </script>
        <?php
            }
        ?>
    </body>
</html>