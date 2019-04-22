<?php 
	include 'layouts/open_page.html';
	include 'layouts/nav.html';

	$user = "";
	$password = "";

	function checkIfUserIsLoggedIn() {
		if(isset($_POST['user'])){
			if(isset($_POST['password'])){
				$user = $_POST['user'];
				$password = $_POST['password'];
				// Send query to database
			}
		}		
	}
?>

<div class="container pt-80">
	<div class="container col-12 justify-content-center" style="margin-top: 20px; background-color: white;">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6 mb-10">
				<div class="card">
					<div class="menu-display display-overlay">
						<div class="menu-item-container"></div>
						<div class="summary-box">
							<p><span>Total: </span><span class="total-amt">$ 0.00</span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-6 mb-10">
				<div class="card item-btns mb-10"></div>
				<div class="card utility-btns"></div>
			</div>
		</div>
	</div>
</div>

<form method="post" class="navigation" action="/manage">
	<input type="hidden" name="user" value="<?php echo $user?>">
	<input type="hidden" name="password" value="<?php echo $password?>">
</form>

<?php include 'layouts/close_page.html'?>