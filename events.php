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
        <a href=""><div class="button" style="text-decoration: underline">Join Our Community</div></a>
        <br>
        
        <div class="sections">
            <ul>
                <a href="restaurants.php"><li class="sidemenu">Restaurants</li></a>
                <a href="attractions.php"><li class="sidemenu">Attractions</li></a>
                <li class="sidemenu" style="background-color: #453F78; color: white">Events</li>
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
            $query="SELECT * FROM events";
            $sql=mysqli_query($db,$query);
            while($res=mysqli_fetch_assoc($sql)){
                ?>
                            <div class="innerfloaters">
                    <h2 align = "center">

                                <?php $name = $res['Name']; ?>
                    <?php echo "<td><a href=\"events-info.php?ID=" . $res['ID'] . "\">$name</a></td>"; ?>
                                </h2>
                <br>
                    
                <img src="<?php echo $res["img_link"]; ?>" class="icon">

                    
                    <div style="float:left; margin-left:20px;">
                        Event timings: <?php echo $res["Hours"]; ?>
                        <br>
                        <br>
                        Location: <?php echo $res["Location"]; ?>
                    </div>
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