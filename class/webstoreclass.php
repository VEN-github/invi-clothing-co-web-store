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
    if (isset($_POST["login"])) {
      $email = $_POST["email"];
      $password = md5($_POST["password"]);

      $connection = $this->openConnection();
      $stmt = $connection->prepare(
        "SELECT * FROM account_table WHERE email = ? AND password = ?"
      );
      $stmt->execute([$email, $password]);
      $row = $stmt->fetch();
      $count = $stmt->rowCount();

      if ($count > 0) {
        $this->set_userdata($row);
        if (isset($_SESSION["userdata"])) {
          if ($_SESSION["userdata"]["access"] != "admin") {
            header("Location: index.php");
          } else {
            header("Location: dashboard.php");
          }
        }
      } else {
        header("Location: login.php?error=Invalid Email Address or Password.");
      }
    }
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

  // set user data
  public function set_userdata($array)
  {
    if (!isset($_SESSION)) {
      session_start();
    }

    $_SESSION["userdata"] = [
      "ID" => $array["ID"],
      "firstName" => $array["firstName"],
      "lastName" => $array["lastName"],
      "email" => $array["email"],
      "access" => $array["access"],
    ];

    return $_SESSION["userdata"];
  }

  // get user data
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

  // for profile page
  public function setProfile()
  {
    $ID = $_GET["ID"];
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT * FROM account_table WHERE ID = '$ID'"
    );
    $stmt->execute();
    $user = $stmt->fetch();
    $userCount = $stmt->rowCount();

    if ($userCount > 0) {
      return $user;
    } else {
      return $this->show_404();
    }
  }

  // update user profile
  public function update_userdata()
  {
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
      $row = $stmt->fetch();

      return $row;

      header("Location: profile.php");
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
      $coverPhoto = $_FILES["coverPhoto"]["name"];
      $productImage1 = $_FILES["productImage1"]["name"];
      $productImage2 = $_FILES["productImage2"]["name"];
      $productImage3 = $_FILES["productImage3"]["name"];
      // $minStocks = $_POST["minStocks"];

      // check image if already exists
      if (
        file_exists("assets/img/" . $_FILES["coverPhoto"]["name"]) &&
        file_exists("assets/img/" . $_FILES["productImage1"]["name"]) &&
        file_exists("assets/img/" . $_FILES["productImage2"]["name"]) &&
        file_exists("assets/img/" . $_FILES["productImage3"]["name"])
      ) {
        echo "Image Already Exists";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO product_table (`productName` , `productDescription` , `categoryID` , `productPrice` , `productColor`, `coverPhoto`, `productImage1`, `productImage2`, productImage3) VALUES (?,?,?,?,?,?,?,?,?)"
        );
        $stmt->execute([
          $productName,
          $productDescription,
          $optionCategory,
          $productPrice,
          $productColor,
          $coverPhoto,
          $productImage1,
          $productImage2,
          $productImage3,
          // $minStocks,
        ]);
        // move uploaded image in the image folder
        move_uploaded_file(
          $_FILES["coverPhoto"]["tmp_name"],
          "assets/img/" . $_FILES["coverPhoto"]["name"]
        );
        move_uploaded_file(
          $_FILES["productImage1"]["tmp_name"],
          "assets/img/" . $_FILES["productImage1"]["name"]
        );
        move_uploaded_file(
          $_FILES["productImage2"]["tmp_name"],
          "assets/img/" . $_FILES["productImage2"]["name"]
        );
        move_uploaded_file(
          $_FILES["productImage3"]["tmp_name"],
          "assets/img/" . $_FILES["productImage3"]["name"]
        );

        header("Location: addstocks.php");

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
  // delete products
  public function delete_products()
  {
    if (isset($_POST["cancel"])) {
      $ID = $_POST["productID"];
      $connection = $this->openConnection();
      $stmt = $connection->prepare(
        "DELETE FROM product_table WHERE ID = '$ID'"
      );
      $stmt->execute();

      header("Location: products.php");
    }
  }

  //get product id for variation
  public function get_productID()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT ID FROM product_table ORDER BY ID DESC"
    );
    $stmt->execute();
    $product = $stmt->fetch();
    return $product;
  }

  // add product sizes and stocks
  public function add_stocks()
  {
    if (isset($_POST["addStocksBtn"])) {
      $count = count($_POST["countRow"]);
      $productID = $_POST["productID"];

      if (empty($count)) {
        $sizes = $_POST["sizes"];
        $stocks = $_POST["stocks"];
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO stocks_table ( `productID`, `sizes` , `stocks`) VALUES (?,?,?)"
        );
        $stmt->execute([$productID, $sizes, $stocks]);
      } else {
        for ($i = 0; $i < $count; $i++) {
          $sizes = $_POST["sizes"][$i];
          $stocks = $_POST["stocks"][$i];
          $connection = $this->openConnection();
          $stmt = $connection->prepare(
            "INSERT INTO stocks_table ( `productID`, `sizes` , `stocks`) VALUES (?,?,?)"
          );
          $stmt->execute([$productID, $sizes, $stocks]);
        }
      }
      header("Location: products.php");
    }
  }

  // show 404 page
  public function show_404()
  {
    http_response_code(404);
    header("Location: 404.php");
    die();
  }

  // display all products
  public function get_products()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT product_table.ID, product_table.productName, category_table.categoryName, product_table.productPrice, product_table.productColor, product_table.coverPhoto, product_table.productImage1, product_table.productImage2,product_table.productImage3, GROUP_CONCAT(sizes SEPARATOR '<br>' ) AS sizes, GROUP_CONCAT(stocks SEPARATOR '<br>') AS stocks FROM product_table LEFT JOIN category_table ON product_table.categoryID = category_table.ID LEFT JOIN stocks_table ON product_table.ID = stocks_table.productID GROUP BY (product_table.ID)"
    );
    $stmt->execute();
    $products = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $products;
    } else {
      return false;
    }
  }

  // display random products
  public function get_random_products()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT * FROM product_table ORDER BY RAND() LIMIT 3"
    );
    $stmt->execute();
    $randomProducts = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $randomProducts;
    } else {
      return false;
    }
  }

  //display single product
  public function get_singleproduct($ID)
  {
    $connection = $this->openConnection();
    // $stmt = $connection->prepare("SELECT * FROM product_table WHERE ID = ?");
    $stmt = $connection->prepare(
      "SELECT product.ID, productName, productDescription, categoryName, productPrice, productColor, coverPhoto, productImage1, productImage2, productImage3 FROM (SELECT * FROM product_table WHERE product_table.ID = ?) product LEFT JOIN category_table category ON product.categoryID = category.categoryName"
    );
    $stmt->execute([$ID]);
    $product = $stmt->fetch();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $product;
    } else {
      return $this->show_404();
    }
  }

  //display product sizes and stocks
  public function view_all_stocks($productID)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT * FROM stocks_table WHERE productID = ?"
    );
    $stmt->execute([$productID]);
    $stocks = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $stocks;
    } else {
      return false;
    }
  }

  public function checkout()
  {
    if (isset($_POST["checkout"])) {
      if (isset($_SESSION["userdata"])) {
        $ID = $_SESSION["userdata"]["ID"];
        header("Location: checkoutInfo.php?ID=$ID");
      } else {
        header("Location: login.php");
      }
    }
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
}
$store = new WebStore();
?>
