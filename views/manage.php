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
			<div class="col-12 col-lg-6 grid-item">	
				<div class="card mb-10 employees">	
					<h4>Employees</h4>
					<hr>
					<div class="row">	
						<ul class="nav nav-pills col-12">
							<li class="nav-item col-6 text-center p-0">
						    	<a class="nav-link active" href="javascript:void(0);" data-target="list">Employee List</a>
						  	</li>
						  	<li class="nav-item col-6 text-center p-0">
						    	<a class="nav-link" href="javascript:void(0);" data-target="add">Add Employee</a>
						 	</li>
						</ul>
					</div>
					<div class="row">
						<div class="pl-0 nav-content col-12">	
							<div class="nav-tab employee-list card " style="border: 1px solid black;border-radius: 0px;" id="list">
								<table class="table table-striped table-bordered datatable">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>JobTitle</th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="nav-tab employee-add d-none card" style="border: 1px solid black;border-radius: 0px;" id="add">
								<div class="row employee-form">
									<div class="col-12 mb-10">
										<label>First Name</label>
										<input type="text" class="col-12" id="first_name" required>
									</div>
									<div class="col-12 mb-10">
										<label>Last Name</label>
										<input type="text" class="col-12" id="last_name" required>
									</div>
									<div class="col-12 mb-10">
										<label class="pl-0 col-12">Job Title</label>
										<select name="job_title" id="job_title">
											<option value="Cook">Cook</option>
											<option value="Bartender">Bartender</option>
											<option value="Busboy">Busboy</option>
											<option value="Manager">Manager</option>
											<option value="IT Professional">IT Professional</option>
											<option value="Owner">Owner</option>
										</select>
									</div>
									<div class="col-12 text-right" class="">
										<a href="javascript:void(0);" class="btn btn-primary employee-add-submit">Submit</a>
									</div>
									<div class="col-12 error-log" style="color:red;">
										
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<form method="post" class="navigation" action="/menu">
	<input class="user" type="hidden" name="user" value=<?php echo $user?>>
</form>

<?php include 'layouts/close_page.html'?>