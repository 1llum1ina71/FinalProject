<?php include 'layouts/open_page.html';
	include 'layouts/login-nav.html';
?>

<div class="container pt-80">
	<!-- <div class="vertical-center bkgd-pic" style="background-image: url('../assets/bar.jpg'), linear-gradient(#eb01a5, #d13531);"></div> -->
	<div class="card container col-12 justify-content-center center" style="margin-top: 20px; background-color: white;">
		<div class="card maxw-300">
			<div class="row">
				<div class="keypad-display-container col-12 plr-6">
					<div class="keypad-display col-12 plr-6 text-center"></div>
				</div>
				<div class="keypad col-12 "></div>
			</div>
		</div>
	</div>
</div>

<form method="post" class="navigation" action="/menu">
	<input id = "user" type="hidden" name="user" value="">
</form>

<?php include 'layouts/close_page.html'?>