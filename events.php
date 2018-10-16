<?php include('functions.php'); ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HACK UMASS VI</title>
        <link rel="stylesheet" href="restaurants.css">
        <link rel="stylesheet" type="text/css" href="style-detail.css">  
        <link rel="stylesheet" type="text/css" href="modal.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class = "wrapper" style="padding-bottom: 50px">
        <?php  if (isset($_SESSION['user'])) { ?>
                <div class="header">
                    <a href="home.php"><img src="let's%20see.png" class="logo"></a>
                    <p class="login">
                        Welcome <strong><?php echo $_SESSION['user']['first']; ?> <?php echo $_SESSION['user']['last']; ?></strong> | 
                        <button name="logout">Logout</button>
                    </p>
                    
                </div>            
            <?php
                                                 }
            else{
                ?>
                <div class="header">
                    <a href="home.php"><img src="let's%20see.png" class="logo"></a>
                    <button type="submit" class="button view_data">Login</button>
                </div>
            <?php
            }
            ?>
        
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
		<div id="dataModal" class="modal fade">  
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
        
        
        <div class="foot">
        Created With Love By:&nbsp;
        Anushree Jana;
        Shreya Sawant;
        Akash Munjial<br>
                <a href="about.php"><div style="float: left;margin-left: 600px;"><strong>About</strong></div></a>
                <a href=""><div style="float: left; margin-left: 50px;"><strong>Contact</strong></div></a>
                <a href="Readme.txt"><div style="float: left; margin-left: 200 px">&emsp;&emsp;&emsp;<strong>Legal</strong></div></a>
        </div>
    </body>
</html>