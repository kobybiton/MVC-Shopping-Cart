<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Checkout</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="../../public/css/bootstrap.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"/>
    <!-- Custom styles for this template -->
    <link href="../../public/css/shop-style.css" rel="stylesheet">
    <link href="../../public/css/checkout-style.css" rel="stylesheet">

  </head>

  <body>
    <!-- Navigation -->
    <div id="root">
	    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	        <div class="container">
		        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		       		<span class="navbar-toggler-icon"></span>
		        </button>
		        <div class="collapse navbar-collapse" id="navbarResponsive">
		            <ul class="navbar-nav ml-auto">
			            <li class="nav-item active">
			                <a class="nav-link" href="http://localhost/MVC/public/">
			              		<i class="fas fa-home"></i>
			                	<span class="sr-only">(current)</span>
			                </a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link" href="#">About</a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link" href="#">Services</a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link" href="#">Contact</a>
			            </li>          
		            </ul>
		        </div>
		        <span class="cart">
		        	<a href="http://localhost/MVC/public/checkout/index">
		        		<i class="fas fa-shopping-cart"></i> 
		        	</a>	
		        	{{ cartItems }} &nbsp ITEM(S)  ${{ cartPrice.toFixed(2) }}
		        </span>
	        </div>
	    </nav>

		<div class="checkout container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="panel-title">
								<div class="row">
									<div class="col-md-6">
										<h5><i class="fas fa-shopping-cart"></i> Shopping Cart</h5>
									</div>
									<div class="col-md-6">
										<a href="http://localhost/MVC/public/">
											<button type="button" class="btn btn-primary btn btn-block">
												<i class="far fa-share-square"></i> Continue shopping
											</button>
										</a>
									</div>
								</div>
							</div>
						</div>
			            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
			                <ol class="carousel-indicators">
				                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			                </ol>
			                <div class="carousel-inner" role="listbox">
				                <div class="carousel-item active">
				                    <img class="d-block img-fluid" src="../../public/images/mobile_offers.jpg" alt="First slide">
				                </div>
				                <div class="carousel-item">
				                    <img class="d-block img-fluid" src="../../public/images/chrismas.jpg" alt="Second slide">
				                </div>
				                <div class="carousel-item">
				                    <img class="d-block img-fluid" src="../../public/images/apple.jpg" alt="Third slide">
				                </div>
			                </div>
				            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				                <span class="sr-only">Previous</span>
				            </a>
				            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				                <span class="carousel-control-next-icon" aria-hidden="true"></span>
				                <span class="sr-only">Next</span>
				            </a>
			            </div>						
						<div class="panel-body" v-for="(item, index) in itemsResponse">
							<div class="row">
								<div class="col-md-3"><img class="card-img-top" :src="'../../public/' + item.image" width="300" height="200">
								</div>
								<div class="col-md-5">
									<h4 class="product-name"><strong>{{ item.title }}</strong></h4><h4><small>{{ item.description }}</small></h4>
								</div>
								<div class="col-md-2">
									<h4><strong>${{ item.price }}</strong></h4>
								</div>
								<div class="col-md-2">
									<remove-item :index="index" :item="item" :id="item.id"></remove-item>		
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-footer">
							<div class="row text-center">
								<div class="col-md-9">
									<h4 class="text-right">Total <strong>${{ cartPrice.toFixed(2) }}</strong></h4>
								</div>
								<div class="col-md-3">
								<pay-now></pay-now>	
								<!-- Modal Component -->
								<b-modal id="modal-center" centered title="Hi dear client">
							        <h4 class="my-4">Thank you for Shopping!</h4>
							        <p class="my-4">Have a Great Day... :)</p>
								</b-modal>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>   
	</div>  
    <!-- Footer -->
    <footer class="footer bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; K.B Web Developer</p>
      </div>
      <!-- /.container -->
    </footer>
    <!-- JavaScript -->
    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
	<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>    
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="../../public/js/cart_handler.js"></script>

  </body>

</html>
