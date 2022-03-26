<?php 

require_once("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/detail_product.css">

  <title></title>
</head>

<style>

</style>

<body>

  <header>
        <div class="head--left">
            <!-- LOGO -->
            <img src='./img/nk.jpg ' alt="LOGO">
        </div>
         
        <div class="head--right">
            <div class="head--right up">
                    <div class="socialmedia">
                        <nav >
                            <a href="">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="">
                                <i class="bi bi-twitch"></i>
                            </a>
                            <a href="">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </nav>
                    </div>
                    <div class="login-register">
                        <nav>
                            <a href="./login.php">Login</a>
                            <a href="./register.php">Register</a>
                        </nav>
                    </div>
            </div>

            <div class="head--right down">
                <nav class="navbar">
                    <a href="./index.php">Home</a>
                    <a href="All-Product.php">All product</a>

                    <div class="dropdown">
                        <button class="dropbtn">Clothing</button>
                        <div class="dropdown-content">
                        <a href="#">Man</a>
                        <a href="#">Woman</a>
                        <a href="#">Unisex</a>
                        </div>
                      </div>

                    <div class="dropdown">
                        <button class="dropbtn">Sneaker</button>
                        <div class="dropdown-content">
                        <a href="#">Vans</a>
                        <a href="#">Nike</a>
                        <a href="#">Adidas</a>
                        <a href="#">Converse</a>
                        </div>
                      </div>
                    
                    <a href="">Accessories</a>
                    <a href="">About us</a>
                    <a href="adding.php">Adding</a>
                </nav>
            </div>
        </div>
  </header>

  <div class="container">  
    <?php 
      $id=$_GET["id"];
      $sql="SELECT * FROM clothing WHERE clothing_id={$id} ";
      $result= mysqli_query($connect,$sql);
      while ($row=mysqli_fetch_assoc($result)) {
      ?>
        <div class="img_products" >
            <img src="img/<?php echo $row['clothing_image']?>" >
          </div>
          <div class="details">
            <h2 class="name_product"><?php echo $row['clothing_name'] ?></h2>
            <p class="prices"> Price: <?php echo number_format($row['clothing_price'])." VND"; ?></p>   
            <br>
            <div class="line"></div>
            <h3>
              Infor Product:
            </h3>               
            <p><?php echo $row["clothing_description"]; ?></p>
            <br>
            <div class="line"></div>
            <br>
            <form method="POST" action="cart.php"> 
                <label for="">Quantity:</label>
                <input type="number" name="sl" value="1" min="1" max="100">

                <label for="">Size:</label>
                <select class="form-select form-select-m mb-3" aria-label=".form-select-lg example">
          
                  <option value="1">S</option>
                  <option value="2">M</option>
                  <option value="3">L</option>
                  <option value="4">XL</option>
                </select>
                
                <br>
                <input type="hidden" name="id" value="<?=$id?>">
                <button type="submit" name="button-buy" class="btn btn-outline-primary"><i class="bi bi-cart"></i>  Add to cart</button>
              </form>
          </div>       

          <?php
        }
        ?>
  </div>
  <br>   <br>   <br>   <br>   <br>

  <div class="ramdom">
    <section>Can you be interested in ?</section>
        <div class="ramdom sales-up">
            <?PHP 
                    include("connect.php");
                    $sql = "SELECT * FROM clothing ORDER BY RAND ( ) LIMIT 4 ";
                    $result = mysqli_query($connect, $sql);

                    //tìm và trả về kết quả dưới dạng 1 mảng
                    // dùng mysql_fetch_array or mysql_fetch_assoc

                    while($row =mysqli_fetch_array($result)){
                        // lấy dữ liệu từ các dòng truy vấn được trong CSDL ra
                        $clothing_id = $row['clothing_id'];
                        $clothing_name = $row['clothing_name'];
                        $clothing_price =$row['clothing_price'];
                        $clothing_image =$row['clothing_image'];
                        $clothing_description = $row['clothing_description'];

                        echo" <div class='single_clothing'>
                            <a href='detail_product.php?id=$clothing_id'>
                            <img src='img/$clothing_image' />
                            <h4> $clothing_name </h4>
                            <p> Price : $clothing_price VND </p>
                            </a>
                            </div>
                            ";
                        }     
                        // remove clothing_des and button cart
                ?>
        </div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>