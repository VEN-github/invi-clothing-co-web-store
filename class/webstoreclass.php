<?php
class WebStore
{
  // Database
  private $server = "mysql:host=localhost;dbname=invi-clothing_database;port=3307";
  private $user = "root";
  private $pass = "";
  private $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ];
  protected $con;

  public function openConnection()
  {
    try {
      $this->con = new PDO(
        $this->server,
        $this->user,
        $this->pass,
        $this->options
      );
      return $this->con;
    } catch (PDOException $e) {
      echo "There is some problem in the connection :" . $e->getMessage();
    }
  }

  public function closeConnection()
  {
    $this->con = null;
  }

  // login
  public function login()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    if (isset($_POST["login"])) {
      $email = $_POST["email"];
      $password = md5($_POST["password"]);

      $connection = $this->openConnection();
      $stmt = $connection->prepare(
        "SELECT * FROM account_table WHERE email = ? AND password = ?"
      );
      $stmt->execute([$email, $password]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $count = $stmt->rowCount();

      if ($count > 0) {
        $this->set_userdata($row);
        header("Location: index.php");
      } else {
        header("Location: login.php?error=Invalid Email Address or Password.");
      }
    }
  }
  // check email if already exists
  public function checkEmail($email)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM account_table WHERE email = ?");
    $stmt->execute([$email]);
    $count = $stmt->rowCount();
    return $count;
  }
  // user sign up
  public function signup()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    if (isset($_POST["signup"])) {
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $password = md5($_POST["password"]);
      $access = $_POST["access"];

      if ($this->checkEmail($email) == 0) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO account_table (`firstName`, `lastName`, `email`, `password`, `access`) VALUES (?,?,?,?,?)"
        );
        $stmt->execute([$firstName, $lastName, $email, $password, $access]);
        header("Location: login.php");
      } else {
        header("Location: signup.php?emailError=Email Already Exists");
      }
    }
  }
  //admin sign up
  public function signup_admin()
  {
    if (isset($_POST["registerBtn"])) {
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $contactNumber = $_POST["contactNumber"];
      $password = md5($_POST["password"]);
      $access = $_POST["access"];

      if ($this->checkEmail($email) == 0) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO account_table (`firstName` , `lastName` , `email` , `password` , `contactNumber` , `access`) VALUES (?,?,?,?,?,?)"
        );
        $stmt->execute([
          $firstName,
          $lastName,
          $email,
          $password,
          $contactNumber,
          $access,
        ]);
        header("Location: admin.php");
      } else {
        echo "Email Already Exists";
      }
    }
  }
  // display admin
  public function get_admin()
  {
    $admin = "admin";
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT * FROM account_table WHERE access = '$admin'"
    );
    $stmt->execute();
    $admins = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $admins;
    } else {
      return false;
    }
  }
  // count admin
  public function count_admin()
  {
    $admin = "admin";
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT COUNT(ID) FROM account_table WHERE access = '$admin'"
    );
    $stmt->execute();
    $admins = $stmt->fetchColumn();
    return $admins;
  }
  // count user
  public function count_user()
  {
    $user = "user";
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT COUNT(ID) FROM account_table WHERE access = '$user'"
    );
    $stmt->execute();
    $users = $stmt->fetchColumn();
    return $users;
  }
  // count products
  public function count_product()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT COUNT(ID) FROM product_table ");
    $stmt->execute();
    $products = $stmt->fetchColumn();
    return $products;
  }
  // login form validation
  public function loginValidation()
  {
    function validate($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if (isset($_POST["email"]) && isset($_POST["password"])) {
      $email = validate($_POST["email"]);
      $password = validate($_POST["password"]);
      if (empty($email) && empty($password)) {
        header(
          "Location: login.php?error=Email Address and Password are required."
        );
        exit();
      } elseif (empty($password)) {
        header("Location: login.php?error=Password is required.");
        exit();
      } elseif (empty($email)) {
        header("Location: login.php?error=Email Address is required.");
        exit();
      }
    }
  }
  // set customer data
  public function set_userdata($array)
  {
    if (!isset($_SESSION)) {
      session_start();
    }

    $_SESSION["userdata"] = [
      "firstName" => $array["firstName"],
      "lastName" => $array["lastName"],
      "email" => $array["email"],
      "contactNumber" => $array["contactNumber"],
      "access" => $array["access"],
      "ID" => $array["ID"],
    ];

    return $_SESSION["userdata"];
  }
  // get customer data
  public function get_userdata()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    if (isset($_SESSION["userdata"])) {
      return $_SESSION["userdata"];
    } else {
      return null;
    }
  }
  // sign up form validation
  public function signupValidation()
  {
    if (
      isset($_POST["firstName"]) &&
      isset($_POST["lastName"]) &&
      isset($_POST["email"]) &&
      isset($_POST["password"]) &&
      isset($_POST["confirmPassword"])
    ) {
      function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $confirmPassword = $_POST["confirmPassword"];

      // Validate password strength
      // $uppercase = preg_match('@[A-Z]@', $password);
      // $lowercase = preg_match('@[a-z]@', $password);
      // $number    = preg_match('@[0-9]@', $password);
      // $specialChars = preg_match('@[^\w]@', $password);

      if (empty($firstName)) {
        header("Location: signup.php?firstNameError=First Name is required.");
        exit();
      } elseif (empty($lastName)) {
        header("Location: signup.php?lastNameError=Last Name is required.");
        exit();
      } elseif (empty($email)) {
        header("Location: signup.php?emailError=Email Address is required.");
        exit();
      } elseif (empty($password)) {
        header("Location: signup.php?passwordError=Password is required.");
        exit();
      } elseif (empty($confirmPassword)) {
        header(
          "Location: signup.php?confirmPasswordError=Confirm Password is required."
        );
        exit();
      } elseif (strlen($password) < 8) {
        header(
          "Location: signup.php?passwordError=Password must be at least 8 characters."
        );
        exit();
        // else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
        //     header("Location: signup.php?passwordError=Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
        //     exit();
      } elseif ($password !== $confirmPassword) {
        header(
          "Location: signup.php?confirmPasswordError=Password does not match."
        );
        exit();
      }
    }
  }
  // for profile page
  public function setProfile()
  {
    $ID = $_GET["ID"];
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT * FROM account_table WHERE ID = '$ID'"
    );
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $userCount = $stmt->rowCount();

    if ($userCount > 0) {
      return $user;
    } else {
      return 0;
    }
  }
  // update profile
  public function update_userdata()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    if (isset($_POST["update"])) {
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $contactNumber = $_POST["contactNumber"];

      $connection = $this->openConnection();
      $stmt = $connection->prepare(
        "UPDATE account_table SET `firstName` = ?, `lastName` = ?, `contactNumber` = ? WHERE email = '$email'"
      );
      $stmt->execute([$firstName, $lastName, $contactNumber]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $count = $stmt->rowCount();

      return $row;
      echo header("Location: profile.php");
    }
  }
  // delete account
  public function delete_userdata()
  {
    if (isset($_POST["delete"])) {
      $email = $_POST["email"];
      $connection = $this->openConnection();
      $stmt = $connection->prepare(
        "DELETE FROM account_table WHERE email = '$email'"
      );
      $stmt->execute();

      header("Location: index.php");
      $this->logout();
    }
  }
  // logout
  public function logout()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    $_SESSION["userdata"] = null;
    unset($_SESSION["userdata"]);
  }
  // add product category
  public function add_category()
  {
    if (isset($_POST["categoryBtn"])) {
      $productCategory = $_POST["productCategory"];

      $connection = $this->openConnection();
      $stmt = $connection->prepare(
        "INSERT INTO category_table (`categoryName`) VALUES (?)"
      );
      $stmt->execute([$productCategory]);
      header("Location: addproduct.php");
    }
  }
  // display product categories
  public function get_categories()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM category_table");
    $stmt->execute();
    $categories = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $categories;
    } else {
      return false;
    }
  }
  // check product if already exists
  // public function checkProduct($product_name){
  //     $connection = $this->openConnection();
  //     $stmt = $connection->prepare("SELECT LOWER('productName') FROM product_table WHERE productName = ?");
  //     $stmt->execute([strtolower($product_name)]);
  //     $count = $stmt->rowCount();
  //     return $count;
  // }
  // add products
  public function add_products()
  {
    if (isset($_POST["addProductBtn"])) {
      $productName = $_POST["productName"];
      $productDescription = $_POST["productDescription"];
      $optionCategory = $_POST["categoryID"];
      $productPrice = $_POST["productPrice"];
      $productColor = $_POST["productColor"];
      $productImage = $_FILES["productImage"]["name"];
      $productStocks = $_POST["productStocks"];

      // check image if already exists
      if (file_exists("assets/img/" . $_FILES["productImage"]["name"])) {
        echo "Image Already Exists";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO product_table (`productName` , `productDescription` , `categoryID` , `productPrice` , `productColor` , `productImage`, `stocks`) VALUES (?,?,?,?,?,?, ?)"
        );
        $stmt->execute([
          $productName,
          $productDescription,
          $optionCategory,
          $productPrice,
          $productColor,
          $productImage,
          $productStocks,
        ]);

        // move uploaded image in the image folder
        move_uploaded_file(
          $_FILES["productImage"]["tmp_name"],
          "assets/img/" . $_FILES["productImage"]["name"]
        );

        header("Location: products.php");
        // if($this->checkProduct($productName) == 0){
        //     $connection = $this->openConnection();
        //     $stmt = $connection->prepare("INSERT INTO product_table (`productName` , `productDescription` , `categoryID` , `productPrice` , `productColor` , `productImage`) VALUES (?,?,?,?,?,?)");
        //     $stmt->execute([$productName, $productDescription, $optionCategory, $productPrice, $productColor, $productImage]);

        //     move_uploaded_file($_FILES['productImage']['tmp_name'], "assets/img/".$_FILES['productImage']['name']);
        //     header("Location: addvariation.php");
        // }else{
        //     echo 'Product Already Exists';
        // header("Location: addproduct.php?productError=Product Already Exists.");
        // }
      }
    }
  }
  //get product id for variation
  // public function get_productID(){
  //     $connection = $this->openConnection();
  //     $stmt = $connection->prepare("SELECT ID FROM product_table ORDER BY ID DESC");
  //     $stmt->execute();
  //     $product = $stmt->fetch();
  //     return $product;
  // }
  // add product variation and stocks
  // public function add_variations(){
  //     if(isset($_POST['addStocksBtn'])){
  //         $count = count($_POST['countRow']);
  //         $productID = $_POST['productID'];

  //         for($i = 0; $i < $count; $i++){
  //             $breakdown = $_POST['breakdown'][$i];
  //             $stock = $_POST['stock'][$i];
  //             $connection = $this->openConnection();
  //             $stmt = $connection->prepare("INSERT INTO variation_table ( `productID`, `breakdown` , `stock`) VALUES (?,?,?)");
  //             $stmt->execute([$productID,$breakdown, $stock]);
  //         }
  //         header("Location: products.php");
  //     }
  // }
  // display products
  public function get_products()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT product_table.ID, product_table.productName, product_table.productDescription, category_table.categoryName, product_table.productPrice, product_table.productColor, product_table.productImage, product_table.stocks FROM product_table INNER JOIN category_table ON product_table.categoryID = category_table.ID "
    );
    // $stmt = $connection->prepare("SELECT productName, productDescription, categoryName, productPrice, productColor, productImage, GROUP_CONCAT(breakdown SEPARATOR '<br>' ) AS breakdown, GROUP_CONCAT(stock SEPARATOR '<br>') AS stock FROM (SELECT * FROM product_table ) product LEFT JOIN category_table category ON product.ID = category.ID LEFT JOIN variation_table variation ON product.ID = variation.productID GROUP BY (product.ID) ");
    $stmt->execute();
    $products = $stmt->fetchall();

    return $products;
  }
  // add to cart
  public function add_cart()
  {
    if (isset($_POST["addCart"])) {
      $productID = $_POST["productID"];
      $productImage = $_POST["productImage"];
      $productName = $_POST["productName"];
      $productColor = $_POST["productColor"];
      $productPrice = $_POST["productPrice"];
      $quantity = $_POST["quantity"];
      $subtotal = $_POST["productPrice"] * $_POST["quantity"];

      $connection = $this->openConnection();
      $stmt = $connection->prepare(
        "INSERT INTO cart_table (`productID`, `itemImage`, `itemName`, `itemColor`, `itemPrice`, `itemQty`, `subtotal`) VALUES (?,?,?,?,?,?,?)"
      );
      $stmt->execute([
        $productID,
        $productImage,
        $productName,
        $productColor,
        $productPrice,
        $quantity,
        $subtotal,
      ]);

      if (isset($_SESSION["cart"])) {
        $itemID = array_column($_SESSION["cart"], "productID");

        if (in_array($_POST["productID"], $itemID)) {
          echo "<script>alert('Product Already in the Cart')</script>";
          echo "<script>window.location='index.php'</script>";
        } else {
          $count = count($_SESSION["cart"]);
          $item = ["productID" => $_POST["productID"]];

          $_SESSION["cart"][$count] = $item;
          // print_r($_SESSION['cart']);
        }
      } else {
        $item = ["productID" => $_POST["productID"]];

        $_SESSION["cart"][0] = $item;
        // print_r($_SESSION['cart']);
      }
    }
  }
  // cart page
  public function cartElement(
    $productImage,
    $productName,
    $productColor,
    $productPrice,
    $stock,
    $productID,
    $quantity,
    $subtotal
  ) {
    $element = "<form action = \"cart.php?action=remove&ID=$productID\" method=\"post\" id=\"cartForm\"></form>
            <form action = \"checkoutInfo.php\" method=\"post\" name=\"checkoutForm\" id=\"checkoutForm\"></form>
            <div class=\"cart-items\">
                <input type=\"hidden\" name=\"productID\" value=\"$productID\" form=\"checkoutForm\">
                <img src=\"./assets/img/$productImage\" alt=\"$productImage\" />
                <input type=\"hidden\" name=\"productImage\" value=\"$productImage\" form=\"checkoutForm\">
                <div class=\"item-label\">
                    <p class=\"item-name\">$productName <input type=\"hidden\" name=\"productName\" value=\"$productName\" form=\"checkoutForm\"></p>
                    <p>Color: $productColor <input type=\"hidden\" name=\"productColor\" value=\"$productColor\" form=\"checkoutForm\"></p>
                    <!-- <p>Size: Medium</p> -->
                </div>
                <div class=\"item-price\">
                    <span
                        class=\"iconify peso-sign\"
                        data-icon=\"clarity:peso-line\"
                        data-inline=\"false\"
                    ></span>
                    <p>$productPrice.00<input type=\"hidden\" name=\"productPrice\" id=\"price\" value=\"$productPrice\" form=\"checkoutForm\"></p>
                </div>
                <div class=\"item-quantity\">
                    <!-- <button type=\"button\" class=\"minus-btn\">-</button> -->
                    <input
                        class=\"cart-qty-input\"
                        type=\"number\"
                        name=\"quantity\"
                        id=\"quantity\"          
                        value=\"$quantity\"
                        min=\"1\"
                        max=\"$stock\"
                        form=\"checkoutForm\"
                    />
                    <!-- <button type=\"button\" class=\"plus-btn\">+</button> -->
                </div>
                <div class=\"item-total\">
                    <span
                        class=\"iconify peso-sign\"
                        data-icon=\"clarity:peso-line\"
                        data-inline=\"false\"
                    ></span>
                    <p id=\"total-price\">$subtotal</p>
                    <p>.00</p>
                    <input type=\"hidden\" name=\"subtotal\" id=\"cart-subtotal\" value=\"$subtotal\" form=\"checkoutForm\">
                </div>
                <button type = \"submit\" name = \"remove\" form=\"cartForm\">
                    <span
                        class=\"iconify del-icon\"
                        data-icon=\"carbon:trash-can\"
                        data-inline=\"false\"
                    ></span>
                </button>
            </div>";
    echo $element;
  }
  // checkout page
  public function checkoutElement(
    $productImage,
    $productName,
    $productColor,
    $productPrice,
    $productID,
    $quantity,
    $subtotal,
    $cartID
  ) {
    $element = "<div class=\"order-items\">
            <img src=\"./assets/img/$productImage\" alt=\"$productImage\" />
            <div class=\"item-label\">
                <p class=\"item-name\">$productName</p>
                <p>Color: $productColor</p>
                <!-- <p>Size: Medium</p> -->
                <p class=\"price-container\">
                    <span
                        class=\"iconify peso-sign\"
                        data-icon=\"clarity:peso-line\"
                        data-inline=\"false\"
                    ></span>
                    <span class=\"price\">$productPrice.00</span>
                    <span class=\"qty\">x $quantity</span>
                </p>
            </div>
        </div>";
    echo $element;
  }
  //display product size and corresponding stock
  // public function get_stock(){
  //     $connection = $this->openConnection();
  // $stmt = $connection->prepare("SELECT productID, breakdown, stock FROM variation_table GROUP BY breakdown ORDER BY productID ASC");
  //     $stmt = $connection->prepare("SELECT productName, productID, productDescription, categoryName, productPrice, productColor, productImage, breakdown, stock FROM (SELECT * FROM product_table ) product LEFT JOIN category_table category ON product.ID = category.ID LEFT JOIN variation_table variation ON product.ID = variation.productID GROUP BY (product.ID) ");
  //     $stmt->execute();
  //     $stock = $stmt->fetchall();

  //     return $stock;
  // }

  //display single product
  // public function get_singleproduct($ID){
  //     $connection = $this->openConnection();
  //     $stmt = $connection->prepare("SELECT * FROM product_table WHERE ID = ?");
  //     $stmt->execute([$ID]);
  //     $product = $stmt->fetch();
  //     $count = $stmt->rowCount();

  //     if($count > 0){
  //         return $product;
  //     }else{
  //         return FALSE;
  //     }
  // }
}
$store = new WebStore();
?>
