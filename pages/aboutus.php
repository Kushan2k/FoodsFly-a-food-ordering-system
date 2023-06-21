<?php
include_once '../utils/jwt-auth.php';

$logedin=false;
if(checkIsLogedIn()){
  $logedin=true;
  
}
?>

<html lang="en">
<head>
  <?php include '../includes/header.php'?>
  <title>FoodsFly-About us</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>
  .team-member-image {
    width: 100px; /* Adjust the width as needed */
    height: 100px; /* Adjust the height as needed */
  }
</style>
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
        <a href="./menu.php">
          <i class="fa-solid fa-bars-sort d-sm-none me-2">

          </i>Menu
        </a>
      </li>
      <?php
      if($logedin){
        echo '<li class="nav_item"><a href="./order.php">Orders</a></li>';
      }?>
      <li class="nav_item active-tab"><a href=""> About us</a></li>
      <?php 
      
      if($logedin){?>
        <li class=" d-none d-sm-flex">
          <a href="./profile.php" class="profile">
            <i class="fa-solid fa-circle-user text-white" style="transform: scale(1.7);"></i>
          </a>
        </li>
      <?php }
      
      ?>
      
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
            <p class="lead text-muted mb-0">Welcome to our restaurant, where tradition meets modernity and every dish is made with love. We are a family-owned and operated establishment, passionate about bringing the authentic flavors of our cuisine to your table. Our team of talented chefs are dedicated to using the freshest ingredients, hand-picked from local markets, to create delicious and memorable dishes that you and your loved ones will cherish. We believe that food is not just sustenance, but a way to bring people together and create lasting memories. Come dine with us and taste the difference that passion and quality make.</p>
            <!-- <p class="lead text-muted">Snippet by <a href="https://bootstrapious.com/snippets" class="text-muted">  -->
                        <!-- <u>Bootstrapious</u></a> -->
            </p>
          </div>
          <div class="col-lg-6 d-none d-lg-block"><img src="https://bootstrapious.com/i/snippets/sn-about/illus.png" alt="" class="img-fluid"></div>
        </div>
      </div>
    </div>

        <div class="row align-items-center">
          <div class="col-lg-5 px-5 mx-auto"><img src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
          <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
            <h2 class="font-weight-light">Our journey</h2>
            <p class="font-italic text-muted mb-4">From humble beginnings, our restaurant has grown into a beloved dining destination, known for its delicious food and warm, welcoming atmosphere. Our story began with a passion for cooking and a dream of sharing that love with others. With hard work and determination, we started small and gradually built a reputation for serving authentic, delicious food made with the freshest ingredients. Today, we are proud to say that our restaurant is a place where friends and families come together to enjoy good food and create memories that last a lifetime. We are grateful for the support of our loyal customers and look forward to continuing to serve you for many years to come.</p>
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
    <div class="container mb-4">
      <style>
        .bg-image {
          background-image: url('../assets/images/about-us.jpg');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
        }
      </style>
      <div class="row">
        <div class="col-11 mx-auto">
          
          <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-sm-6 bg-image"></div>
                <div class="col-sm-6 p-4">
                  <div class="text-center">
                    <div class="h3 fw-light">Contact Us Now</div>
                    <p class=" text-start">Reach Out to Us for More Information or to Request a Private Dining Experience</p>
                    
                  </div>
                  <form method='POST' id="contactForm" action='../actions/messageAction.php' data-sb-form-api-token="API_TOKEN">

                    <!-- Name Input -->
                    <div class="form-floating mb-3">
                      <input name='name' class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
                      <label for="name">Name</label>
                      
                    </div>

                    <!-- Email Input -->
                    <div class="form-floating mb-3">
                      <input name='email' class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                      <label for="emailAddress">Email Address</label>
                      
                      
                    </div>

                    <!-- Message Input -->
                    <div class="form-floating mb-3">
                      <textarea name='message' class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
                      <label for="message">Message</label>
                      
                    </div>

                    

                    <!-- Submit button -->
                    <div class="d-grid">
                      <button class="btn btn-outline-primary btn-lg " name='post-msg' id="submitButton" type="submit">Submit</button>
                    </div>
                  </form>
                  <!-- End of contact form -->

                </div>
              </div>

            </div>
          </div>
          
        </div>
      </div>
    </div>


    <div class="bg-light py-5">
      <div class="container py-5">
        <div class="row mb-4">
          <div class="col-12">
            <h2 class="display-4 font-weight-light">Our team</h2>
            <p class="font-italic text-muted">
            Meet the talented team of university students behind your new favorite food ordering system. We are a dedicated and passionate group of individuals with a love for both technology and great food. With a combined skillset in computer science, design, and culinary arts, we have set out to revolutionize the way you order food from your favorite restaurant. Our user-friendly platform makes it easy for you to discover new dishes, track your order, and enjoy your meal without any hassle. So why wait? Join us on this delicious journey and experience the future of food ordering today!
            </p>
          </div>
        </div>

        

        <div class="row text-center">
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4">
              <img src="..\assets\images\inula.jpg" alt=""  class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm team-member-image">
              <h5 class="mb-0">Inula Chandira</h5>
              <span class="small text-uppercase text-muted">Team lead/Developer</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="https://www.facebook.com/inula.chandira?mibextid=ZbWKwL" class="social-link">
                  <i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/in/inula-chandira-8155a8254" class="social-link">
                  <i class="fa-brands fa-linkedin-in"></i></a></li>
                <li class="list-inline-item"><a href="https://github.com/InulaC" class="social-link">
                  <i class="fa-brands fa-github"></i></a></li>
                <li class="list-inline-item"><a href="mailto:cinula40@gmail.com" class="social-link">
                  <i class="fa-solid fa-envelope"></i></a></li>
              </ul>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4">
              <img src="..\assets\images\kushan.jpg"  class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm team-member-image">
              <h5 class="mb-0">Kushan Gayantha</h5>
              <span class="small text-uppercase text-muted">developer</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="https://web.facebook.com/kushan.gayantha.14" class="social-link">
                  <i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/in/kushan-gayantha-b2069b1a8" class="social-link">
                  <i class="fa-brands fa-linkedin-in"></i></a></li>
                <li class="list-inline-item"><a href="https://github.com/Kushan2k" class="social-link">
                  <i class="fa-brands fa-github"></i></a></li>
                <li class="list-inline-item"><a href="mailto:kushangayantha001@gmail.com" class="social-link">
                  <i class="fa-solid fa-envelope"></i></a></li>
              </ul>
            </div>
          </div>
          
          
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4">
              <img src="..\assets\images\kalindu.jpg" alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm team-member-image">
              <h5 class="mb-0">Kalindu Indupura</h5>
              <span class="small text-uppercase text-muted">Content manager</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="https://www.facebook.com/kalindu.indupura?mibextid=ZbWKwL5" class="social-link">
                  <i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/in/kalindu-indupura-a365341ba" class="social-link">
                  <i class="fa-brands fa-linkedin-in"></i></a></li>
                <li class="list-inline-item"><a href="https://github.com/Kalindu00" class="social-link">
                  <i class="fa-brands fa-github"></i></a></li>
                <li class="list-inline-item"><a href="mailto:kalinduindupura@gmail.com" class="social-link">
                  <i class="fa-solid fa-envelope"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4">
              <img src="..\assets\images\heshara.jpeg" alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm team-member-image">
              <h5 class="mb-0">Heshara Dananjalee</h5>
              <span class="small text-uppercase text-muted">Lead designer</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100079025905295&mibextid=ZbWKwL" class="social-link">
                  <i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/in/heshara-dananjanee-760247200" class="social-link">
                  <i class="fa-brands fa-linkedin-in"></i></a></li>
                <li class="list-inline-item"><a href="https://github.com/heshara2000" class="social-link">
                  <i class="fa-brands fa-github"></i></a></li>
                <li class="list-inline-item"><a href="mailto:hesharadananjanee@gmail.com" class="social-link">
                  <i class="fa-solid fa-envelope"></i></a></li>
              </ul>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4">
              <img src="../assets/images/eranga.jpg" alt="" class="img-thumbnail rounded-circle mb-3 img-thumbnail shadow-sm team-member-image">
              <h5 class="mb-0">Eranga Harshani</h5>
              <span class="small text-uppercase text-muted">Developer/Quality Assurance</span>
              <ul class="social mb-0 list-inline mt-3">
                <li class="list-inline-item"><a href="https://web.facebook.com/harshi.herath.716" class="social-link">
                  <i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/in/eranga-harshani-023396235/" class="social-link">
                  <i class="fa-brands fa-linkedin-in"></i></a></li>
                <li class="list-inline-item"><a href="https://github.com/harshani2000" class="social-link">
                  <i class="fa-brands fa-github"></i></a></li>
                <li class="list-inline-item"><a href="mailto:kushangayantha001@gmail.com" class="social-link">
                  <i class="fa-solid fa-envelope"></i></a></li>
              </ul>
            </div>
          </div>
          
          
        </div>
        </div>
      </div>
    </div>
  </section>

  <?php include_once '../includes/footer.php'?>
  <?php include '../includes/scripts.php'?>
</body>
</html>