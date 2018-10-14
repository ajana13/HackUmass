<?php include('functions.php'); ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HACK UMASS VI</title>
        <link rel="stylesheet" href="restaurants.css">
    </head>
    
    <body>
        <div class = "wrapper" style="padding-bottom: 50px">
        <a href=""><div class="button" style="text-decoration: underline">Login</div></a>
        <br>
        
        <div class="sections">
            <ul>
                <a href="restaurants.php"><li class="sidemenu">Restaurants</li></a>
                <li class="sidemenu" style="background-color: #453F78; color:white">Attractions</li>
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
            $query="SELECT * FROM attractions";
            $sql=mysqli_query($db,$query);
            while($res=mysqli_fetch_assoc($sql)){
                ?>
                            <div class="innerfloaters">
                    <h2 align = "center">

                    <?php $name = $res['Name']; ?>
                    <?php echo "<td><a href=\"att-info.php?ID=" . $res['ID'] . "\">$name</a></td>"; ?>
                                </h2>
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
</html>