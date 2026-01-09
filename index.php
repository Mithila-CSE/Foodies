<?php include('./config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodies</title>

  <!-- STYLE CSS LINK -->
  <link rel="stylesheet" href="style.css">
  <!-- STYLE CSS LINK -->

  <!-- BOOTSTRAP CDN LINK -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- BOOTSTRAP CDN LINK -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


  <!-- FONT AWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- FONT AWESOME CDN -->



  <!-- GOOGLE FONTS LINK -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">
  <!-- GOOGLE FONTS LINK -->
</head>

<body>
  <nav class="navbar navbar-expand-lg " id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php" id="logo"><img src="./images/logo.png"
        alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span ><i class="fa-solid fa-bars" style="color:white"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#menu">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#order">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          
        </ul>
        <form method="POST" style="background-color: #eaeaea;" class="d-flex" action="#our-menu" >
          <input type="search" name="search" class="form-control me-2" placeholder="search" required>
          <button type="submit" name="search" value="Search" id="btn">Search</button>
         
        </form>
       
        
      </div>
      

    </div>
    
  </nav>
  <!-- Home Section Start -->
  <section class="home" id="home">
    <div class="home-content" data-aos="fade-right"
    data-aos-duration="1500" >
      <h3> Deliciously Effortless:<br> Unleash Your Taste Buds with <span><i>"Foodie's"</i></span> </h3><br>
      <p>
      <h5><i>Service excellence is not an option; it's a standard that should be upheld with pride and
          professionalism.</i></h5>
      </p><br>
      <a href="#our-menu" id="home-btn">Our Menu</a>
    </div>
    <div class="img" data-aos="zoom-in-up"
    data-aos-duration="1500">
      <img src="./images/img18.png" alt="">
    </div>
  </section>
  <!-- Home Section End -->

  <div class="container">
    <div class="line" style="width: 100%; height: 2px; background-color:#0c2c56;"></div>
  </div>

  <!-- Top Section Start -->
  <div class="top-section">
    <h5>WHAT WE SERVE</h5>
    <h3>"Your Favourite Food!!" </h3>
    <div class="row"  data-aos="fade-up"
    data-aos-duration="1500">
      <br>
      <div class="col-md-6 py-3 py-md-0">
        <div class="card">
          <img src="./images/img15.jpg" alt="">
          <div class="card-body">
            <h1>Easy To Order</h1>
            <p>You only need a few steps in <br> ordering food</p>
          </div>
        </div>
      </div>
      <br>

      <div class="col-md-6 py-3 py-md-0">
        <div class="card">
          <img src="./images/img16.jpg" alt="">
          <div class="card-body">
            <h1>Best Quality</h1>
            <p>Not only fast for us quality is also <br> number one</p>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Top Section End -->


  <div class="container">
    <div class="line" style="width: 100%; height: 2px; background-color:#0c2c56;"></div>
  </div>

  <!-- Our Menu Start -->
  <section class="menu" id="menu">
    <h3>Menu</h3>
    
    <h2>Delicious Dishes Is Here </h2>
   
     <div class="row" style="margin-top: 30px;" data-aos="fade-up"
    data-aos-duration="1500">
    <?php
     
    $sql="SELECT *FROM tbl_food WHERE active='Yes' AND featured='Yes'";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count>0)
     {
       while($row=mysqli_fetch_assoc($res))
       {
        $id=$row['id'];
        $title=$row['title'];
        $image_name=$row['image_name'];
        $price=$row['price'];
        $description=$row['description'];
        ?>
        
    <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <?php
           if($image_name=="")
           {
            echo "<div class='error'>Image not available</div>";
           }
           else{
            ?>
              <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="">
            <?php
           }
          ?>
          
          <div style="background-color: white;" class="card-body">
            <h4 style="background-color: white;"><?php echo $title; ?></h4>
            <h4 style="background-color: white;"><?php echo $description; ?></h4>
            <h4 style="background-color: white;"><?php echo $price; ?>Tk</h4>
            
          </div>
        </div>
      </div>
          
        <?php
       }

     }
    else{
          echo "<div class='error'>Menu not added</div>";
     }
    ?>
      


    </div>



    </div>
    
  </section>
  <!-- Our Menu End -->
  <?php
          if(isset($_SESSION['order']))
          {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
          }
          
         ?>




  <div class="container">
    <div class="line" style="width: 100%; height: 2px; background-color: #0c2c56;"></div>
  </div>




  <!-- Our Menu Start -->
  <section class="menu" id="our-menu">
    <h3>Our Menu</h3>
    
    <div class="row" style="margin-top: 30px;" data-aos="fade-up"
    data-aos-duration="1500">
    <?php
     $search= isset($_POST['search']);
    $sql="SELECT *FROM tbl_category WHERE title LIKE '%$search%'";
    $sql="SELECT *FROM tbl_category WHERE active='Yes' AND featured='Yes'";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count>0)
     {
       while($row=mysqli_fetch_assoc($res))
       {
        $id=$row['id'];
        $title=$row['title'];
        $image_name=$row['image_name'];
        ?>
        
    <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <?php
           if($image_name=="")
           {
            echo "<div class='error'>Image not available</div>";
           }
           else{
            ?>
              <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="">
            <?php
           }
          ?>
          
          <div style="background-color: white;" class="card-body">
            <h4 style="background-color: white;"><?php echo $title; ?></h4>
            
          </div>
        </div>
      </div>
          
        <?php
       }

     }
    else{
          echo "<div class='error'>Menu not added</div>";
     }
    ?>
    
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img src="./images/img10.jpg" alt="">
          <div style="background-color: white;" class="card-body">
            <h4 style="background-color: white;">Desert</h4>
            
          </div>
        </div>
      </div>
      <div class="col-md-3 py-3 py-md-0">
        <div class="card">
          <img src="./images/img11.jpg" alt="">
          <div style="background-color: white;" class="card-body">
            <h4 style="background-color: white;"> Rice Dishes</h4>
            
          </div>
        </div>
      </div>
      


    </div>

</div>
  </section>
  <!-- Our Menu End -->


  <div class="container">
    <div class="line" style="width: 100%; height: 2px; background-color:#0c2c56;"></div>
  </div>


  <!-- Ordre Section Start -->
  <section class="order" name ="order">
    <div class="heading">Order Your Food</div><br>
    
    <div class="row" data-aos="zoom-in-up"
    data-aos-duration="1500">
      <div class="col-md-5 py-3 py-md-0">
        <div class="card">
          <img src="./images/img14.jpg" alt="">
        </div>
      </div>
      <div class="col-md-7 py-3 py-md-0">
        <form action="" method="POST">

          <div class="mb-3 mt-3">
            <input type="text" class="form-control" name="full_name" placeholder="Enter Name" required>
          </div>

          <div class="mb-3 mt-3">
            <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
          </div>

          <div class="mb-3 mt-3">
            <input type="tel" class="form-control" name="contact" placeholder="Enter Phone Number" required>
          </div>
          <div class="mb-3 mt-3">
            <input type="number" class="form-control" name="qty" placeholder="Enter Quantity" required>
          </div>
          <div class="mb-3 mt-3">
            <input type="hidden" class="form-control" name="food" placeholder="Enter Food name" required>
          </div>
          <div class="mb-3 mt-3">
            <input type="hidden" class="form-control" name="price" placeholder="Enter Price" required>
          </div>
          <textarea class="form-control" id="comment" rows="5" name="address" placeholder="Enter Address"
            required></textarea>
            <button type="submit" class="order-btn">Order Now</button>
          


        </form>
        <?php
        if(isset($_POST['submit']))
        {
          $food=$_POST['food'];
          $price=$_POST['price'];
          $qty=$_POST['qty'];
          $total=$price * $qty;
          $order_date=date("Y-m-d:h:i:sa");
          $status="ordered";
          $customer_name=$_POST['full_name'];
          $customer_contact=$_POST['contact'];
          $customer_email=$_POST['email'];
          $customer_address=$_POST['address'];
          $sql2="INSERT INTO tbl_order SET
            food='$food',
            price=$price,
            qty=$qty,
            total=$total,
            order_date=$order_date,
            status='$status',
            customer_name='$customer_name',
            customer_contact='$customer_contact',
            customer__email='$customer_email',
            customer_address='$customer_address'
          ";

          $res2=mysqli_query($conn,$sql2);
          if($res2==true)
          {
              $_SESSION['order']="<div class='success'>Food ordered Succesfully</div>";
              header('location:'.SITEURL);
          }
          else{
            $_SESSION['order']="<div class='success'>failed to order</div>";
              header('location:'.SITEURL);

          }
          
        }
        ?>
      </div>

    </div>
  </section>
  <!-- Ordre Section End -->

  <div class="container">
    <div class="line" style="width: 100%; height: 2px; background-color:#0c2c56;"></div>
  </div>



  <!-- Review Section Start -->
  <section class="review" id="review">
    <div class="row">

      <div class="col-md-4 py-3 py-md-0">
        <div class="card">
          <img src="./images/img17.jpg" alt="">
        </div>
      </div>

      <div class="col-md-8 py-3 py-md-0" style="padding: 100px;">
        <h3>WHAT THEY SAY</h3>
        <h2>What Our Customers <br>Say About Us</h2>
        <p><i>"Exquisite flavors, culinary bliss, pure satisfaction in every delectable bite!!"</i></p>

        <h5><img src="./images/pic-2.png" alt="" width="60px"><a href="#">Tasnim Abhsal</a></h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo nemo libero magnam consequatur aliquam sunt assumenda voluptatum! Cupiditate fugit nemo nulla non maiores illum nam, magni, inventore eius nobis enim!</p>

      </div>

    </div>
  </section>
  <!-- Review Section End -->


  <div class="container">
    <div class="line" style="width: 100%; height: 2px; background-color:#0c2c56;"></div>
  </div>


  <!-- Contact Section Start -->
  <section class="contact" id="contact">
    <div class="heading">
      Contact us
    </div>
    <div class="row" data-aos="zoom-in-up"
    data-aos-duration="1500">
      <div class="col-md-5 py-3 py-md-0">
        <h3 style="background-color:  #0d4771;">Contact Info</h3>
        <p style="background-color:  #0d4771;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit nobis,
          modi alias suscipit molestiae amet!</p>
        <i style="background-color:  #0d4771;" class="fa-solid fa-phone"><span
            style="background-color: #0d4771;">+8801*********</span></i><br><br>
        <i style="background-color:  #0d4771;" class="fa-solid fa-envelope"><span
            style="background-color: #0d4771;">foodies@gmail.com</span></i><br><br>
        <i style="background-color:  #0d4771;" class="fa-solid fa-location-dot"><span
            style="background-color: #0d4771;">Foodie's <br><br>Bangladesh</span></i>
      </div>

      <div class="col-md-7 py-3 py-md-0">
        <form action="#">
          <div class="mb-3 mt-3">
            <input type="text" class="form-control" id="name" placeholder="Enter Name" required>
          </div>

          <div class="mb-3 mt-3">
            <input type="email" class="form-control" id="email" placeholder="Enter Email" required>
          </div>

          <div class="mb-3 mt-3">
            <input type="number" class="form-control" id="number" placeholder="Enter Number" required>
          </div>


          <textarea class="form-control" id="comment" rows="5" name="text" placeholder="Enter Address"
            required></textarea>
            <button type="submit" class="order-btn">Send</button>
            
        </form>
      </div>
    </div>

  </section>
  <!-- Contact Section End -->


  <div class="container">
    <div class="line" style="width: 100%; height: 2px; background-color:#0c2c56;"></div>
  </div>

  <!-- Footer Start -->
  <footer id="footer">
    <div class="f-content">
      <div class="f-logo"><img src="./images/logo.png" alt=""></div>
      <p>"Treat yourself to a delightful feast, effortlessly ordered and enjoyed!"</p>

      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-facebook-f"></i>
      <i class="fa-brands fa-youtube"></i>

    </div>
    <br>
    <div class="c-content">
      &copy; @copyright All Rights Reserved <br>

    </div>
  </footer>
  <a href="#" class="arrow"><i class="fa-solid fa-arrow-up" style="font-size: 30px;"></i></a>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- BOOTSTRAP CDN LINK -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <!-- BOOTSTRAP CDN LINK -->


</body>

</html>