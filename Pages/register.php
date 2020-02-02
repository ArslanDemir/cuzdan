<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
		<?php
			if (empty($_SESSION['message'])) {
				
			}else{
				if ($_SESSION['message']['status'] == 'error') {
					?>
					<div class="col-md-6 align-self-center alert alert-danger">
						<?php 
							print_r($_SESSION['message']['message']);
							unset($_SESSION['message']); 
						?>
					</div>
					<?php
				}elseif($_SESSION['message']['status'] == 'success'){

				?>
					<div class="col-md-6 align-self-center alert alert-success">
						<?php 
							print_r($_SESSION['message']['message']);
							unset($_SESSION['message']); 
							Controller::refresh('panel',2);
						?>
					</div>
				<?php
				}
			}
		?>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6 align-self-center">
				<form action="" method="post">
					<div class="form-group">	
						<label for="name">Ad-Soyad</label>
						<input class="form-control" type="text" id="name" name="name">
					</div>
					<div class="form-group">	
						<label for="email">E-Posta</label>
						<input class="form-control" type="email" id="email" name="email">
					</div>
					<div class="form-group">	
						<label for="password">Parola</label>
						<input class="form-control" type="password" id="password" name="password">
					</div>
					<div class="form-group">	
						<button type="submit" class="btn btn-primary form-control">Kayıt OL</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>