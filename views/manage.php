<?php include 'layouts/open_page.html';
	include 'layouts/nav.html'
?>

<div class="container pt-80">
	<div class="container col-12 justify-content-center" style="margin-top: 20px; background-color: white;">
		<div class="row">
			<div class="col-12">
				<div class="card mb-10">
					<h4>Profits and Labor statistics</h4>
					<hr>
					<div class="row card-item">
						<div class="col-7">
							<p>Vendor 1</p>
						</div>
						<div class="col-5 text-right">
							<a href="" class="btn btn-danger">Remove</a>
						</div>
					</div>
				</div>
				<div class="card mb-10">
					<h5>Logged in workers</h5>
					<hr>
					<div class="row card-item">
						<div class="col-5">
							<p>Worker 1</p>
						</div>
						<div class="col-7 text-right">
							<a href="" class="btn btn-primary">Clock-In</a>
							<a href="" class="btn btn-danger">Clock-Out</a>
						</div>
					</div>
				</div>
				<div class="card mb-10">
					<h4>Vendor List</h4>
					<hr>
					<div class="row card-item">
						<div class="col-12">
							<p>Vendor 1</p>
						</div>
					</div>
				</div>
				<div class="card mb-10">
					<h4>Supply Orders</h4>
					<hr>
					<div class="row card-item" style="background-color:white;border:1px solid #ccc;">
						<div class="col-12">
							<p>Order 1</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	.card-item p {
		line-height: 40px;
		margin-bottom: 0px;
	}
</style>

<?php include 'layouts/close_page.html'?>