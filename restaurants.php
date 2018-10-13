<?php include('connect.php'); ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HACK UMASS VI</title>
        <link rel="stylesheet" href="restaurants.css">
    </head>
    
    <body>
        <a href=""><div class="button" style="text-decoration: underline">Join Our Community</div></a>
        <br>
        <div class="header">
        <h1>ASA</h1>
        </div>
        
        <div class="sections">
            <ul>
                <a href=""><li class="sidemenu" style="background-color: green">Restaurants</li></a>
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
        
        <div class="floaters">
        <?php
            $query="SELECT * FROM restuarants_bars";
            $sql=mysqli_query($db,$query);
            while($res=mysqli_fetch_assoc($sql)){
                ?>
                <div class="innerfloaters"><h2><a href=""><?php echo $res["Name"]; ?></a></h2>
                <br>
                    
                        <img src="<?php echo $res["img_link"]; ?>" class="icon">
                    <div style="float:left; margin-left:20px;">
                        Operating hours: <?php echo $res["Hours"]; ?>
                        <br>
                        <br>
                        Location: <?php echo $res["Location"]; ?>
                    </div>
                        <p style="float: right; margin-right: 25px;">Rating:        <?php echo $res["Ratings"]; ?>/10</p>
                </div>
            <?php
            }
            ?>
        </div>
    </body>
</html>