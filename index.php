<?php
  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $dbname = "shop";
  $servername = "db4free.net";
  $username = "hongly123";
  $password = "hongly123";
  $dbname = "hongly_shop";
    
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // Product
  $sql_product = "select * from products natural join assets";
  $product = $conn->query($sql_product);
  //Feature
  $sql_feature = "select * from features";
  $features = $conn->query($sql_feature);
  //Category
  $sql_category = "select * from categories";
  $category = $conn->query($sql_category);
  //Select Category
  if(isset($_POST['category'])){
    $cate = $_POST['category'];

    $category_section = "select* from products natural join assets where category_id = {$cate};";
    $product = $conn->query($category_section);
  }
  
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/style.js"></script>

</head>
<body>

  <!-- Navigation Bar -->

  <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="index.php"><b>Awesome</b> <span class="text-success"><b>Shop</b></span></a>
      <div class="form-inline">
        <img src="/IPassignment1/assets/icon/questionMark.png" alt="questionMark" height="15px" width="15px">
        <a href="" id="link1">&nbsp; Need help &nbsp; &nbsp;</a>
        <a href=""><button class="btn btn-success my-2 my-sm-0" type="submit">Join</button></a>
      </div>
  </nav>
  
  <!-- feature -->
  <?php  while($row4 = $features->fetch_assoc()) { ?>

        <div class="feature">
            <img src="<?php echo $row4["image"];?>" alt="..." width="100%">
            <div class="search_box"><input class="btn-light searching" type="text" name="" id="input_text" placeholder="Searching..."></div>
            <div class="dercription_feature"><?php echo $row4["description"];?></div>
            <div class="name_feature"><h3><b><?php echo $row4["title"];?></b></h3></div>
        </div>
  <?php }?>
  <p class="spacing"></p>

  <!-- promotion -->

  <div class="container">
    <div class="row">
      <div class="col-md-4 ">
        <div class="promotion p-3 mb-2 bg-secondary text-white">
          <div class="text_promotion">
            <h3>Coupon Saving</h3><span>Up to 60% everthing essential</span>
          </div> <img src="/IPassignment1/assets/icon/coupon.png" alt="coupon" class="icon"><button class="B_promotion">Shop
            Coupons</button>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="promotion p-3 mb-2 bg-danger text-white">
          <div class="text_promotion">
            <h3>free Delivery</h3><span>With selected item</span>
          </div> <img src="/IPassignment1/assets/icon/car.png" alt="car" class="icon"><button class="B_promotion">Deliver Now</button>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="promotion p-3 mb-2 bg-primary text-white">
          <div class="text_promotion">
            <h3>Gift Voucher</h3><span>With personal card items</span>
          </div> <img src="/IPassignment1/assets/icon/gift.png" alt="gift" class="icon"><button class="B_promotion">Gift Now</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Category -->

  <p class="spacing" ></p>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
      <h4 id="cate"><b>Category List</b></h4>
      <hr>
      <?php while($row2 = $category->fetch_assoc()) { ?>
        <div>
          <ul class="CategoryUl">
            <li>
            <form action="" method="POST"  class="text_category">
                <input type="hidden" name="category" value="<?php echo $row2["id"];?>">
                <button type="submit" class="categoryButton">
                <img src="/IPassignment1/<?php echo $row2["icon"];?>" alt="..." class="CategoryIcon"><?php echo $row2["name"];?>
                </button>
            </form>
            </li>
          </ul>
        </div>
      <?php } ?>
      </div>
  

  <div class="col-md-9">
        <div class="row" id="search_product"> 
        <!-- products -->
        <?php include ("include/products.php");?>
        </div>
      </div>
    </div>
  </div> 
  <p class="space"></p>
  

</body>
</html>
