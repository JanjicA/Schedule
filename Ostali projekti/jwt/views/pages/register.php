<div class="container-contact50">

		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="models/create-user.php" method="POST">
				<span class="contact100-form-title">
					Register here
				</span>

				<div class="alert alert-danger">
                    <?php
                        if(isset($_SESSION['greske'])){

                            foreach($_SESSION['greske'] as $errors){

                            echo $errors ."<br/>";
                            }

                            // cim se ispise = brisemo
                            unset($_SESSION['greske']);
                        }
                    ?>
                </div>

				<label class="label-input100" for="first-name">Enter your Name *</label>
				<div class="wrap-input100 validate-input" data-validate = "Type first name">
					<input id="name" class="input100" type="text" name="name" placeholder="First name">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="username-name">Enter your Username *</label>
				<div class="wrap-input100 validate-input" data-validate = "Type first name">
					<input id="username" class="input100" type="text" name="username" placeholder="Username">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter your Email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="email" name="email" placeholder="example@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="password">Enter your Password *</label>
				<div class="wrap-input100 validate-input" data-validate = "Type first name">
					<input id="password" class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<input type="submit" id="dugme" name="dugme" value="Register"/>
				</div>

				<div class="wrap-input100 promena">
					<p>Already a member? <a href="index.php?page=login">Sign In</a></p>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>