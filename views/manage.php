<?php

	include 'layouts/open_page.html';
	include 'layouts/nav.html';
	require './controllers/env.php';
	require './controllers/auth.php';

	if(!checkIfUserIsManager()) {
		
	}
	else {
		//echo json_encode(checkIfUserIsManager());
	}
	//echo json_encode(checkIfUserIsManager());
?>

<div class="container pt-80">
	<div class="container col-12 justify-content-center" style="margin-top: 20px; background-color: white;">
		<div class="row grid">
			<div class="col-12 col-lg-6 grid-item">
				<div class="card mb-10 profit-labor-stats">
					<h4>Profits and Labor statistics</h4>
					<hr>
				</div>
			</div>
			<div class="col-12 col-lg-6 grid-item">
				<div class="card mb-10 logged-in-workers">
					<h5>Logged in workers</h5>
					<hr>
				</div>
			</div>
			<div class="col-12 col-lg-6 grid-item">
				<div class="card mb-10 vendors-list">
					<h4>Vendor List</h4>
					<hr>
				</div>
			</div>
			<div class="col-12 col-lg-6 grid-item">
				<div class="card mb-10 supply-orders">
					<h4>Supply Orders</h4>
					<hr>
				</div>
			</div>
		</div>
	</div>
</div>

<form method="post" class="navigation" action="/menu">
	<input class="user" type="hidden" name="user" value=<?php echo $user?>>
</form>

<?php include 'layouts/close_page.html'?>