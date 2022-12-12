<?php
$logedin=false;
if(isset($_COOKIE['login']) && isset($_COOKIE['jwt-token'])){
  $logedin=true;
}

?>

<html lang="en">
<head>
  <?php include './includes/header.php'?>
  <title>FoodsFly-Home</title>
  <link rel="stylesheet" href="../assets/css/slider.css">
  
  
  
</head>

<body class=" position-relative">
 
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item active-tab" ><a href=""><i class="fa-solid fa-house d-sm-none me-2"></i>Home</a></li>

      <li class="nav_item"><a href="./pages/menu.php"><i class="fa-solid fa-bars-sort d-sm-none me-2"></i>Menu</a></li>

      <?php
      if($logedin){
        echo '<li class="nav_item"><a href="">Orders</a></li>';
      }?>
      <li class="nav_item"><a href="./pages/aboutus.php"> About us</a></li>
      
      <?php
      if($logedin){?>
        <li class="nav_item">
          <a href="./pages/profile.php" class="profile">
            <i class="fa-solid fa-circle-user text-white" style="transform: scale(1.7);"></i>
          </a>
        </li>
      <?php }else {?>
        <li class="nav_item"><a href="./pages/register.php">Register</a></li>
        <li class="nav_item"><a href="./pages/login.php">Login</a></li>
      <?php }?>
      
    </ul>

    

    <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

    <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button>
  </nav>

  <section class="hero slider">

  <style>
    
  </style>

    <div class="container-fluid m-0 p-0">
      <div class="row p-0 m-0 position-relative">
        <div class="col-12 m-0 p-0">
          <img src="./assets/images/image-1.jpg" class=" w-100 slider-img" alt="img">
        </div>
        <div class="next-icons">
          <button class="text-white fa-solid fa-backward next-back-btns bg-transparent border-0" data-type='back' style="transform:scale(1.5) ;"></button>
          <button class="text-white fa-solid fa-forward next-back-btns bg-transparent border-0" data-type='forward' style="transform:scale(1.5) ;"></button>

        </div>

        <div class="hero-text container">
          <div class="row">
            <div class="col-md-7 mx-auto col-10 hero-container">
              <h1 class="featurette-heading fw-normal lh-1 mb-5">Affordable, Delicious. All in one place <span class="text-muted">FoodsFly.</span></h1>
              <p class="lead d-none d-sm-block" >Discover the Best-Kept Secret in Town: Our Restaurant's Exceptional Menu. we provide you with our best food made by the best chefs in the feild present</p>
              <a href="./pages/menu.php?view=all" class="btn btn-success">View Menu</a>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

  <main class="mt-5">
    <div class="container">
      <!--Section: Content-->
      <section>
        <div class="row">
          <div class="col-md-6 gx-5 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx91Nc_22BSjBDXwhq__Nr1BVnyBQFxUNCjQ&usqp=CAU" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
          </div>

          <div class="col-md-6 gx-5 mb-4">
            <h4><strong>Facilis consequatur eligendi</strong></h4>
            <p class="text-muted">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur
              eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum
              sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.
            </p>
            <p><strong>Doloremque vero ex debitis veritatis?</strong></p>
            <p class="text-muted">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod itaque voluptate
              nesciunt laborum incidunt. Officia, quam consectetur. Earum eligendi aliquam illum
              alias, unde optio accusantium soluta, iusto molestiae adipisci et?
            </p>
          </div>
        </div>
      </section>
      <!--Section: Content-->

      <hr class="my-5" />

      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>Facilis consequatur eligendi</strong></h4>

        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the
                  card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="https://mdbootstrap.com/img/new/standard/nature/023.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the
                  card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="https://mdbootstrap.com/img/new/standard/nature/111.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the
                  card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Content-->


      
    </div>
  
    <?php include_once './includes/footer.php'?>
  </main>

  <script src="./assets/js/index.js"></script>
  <script src="../assets/js/slider.js"></script>
  <?php include './includes/scripts.php'?>
</body>
</html>