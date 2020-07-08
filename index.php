<?php
require 'header.php';
?>

<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="localstorage.js"></script>

<!-- <div class="jumbotron jumbotron-fluid bg-danger text-white py-3">
	<div class="display-4 ml-4 mt-2">
		<div class="container">
			<div class="row">
				<div class="col-md-1 col-sm-1">
					<img src="images/sumosushi.png" class="img-fluid" style="width: 70px; height: 70px;">
				</div>
				<div class="col-md-10 col-sm-4">
					<div class="row">
						<h1>相撲寿司</h1>
					</div>
					<div class="row">
						<p style="font-size: 15px;">メニューリスト</p>
					</div>


				</div>
			</div>

		</div>


	</div>
</div> -->
<header class="bg-danger">
		<div class="container text-white py-4">
			<div class="row">
				<div class="col-2 col-lg-1">
					<img src="images/sumosushi.png" class="img-fluid">
				</div>
				<div class="col-10 col-lg-11">
					<h1>相撲寿司</h1>
					<p class="m-0">メニューリスト</p>
				</div>
			</div>
		</div>
	</header>
<div class="container-fluid">
	<div class="row my-2">
		<div class="col-md-3 offset-4 my-2" align="right">
			<button class="btn btn-danger" id="add">Add New</button>
		</div>

	</div>
	<div class="row mx-2 addnewform">

		<div class="col-md-12 shadow-lg pt-1 px-3 pb-1 mb-5 bg-white rounded">

			<div class="container">
				<h2 class="text-center p-4">Add New Receipt</h2>
				<form class="mt-4" method="POST" action="addnewreceipt.php" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="profile" class="col-sm-2 col-form-label">Profile</label>
						<div class="col-sm-10">
							<input type="file" id="profile" name="new_photo">
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Category</label>
						<div class="col-sm-10">
							<select class="form-control form-control-lg" name="new_category">
								<option selected>Choose Category</option>
								<option value="0">Sushi</option>
								<option value="1">Bento Boxes</option>
								<option value="2">Ramen</option>
								<option value="3">Appetizers</option>
								<option value="4">Rice</option>
							</select>
						</div>

					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" placeholder="Enter Name" name="new_name">
						</div>
					</div>
					<div class="form-group row">
						<label for="price" class="col-sm-2 col-form-label">Price</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="price" placeholder="Enter Price" name="new_price">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6 offset-4" align="right">
							<button type="submit" class="btn btn-danger">SAVE</button>
						</div>
						<div class="col-sm-2" align="right">
							<a class="btn btn-danger" id="close" style="color: white">CLOSE</a>
						</div>
					</div>
				</form>
			</div>


		</div>
	</div>
	<div class="row mx-2 editform mb-3" style="display: none;">
		<div class="container" id="div-edit">
			<h2 class="text-center mt-4 mb-5">Edit Existing Receipt</h2>
			<form method="post" action="updatereceipt.php" enctype="multipart/form-data">
				<input type="hidden" name="editid" id="edit-id">
				<div class="form-row my-3">
					<label class="col-md-2 col-form-label" for="profile">Profile: </label>
					<div class="col-md-10">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old Profile</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">New Profile</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active py-3" id="home" role="tabpanel" aria-labelledby="home-tab">
								<input type="hidden" name="oldprofilename" id="old-profile-name">
								<img src="" width="100px" id="old-profile">
							</div>
							<div class="tab-pane fade py-4" id="contact" role="tabpanel" aria-labelledby="contact-tab">
								<input type="file" class="form-control-file" id="profile" name="newprofile">
							</div>
						</div>
					</div>
				</div>

				<div class="form row my-3">
						<label for="name" class="col-sm-2 col-form-label">Category</label>
						<div class="col-sm-10">
							<select class="form-control form-control-lg" name="editcategory" id="edit-category">
								<option selected>Choose Category</option>
								<option value="0">Sushi</option>
								<option value="1">Bento Boxes</option>
								<option value="2">Ramen</option>
								<option value="3">Appetizers</option>
								<option value="4">Rice</option>
							</select>
						</div>

					</div>

				<div class="form-row my-3">
					<label class="col-md-2 col-form-label" for="edit-name">Name: </label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="edit-name" name="editname" placeholder="Enter Name">
					</div>
				</div>

				<div class="form-row my-3">
					<label class="col-md-2 col-form-label" for="edit-price">Price: </label>
					<div class="col-md-10">
						<input type="number" class="form-control" id="edit-price" name="editprice" placeholder="Enter Price">
					</div>
				</div>

				<!-- <div class="form-row my-3">
					<label class="col-md-2 col-form-label" for="gender">Gender: </label>
					<div class="col-md-10 col-form-label">
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="edit-male" name="editgender" value="Male" class="custom-control-input" >
							<label class="custom-control-label" for="edit-male">Male</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="edit-female" name="editgender" value="Female" class="custom-control-input">
							<label class="custom-control-label" for="edit-female">Female</label>
						</div>
					</div>
				</div> -->

				<!-- <div class="form-row my-3">
					<label class="col-md-2 col-form-label" for="edit-address">Address: </label>
					<div class="col-md-10">
						<textarea class="form-control" rows="6" name="editaddress" id="edit-address" placeholder="Enter Address..."></textarea>
					</div>
				</div> -->

				<div class="form-row my-3">
					<button class="btn btn-danger offset-md-11" id="btn-update">UPDATE</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row mx-2 tableform">
		<div class="col-md-12 shadow-lg pt-1 px-3 pb-1 mb-5 bg-white rounded">
			<div class="container mt-5" id="table">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Gender</th>
								<th>Category</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="tablebody">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row mx-2">

		<div class="col-md-7 mb-5 bg-white rounded">
			<div class="row">

				<div class="col-md-12 shadow-lg pt-1 px-3 pb-1 mb-5 bg-white rounded">

					<ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-sushi-tab" data-toggle="pill" href="#pills-sushi" role="tab" aria-controls="pills-sushi" aria-selected="true">Sushi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="bento" data-toggle="pill" href="#pills-bento" role="tab" aria-controls="pills-bento" aria-selected="false">Bento Boxes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-ramen-tab" data-toggle="pill" href="#pills-ramen" role="tab" aria-controls="pills-ramen" aria-selected="false">Ramen</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-appet-tab" data-toggle="pill" href="#pills-appet" role="tab" aria-controls="pills-appet" aria-selected="false">Appetizers</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-rice-tab" data-toggle="pill" href="#pills-rice" role="tab" aria-controls="pills-rice" aria-selected="false">Rice</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-sushi" role="tabpanel" aria-labelledby="pills-sushi-tab">
							<div class="container" id="receipt_card">
								<div class="row">

									<!-- <div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">2500 Ks</span>
											<img src="images/c11.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Misuna Fry</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="1" data-name="Misuna Fry" data-price="2500">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3600 Ks</span>
											<img src="images/c1.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title text-center">Wakasa Sushi</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="2" data-name="Wakasa Sushi" data-price="3600">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3000 Ks</span>
											<img src="images/c2.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Salamon (Shiki)</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="3" data-name="Salamon(shiki)" data-price="3000">Add to Cart</button>
											</div>	
										</div>

									</div> -->
								</div>
								<!-- <div class="row mt-4">
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">5000 Ks</span>
											<img src="images/c3.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Salamon Sushi</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="4" data-name="Salamon Sushi" data-price="5000">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">4800 Ks</span>
											<img src="images/c4.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Yume Sushi</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="5" data-name="Yume Sushi" data-price="4800">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">4000 Ks</span>
											<img src="images/c1.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Mix Sushi</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="6" data-name="Mix Sishi" data-price="4800">Add to Cart</button>
											</div>	
										</div>

									</div>
								</div> -->
							</div>


						</div>
						<div class="tab-pane fade" id="pills-bento" role="tabpanel" aria-labelledby="pills-bento-tab">
							<div class="container">
								<div class="row">
									<!-- <div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3600 Ks</span>
											<img src="images/b1.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Meat</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="7" data-name="Meat" data-price="3600">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3300 Ks</span>
											<img src="images/b2.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Seafood</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="8" data-name="Seafood" data-price="3300">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3000 Ks</span>
											<img src="images/b3.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Vegetables</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="9" data-name="Vegetables" data-price="3000">Add to Cart</button>
											</div>	
										</div>

									</div> -->
								</div>
								<!-- <div class="row mt-4">
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">2900 Ks</span>
											<img src="images/b4.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Fish</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="10" data-name="Fish" data-price="2900">Add to Cart</button>
											</div>	
										</div>

									</div>

								</div> -->
							</div>
						</div>
						<div class="tab-pane fade" id="pills-ramen" role="tabpanel" aria-labelledby="pills-ramen-tab">
							<div class="container">
								<div class="row">
									<!-- <div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3650 Ks</span>
											<img src="images/r1.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Vegetables</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="11" data-name="Vegetables" data-price="3650">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">4200 Ks</span>
											<img src="images/r2.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Chicken</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="12" data-name="Chicken" data-price="4200">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">5600 Ks</span>
											<img src="images/r3.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Pasta</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="13" data-name="Pasta" data-price="5600">Add to Cart</button>
											</div>	
										</div>

									</div> -->
								</div>
								<!-- <div class="row mt-4">
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">5000 Ks</span>
											<img src="images/r4.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Meat</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="14" data-name="Meat" data-price="5000">Add to Cart</button>
											</div>	
										</div>

									</div>

								</div> -->
							</div>
						</div>
						<div class="tab-pane fade" id="pills-appet" role="tabpanel" aria-labelledby="pills-appet-tab">
							<div class="container">
								<div class="row">
									<!-- <div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3100 Ks</span>
											<img src="images/a1.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Sashimi</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="15" data-name="Sashimi" data-price="3100">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3950 Ks</span>
											<img src="images/a2.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Fruits</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="16" data-name="Fruits" data-price="3950">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">4200 Ks</span>
											<img src="images/a3.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Eggs</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="17" data-name="Eggs" data-price="4200">Add to Cart</button>
											</div>	
										</div>

									</div> -->
								</div>
								<!-- <div class="row mt-4">
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">4600 Ks</span>
											<img src="images/a4.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Vegetables</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="18" data-name="Vegetables" data-price="4600">Add to Cart</button>
											</div>	
										</div>

									</div>

								</div> -->
							</div>
						</div>
						<div class="tab-pane fade" id="pills-rice" role="tabpanel" aria-labelledby="pills-rice-tab">
							<div class="container">
								<div class="row">
									<!-- <div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">4150 Ks</span>
											<img src="images/rc1.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Riceball</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="19" data-name="Riceball" data-price="4150">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3600 Ks</span>
											<img src="images/rc2.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Maki rice</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="20" data-name="Maki rice" data-price="3600">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3100 Ks</span>
											<img src="images/rc3.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Pastries</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="21" data-name="Pastries" data-price="3100">Add to Cart</button>
											</div>	
										</div>

									</div> -->
								</div>
								<!-- <div class="row mt-4">
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3900 Ks</span>
											<img src="images/rc4.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Seafood</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="22" data-name="Seafood" data-price="3900">Add to Cart</button>
											</div>	
										</div>

									</div>
									<div class="col-md-4">
										<div class="card mb-4">
											<span class="badge badge-dark badge-pill" id="price_badge">3400 Ks</span>
											<img src="images/rc5.jpg" class="card-img-top" alt="card1.jpg">
											<div class="card-body bld">
												<h6 class="card-title">Fish</h6> 
											</div>
											<div class="card-footer">
												<button class="btn btn-outline-danger btn-block addtocart" data-id="23" data-name="Fish" data-price="3400">Add to Cart</button>
											</div>	
										</div>

									</div>

								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>

		<div class="col-md-5" id="voucher_div">
			<!-- <div class="shadow-lg p-3 mb-5 bg-white rounded ml-2">
				
			</div> -->
			<div class="shadow-lg p-3 mb-5 bg-white rounded text-center ml-2">
				<h4>Payment</h4>
				<table class="table table-bordered text-left">
					<thead class="thead-light">
						<tr>
							<th>Name</th>
							<th>Qty</th>
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody id="tb_body">
					</tbody>
					<tfoot>

					</tfoot>
				</table>

			</div>
		</div>


	</div>

</div>



<?php
require 'footer.php';
?>


