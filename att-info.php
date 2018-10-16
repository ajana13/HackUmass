<?php include('att-id.php'); ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HACK UMASS VI</title>
        <link rel="stylesheet" href="res-info.css">
                <link rel="stylesheet" type="text/css" href="style-detail.css">  
        <link rel="stylesheet" type="text/css" href="modal.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <?php  if (isset($_SESSION['user'])) { ?>
                <div class="header">
                    <a href="home.php"><img src="let's%20see.png" style="max-width:200px;
    max-height:70px;
    float: left;
    margin-left: 20px;
    margin-top: 5px;"></a>
                    <p class="login">
                        Welcome <strong><?php echo $_SESSION['user']['first']; ?> <?php echo $_SESSION['user']['last']; ?></strong>
                    </p>
                    
                </div>            
            <?php
                                                 }
            else{
                ?>
                <div class="header">
                    <a href="home.php"><img src="let's%20see.png" style="max-width:200px;
    max-height:70px;
    float: left;
    margin-left: 20px;
    margin-top: 5px;"></a>
                    <button type="submit" class="button view_data">Login</button>
                </div>
            <?php
            }
            ?>
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
                    <?php echo "<td><a href=\"att-connect.php?ID=" . $id . "\">Connect!</a></td>"; ?>

            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
        <div class="texter">
            <p style="float: left"> Location: <?php echo $row['Location']; ?></p>
            <p style="float: left"> Hours: <?php echo $row['Hours']; ?></p>
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
                    $query="SELECT * FROM att WHERE event_id='$id' AND comment IS NOT NULL";
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
        <div class="foot">
        Created With Love By:&nbsp;
        Anushree Jana;
        Shreya Sawant;
        Akash Munjial<br>
                <a href="about.php"><div style="float: left;margin-left: 600px;"><strong>About</strong></div></a>
                <a href=""><div style="float: left; margin-left: 50px;"><strong>Contact</strong></div></a>
                <a href="Readme.txt"><div style="float: left; margin-left: 200 px">&emsp;&emsp;&emsp;<strong>Legal</strong></div></a>
        </div>

        <?php 
            if(isset($_POST['Submit'])){
                $comment = e($_POST['comment']);
                $user_id = $_SESSION['user']['id'];
                $query= "INSERT INTO att (comment, event_id, user_id) VALUES('$comment','$id','$user_id')";
                mysqli_query($db,$query);
                ?>
                <script>
                    location.href = location.href;
                </script>
        <?php
            }
        ?>
        
        <!--ajax for modal -->
        <script>  
            $(document).ready(function(){  
            $('.view_data').click(function(){  
                $.ajax({  
                    method:"post",  
                    success:function(data){  
                        $('#dataModal').modal("show");  
                    }  
                });  
            });  
            });  
        </script>
        
        <!-- Modal for login -->
		<div id="dataModal" class="modal fade" style="color:black">  
            <div class="modal-dialog">  
                <div class="modal-content">  
                    <div class="modal-header">  
                        <button type="button" class="close" data-dismiss="modal">&times;</button>  
                        <h4 class="modal-title" align="center">Login:</h4>  
                    </div>  
                    <div class="modal-body" id="success-fail"> 
	                       <form method="post">

                        <p>  <?php echo display_error(); ?></p>
                        <div class="input-group">
			                 <label>Username</label>
			                 <input type="text" name="susername">
                        </div>
                        <div class="input-group">
			                 <label>Password</label>
			                 <input type="password" name="spassword">
                        </div>
                        <div class="input-group">
			                 <button type="submit" class="btn" name="login_btn">Login</button>
                        </div>
                           </form>

                    </div>  
                </div>  
            </div>  
        </div>
    </body>
</html>