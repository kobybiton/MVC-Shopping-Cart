<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-style.css" rel="stylesheet">

  </head>

  <body>

  	<div id="root">
	    <!-- Navigation -->
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

	    <!-- Page Content -->
	    <div class="container">

	        <div class="row">

		        <div class="col-md-12">

		            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
		                <ol class="carousel-indicators">
			                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		                </ol>
		                <div class="carousel-inner" role="listbox">
			                <div class="carousel-item active">
			                    <img class="d-block img-fluid" src="images/online_shopping.jpg" alt="First slide">
			                </div>
			                <div class="carousel-item">
			                    <img class="d-block img-fluid" src="images/rayban_background.jpg" alt="Second slide">
			                </div>
			                <div class="carousel-item">
			                    <img class="d-block img-fluid" src="images/apple.jpg" alt="Third slide">
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

		            <div class="row">

			            <div v-for="(item, index) in items" class="col-lg-4 col-md-6 mb-4">
			                <div class="card h-100">
				                <img class="card-img-top" :src="item.imgSrc" width="300" height="250" alt="">
				                <div class="card-body">
				                    <h4 class="card-title">
				                        {{ item.title }}
				                    </h4>
				                    <h5>${{ item.price }}</h5>
				                    <p class="card-text">{{ item.description }}</p>
				                </div>
				                <add-to-cart :item="item"></add-user>
				                <div class="card-footer">
				                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
				                </div>
			                </div>
			            </div>

		            </div>
	          <!-- /.row -->

	            </div>
	        <!-- /.col-md-12 -->

	        </div>
	      <!-- /.row -->

	    </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="footer bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; K.B Web Developer</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/cart_handler.js"></script>

  </body>

</html>
