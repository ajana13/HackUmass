<?php include('functions.php') ?>
<!DOCTYPE html>
<html class="log">
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="s.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    <link rel="stylesheet" type="text/css" href="style-detail.css">  
    <link ref="stylesheet" type="text/css" href="s.css">

</head>
<body>
    
    <div class="header">
        <h1>Let's See</h1>
        <h3>Welcome to our Website!</h3>
    </div>
	<div class="login_header">
		<h2>Register</h2>
	</div>
    <div class="f">
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

        <div class="input-group">
			<label>First Name</label>
			<input type="text" name="first" value="<?php echo $first; ?>">
		</div>
        <div class="input-group">
			<label>Last Name</label>
			<input type="text" name="last" value="<?php echo $last; ?>">
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
        <div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="password_2" >
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Register</button>
		</div>
        <p align="center">
            Already a user? <input type="button" name="view" class="btn-detail view_data" value="Login">
        </p>
       
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

                    </div>  
                </div>  
            </div>  
        </div> 
        <p align='center'>
			<a href="home.php">Continue without Logging in </a>
		</p>

    </form>
    </div>
    
</body>
</html>