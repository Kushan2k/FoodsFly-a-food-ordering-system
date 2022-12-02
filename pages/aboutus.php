<html lang="en">
<head>
  <?php include '../includes/header.php'?>
  <title>FoodsFly-About us</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
</head>

<body class=" position-relative">

    <style>
        .social-link {
        width: 30px;
        height: 30px;
        border: 1px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
        border-radius: 50%;
        transition: all 0.3s;
        font-size: 0.9rem;
      }

      .social-link:hover,
      .social-link:focus {
        background: #ddd;
        text-decoration: none;
        color: #555;
      }
    </style>
 
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " >
        <a href="../index.php">
          <i class="fa-solid fa-house d-sm-none me-2">

          </i>Home
        </a>
      </li>

      <li class="nav_item ">
        <a href="">
          <i class="fa-solid fa-bars-sort d-sm-none me-2">

          </i>Menu
        </a>
      </li>
      <li class="nav_item "><a href="">Orders</a></li>
      <li class="nav_item active-tab"><a href=""> About us</a></li>
      <li class="nav_item"><a href="./contacts.php">Contact us</a></li>
      <li class=" d-none d-sm-flex">
        <a href="./profile.php" class="profile">
          <i class="fa-solid fa-user text-white">

          </i>
        </a>
      </li>
      
    </ul>

    <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

    <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button>
  </nav>

  <section class="about-us container mt-3">
    <div class="bg-light">
      <div class="container py-5">
        <div class="row h-100 align-items-center py-5">
          <div class="col-lg-6">
            <h1 class="display-4">Who We Are</h1>
            <p class="lead text-muted mb-0">We are undergraduates at Sri Lanka Technological Campus</p>
            <!-- <p class="lead text-muted">Snippet by <a href="https://bootstrapious.com/snippets" class="text-muted">  -->
                        <!-- <u>Bootstrapious</u></a> -->
            </p>
          </div>
          <div class="col-lg-6 d-none d-lg-block"><img src="https://bootstrapious.com/i/snippets/sn-about/illus.png" alt="" class="img-fluid"></div>
        </div>
      </div>
    </div>

    <div class="bg-white py-5">
      <div class="container py-5">
        <div class="row align-items-center mb-5">
          <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
            <h2 class="font-weight-light">Our Story</h2>
            <p class="font-italic text-muted mb-4">We started this restaurant to provide affordable and delicious meals to everyone our menu ranges from simple baked items upto gourmet foods such as truffle fried rice which is an in house special</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
          </div>
          <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://bootstrapious.com/i/snippets/sn-about/img-2.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-5 px-5 mx-auto"><img src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
          <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
            <h2 class="font-weight-light">Our journey</h2>
            <p class="font-italic text-muted mb-4">We started this restaurant with a small team of three people and now we have expanded upto 25 people working and we provide a wide variety of dishes ranging from traditional Sri Lankan Cuisine, Japanese Cuisine, Italian Cuisine and Chinese cuisine. We have decided to expand our buisiness further and have a website where customers can order online and enjoy their meal</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
          </div>
        </div>
      </div>
    </div>
    <style> 
      .fa-facebook-f{
        color: #3b5998;
      }
      .fa-linkedin-in{
        color: #0072b1;
      }
      .fa-github{
        color: #171515;
      }
      .fa-envelope{
        color:#BB001B;
      }
      .social-link>i{
        transform: scale(1.5);
      }
      .social-link{
        text-decoration: none;
      }
    </style>

    <div class="bg-light py-5">
      <div class="container py-5">
        <div class="row mb-4">
          <div class="col-12">
            <h2 class="display-4 font-weight-light">Our team</h2>
            <p class="font-italic text-muted">
              We have a wonderful talented full stack developer team behind the whole implementation of the product and ready to serve you 24/7
            </p>
          </div>
        </div>

        

        <div class="row text-center">
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4">
              <img src="https://assets.puzzlefactory.com/puzzle/387/881/original.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Tony Stark</h5>
              <span class="small text-uppercase text-muted">CEO - Founder</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-linkedin-in"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-github"></i></a></li>
                <li class="list-inline-item"><a href="mailto:kushangayantha001@gmail.com" class="social-link">
                  <i class="fa-solid fa-envelope"></i></a></li>
              </ul>
            </div>
          </div>
          <!-- <div class="row text-center">
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4">
              <img src="https://assets.puzzlefactory.com/puzzle/387/881/original.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Tony Stark</h5>
              <span class="small text-uppercase text-muted">CEO - Founder</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-linkedin-in"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-github"></i></a></li>
                <li class="list-inline-item"><a href="mailto:kushangayantha001@gmail.com" class="social-link">
                  <i class="fa-solid fa-envelope"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="row text-center">
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4">
              <img src="https://assets.puzzlefactory.com/puzzle/387/881/original.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Tony Stark</h5>
              <span class="small text-uppercase text-muted">CEO - Founder</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-linkedin-in"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-github"></i></a></li>
                <li class="list-inline-item"><a href="mailto:kushangayantha001@gmail.com" class="social-link">
                  <i class="fa-solid fa-envelope"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="row text-center">
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4">
              <img src="https://assets.puzzlefactory.com/puzzle/387/881/original.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Tony Stark</h5>
              <span class="small text-uppercase text-muted">CEO - Founder</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-linkedin-in"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-github"></i></a></li>
                <li class="list-inline-item"><a href="mailto:kushangayantha001@gmail.com" class="social-link">
                  <i class="fa-solid fa-envelope"></i></a></li>
              </ul>
            </div>
          </div> 
          <div class="row text-center">
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4">
              <img src="https://assets.puzzlefactory.com/puzzle/387/881/original.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Tony Stark</h5>
              <span class="small text-uppercase text-muted">CEO - Founder</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-linkedin-in"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link">
                  <i class="fa-brands fa-github"></i></a></li>
                <li class="list-inline-item"><a href="mailto:kushangayantha001@gmail.com" class="social-link">
                  <i class="fa-solid fa-envelope"></i></a></li>
              </ul>
            </div>
          </div> -->

          
        </div>

          
      </div>
    </div>
  </section>


  
  <?php include '../includes/scripts.php'?>
</body>
</html>