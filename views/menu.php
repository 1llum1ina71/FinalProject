<?php 
	include 'layouts/open_page.html';
	include 'layouts/nav.html';
	require './controllers/env.php';
	require './controllers/auth.php';
?>

<div class="container pt-80">
	<div class="container col-12 justify-content-center" style="margin-top: 20px; background-color: white;">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6 mb-10">
				<div class="card p-7">
					<div class="menu-display display-overlay">
						<div class="menu-item-container"></div>
						<div class="summary-box">
							<p><span>Total: </span><span class="total-amt">$ 0.00</span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-6 mb-10">
				<div class="card p-7 mb-10">
					<div class="item-btns text-center">
						<p style="margin-bottom:5px;"><strong>Food</strong></p>
						<hr class="mt-0" style="margin-bottom:5px;">
					</div>
				</div>
				<div class="card p-7">
					<div class="utility-btns text-center">
						<p style="margin-bottom:5px;"><strong>Utilities</strong></p>
						<hr class="mt-0" style="margin-bottom:5px;">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<form method="post" class="navigation" action="/manage">
	<input class="user" type="hidden" name="user" value=<?php echo $user?>>
</form>

<?php include 'layouts/close_page.html'?>