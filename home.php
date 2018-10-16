<?php
include('functions.php');
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HACK UMASS VI</title>
        <link rel="stylesheet" href="cover.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

        <link rel="stylesheet" type="text/css" href="style-detail.css">  
        <link rel="stylesheet" type="text/css" href="modal.css">

    </head>
    <body>

        <div class = "wrapper" style="padding-bottom: 50px">

            <?php  if (isset($_SESSION['user'])) { ?>
                <div class="header">
                    <a href="home.php"><img src="let's%20see.png" class="logo"></a>
                    <p class="login">
                        Welcome <strong><?php echo $_SESSION['user']['first']; ?> <?php echo $_SESSION['user']['last']; ?></strong> | 
                        <a href="logout.php">Logout</a>
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
            <br>
            <div class="flyer"><h1>Let's See</h1>
            <p>
            We at Let's See are dedicated to provide you with the best experience whenever you visit a place
            <br>
            Wherever you visit, check Let's See to see the attractions around you
            <br>
            Be it looking for a restaurant, a hotel, or a convinence store, check Let's See to get the best options
            <br>
            Let's See has reviews from millions of people who have visited the locations.
            <br>
            At the same time, Let's See gives you the opportunity to connect to people going to the event at the same time and network.
            <br>
            <a href="" style="color: black">Join</a> our community and feel the change.
            <br>
            <br>
            Explore
            <br>
            </p>
            </div>

            <div>
                <a href="restaurants.php"><div style="float: left" class="contentBox">Restaurants<br>
                <img src="Dining-512.png" >
                </div></a>
                <a href="attractions.php"><div style="float: left;" class="contentBox">Attractions
                    <img src="tent_86208.png">
                </div></a>
                <a href="events.php"><div style="float: left" class="contentBox">Events<br>
                    <img src="amusement-1298959_960_720.png">
                </div></a>
                <a href=""><div style="float: left;" class="contentBox">Hotels
                <br>
                    <img src="hotel1.png">
                </div></a>
                <br>
                <a href=""><div style="float: left" class="contentBox">Schools<br>
                    <img src="school.jpg">
                </div></a>
                <a href=""><div style="float: left" class="contentBox">Convenience Stores
                    <img src="cart-148964__340.png">
                </div></a>

                <br>
                <a href=""><div style="float: left" class="contentBox">Hospitals<br>
                    <img src="hospital2.png">
                </div></a>
                <a href=""><div style="float: left;" class="contentBox">Personal Care
                    <img src="480260044-612x612.jpg">
                </div></a>
                <a href=""><div style="float: left" class="contentBox">Leisure<br>
                    <img src="book.png">
                </div></a>
            </div>
            <div class="push"></div>            
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
        <!--<footer>
            <div style="height: 80px">
                <a href=""><div class="foot button" style="float: left">About</div></a>
                <a href=""><div class="foot button" style="float: left">Contact</div></a>
                <a href="Readme.txt"><div class="foot button" style="float: right">Legal</div></a>
            </div>
        </footer>-->
        
    </body>
</html>

<?php

?>