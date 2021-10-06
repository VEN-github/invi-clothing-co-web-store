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
    $_SESSION["checkout"] = null;
    unset($_SESSION["userdata"]);
    unset($_SESSION["checkout"]);
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
      $pass = $_POST["password"];
      $confirmPassword = $_POST["confirmPassword"];
      $access = $_POST["access"];

      if (
        empty($firstName) ||
        empty($lastName) ||
        empty($email) ||
        empty($contactNumber) ||
        empty($password) ||
        empty($confirmPassword)
      ) {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Empty Field',
          text: 'Please input missing field',
        });
        </script>";
      } elseif ($pass !== $confirmPassword) {
        echo "<script> Swal.fire({
          icon: 'error',
          text: 'Password does not match.',
        });
        </script>";
      } elseif ($this->checkEmail($email) == 0) {
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
        echo "<script>  
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Admin Added',
          showConfirmButton: false,
          timer: 1000
        },function(){ window.location.href = 'admin.php';});
      </script>";
      } else {
        echo "<script> Swal.fire({
          icon: 'error',
          text: 'Email Already Exists.',
        });
        </script>";
      }
    }
  }

  // display admin
  public function get_admin()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT * FROM account_table WHERE access = 'admin'"
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

  // update admin
  public function update_admin()
  {
    if (isset($_POST["updateAdmin"])) {
      $adminID = $_POST["adminID"];
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $contactNumber = $_POST["contactNumber"];

      if (
        empty($firstName) ||
        empty($lastName) ||
        empty($email) ||
        empty($contactNumber)
      ) {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Empty Field',
          text: 'Please input missing field',
        });
        </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "UPDATE account_table SET `firstName` = ? , `lastName` = ? , `email` = ? , `contactNumber`= ?  WHERE ID = '$adminID'"
        );
        $stmt->execute([$firstName, $lastName, $email, $contactNumber]);
        $row = $stmt->fetch();
        echo "<script>  
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Admin Updated',
          showConfirmButton: false,
          timer: 1000
        },function(){ window.location.href = 'admin.php';});
      </script>";
        return $row;
      }
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
    if (isset($_POST["addCategory"])) {
      $productCategory = $_POST["categoryName"];

      if (empty($productCategory)) {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Empty Field',
          text: 'Please input missing field',
        });
        </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO category_table (`categoryName`) VALUES (?)"
        );
        $stmt->execute([$productCategory]);
        echo "<script>  
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Material Added',
          showConfirmButton: false,
          timer: 1000
        },function(){ window.location.href = 'addProduct.php';});
      </script>";
      }
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

  // add products
  public function add_products()
  {
    if (isset($_POST["addProduct"])) {
      if (isset($_POST["category"])) {
        $category = $_POST["category"];
      }
      $productName = $_POST["productName"];
      $productDescription = $_POST["productDescription"];
      $productColor = $_POST["productColor"];
      $coverPhoto = $_FILES["coverPhoto"]["name"];
      $image1 = $_FILES["image1"]["name"];
      $image2 = $_FILES["image2"]["name"];
      $image3 = $_FILES["image3"]["name"];
      $sizeGuide = $_FILES["sizeGuide"]["name"];
      if (
        empty(isset($_POST["category"])) ||
        empty($productName) ||
        empty($productDescription) ||
        empty($productColor) ||
        empty($coverPhoto)
      ) {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Empty Field',
          text: 'Please input missing field',
        });
        </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO product_table (`categoryID`, `productName`, `productDescription`, `productColor`, `coverPhoto`, `image1`, `image2`, `image3`, `sizeGuide`) VALUES (?,?,?,?,?,?,?,?,?)"
        );
        $stmt->execute([
          $category,
          $productName,
          $productDescription,
          $productColor,
          $coverPhoto,
          $image1,
          $image2,
          $image3,
          $sizeGuide,
        ]);
        move_uploaded_file(
          $_FILES["coverPhoto"]["tmp_name"],
          "assets/img/" . $coverPhoto
        );
        move_uploaded_file(
          $_FILES["image1"]["tmp_name"],
          "assets/img/" . $image1
        );
        move_uploaded_file(
          $_FILES["image2"]["tmp_name"],
          "assets/img/" . $image2
        );
        move_uploaded_file(
          $_FILES["image3"]["tmp_name"],
          "assets/img/" . $image3
        );
        move_uploaded_file(
          $_FILES["sizeGuide"]["tmp_name"],
          "assets/img/" . $sizeGuide
        );

        header("Location: products.php");
      }
    }
  }

  // add costing
  public function costing()
  {
    if (isset($_POST["finishProduct"])) {
      $raw = isset($_POST["raw"]);
      if (isset($_POST["materialID"])) {
        $count = count($_POST["materialID"]);
      }
      $netSales = $_POST["netSales"];
      $productCost = $_POST["productCost"];
      $netIncome = $_POST["netIncome"];
      $productID = $_POST["productID"];

      if (
        empty($raw) ||
        empty($netSales) ||
        empty($productCost) ||
        empty($netIncome)
      ) {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Empty Field',
          text: 'Please input missing field',
        });
        </script>";
      } else {
        $count = count($_POST["materialID"]);
        for ($i = 0; $i < $count; $i++) {
          $materialID = $_POST["materialID"][$i];
          $materialQty = $_POST["qty"][$i];
          $connection = $this->openConnection();
          $stmt = $connection->prepare(
            "INSERT INTO costing_table ( `productID`, `materialID`, `materialQty`, `netSales`, `productCost`, `netIncome`) VALUES (?,?,?,?,?,?)"
          );
          $stmt->execute([
            $productID,
            $materialID,
            $materialQty,
            $netSales,
            $productCost,
            $netIncome,
          ]);
        }
        header("Location: products.php");
      }
    }
  }

  //display single product ID
  public function get_singleID($ID)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM product_table WHERE ID = ?");
    $stmt->execute([$ID]);
    $product = $stmt->fetch();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $product;
    } else {
      return $this->show_dashboard404();
    }
  }

  // add stock qty
  public function stock_in()
  {
    if (isset($_POST["addStock"])) {
      $productID = $_POST["productID"];
      $wholeStock = $_POST["wholeStock"];
      $noSize = $_POST["noSize"];

      if (empty($noSize)) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO stocks_table ( `productID`, `stock`) VALUES (?,?)"
        );
        $stmt->execute([$productID, $wholeStock]);
      } else {
        $count = count($_POST["size"]);
        for ($i = 0; $i < $count; $i++) {
          $size = $_POST["size"][$i];
          $stock = $_POST["stocks"][$i];
          $connection = $this->openConnection();
          $stmt = $connection->prepare(
            "INSERT INTO stocks_table ( `productID`, `size`, `stock`) VALUES (?,?,?)"
          );
          $stmt->execute([$productID, $size, $stock]);
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

  // show 404 page in dashboard
  public function show_dashboard404()
  {
    http_response_code(404);
    header("Location: dashboard404.php");
    die();
  }

  // display all products
  public function get_products()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT product.ID, productName, categoryName, productColor, coverPhoto, netSales, productCost, netIncome FROM (SELECT * FROM product_table) product LEFT JOIN category_table category ON product.categoryID = category.ID LEFT JOIN costing_table costing ON product.ID = costing.productID GROUP BY product.ID"
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
      "SELECT product.ID, productName, productColor, coverPhoto, netSales FROM (SELECT * FROM product_table) product LEFT JOIN costing_table costing ON product.ID = costing.productID GROUP BY product.ID ORDER BY RAND() LIMIT 3"
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
    $stmt = $connection->prepare(
      "SELECT product.ID, productName, productDescription, categoryName, netSales, productColor, coverPhoto, image1, image2, image3, sizeGuide FROM (SELECT * FROM product_table WHERE product_table.ID = ?) product LEFT JOIN category_table category ON product.categoryID = category.ID LEFT JOIN costing_table costing ON product.ID = costing.productID"
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

  //display product sizes and stocks every single product
  public function view_single_stock($productID)
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

  //display product sizes and stocks
  public function view_all_stocks($productID)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT GROUP_CONCAT(size SEPARATOR '<br>') as size, GROUP_CONCAT(stock SEPARATOR '<br>') as stock, SUM(stock) as totalStocks FROM stocks_table WHERE productID = ? GROUP BY productID"
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

  // check if the customer signed in or not before checkout
  public function checkout()
  {
    if (isset($_POST["checkout"])) {
      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION["checkout"] = null;
      unset($_SESSION["checkout"]);
      if (isset($_SESSION["userdata"])) {
        $ID = $_SESSION["userdata"]["ID"];
        header("Location: checkoutInfo.php?ID=$ID");
      } else {
        header("Location: login.php");
      }
    }
  }

  // list of regions
  public function region()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM provinces");
    $stmt->execute();
    $regions = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $regions;
    } else {
      return false;
    }
  }

  // checkout process
  public function checkout_process()
  {
    if (isset($_POST["proceedShip"])) {
      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION["checkout"]["method"] = null;
      $_SESSION["checkout"]["sf"] = null;
      unset($_SESSION["checkout"]["method"]);
      unset($_SESSION["checkout"]["sf"]);
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $address1 = $_POST["address1"];
      $address2 = $_POST["address2"];
      $city = $_POST["city"];
      $postalCode = $_POST["postalCode"];
      if (isset($_POST["region"])) {
        $region = $_POST["region"];
      }
      if (isset($_POST["country"])) {
        $country = $_POST["country"];
      }
      $phoneNumber = $_POST["phoneNumber"];
      if (isset($_POST["primaryAddress"])) {
        $primaryAddress = $_POST["primaryAddress"];
      }
      if (
        empty($firstName) ||
        empty($lastName) ||
        empty($address1) ||
        empty($city) ||
        empty($postalCode) ||
        empty(isset($_POST["region"])) ||
        empty(isset($_POST["country"])) ||
        empty($phoneNumber)
      ) {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Empty Field',
          text: 'Please input missing field',
        });
        </script>";
      } else {
        $_SESSION["checkout"]["firstName"] = $firstName;
        $_SESSION["checkout"]["lastName"] = $lastName;
        $_SESSION["checkout"]["address1"] = $address1;
        $_SESSION["checkout"]["address2"] = $address2;
        $_SESSION["checkout"]["city"] = $city;
        $_SESSION["checkout"]["postalCode"] = $postalCode;
        $_SESSION["checkout"]["region"] = $region;
        $_SESSION["checkout"]["country"] = $country;
        $_SESSION["checkout"]["phoneNumber"] = $phoneNumber;
        $_SESSION["checkout"]["primaryAddress"] = $primaryAddress;

        if (isset($_SESSION["userdata"])) {
          $ID = $_SESSION["userdata"]["ID"];
          header("Location: checkoutship.php?ID=$ID");
        }
      }
    }
    if (isset($_POST["proceedPayment"])) {
      if (!isset($_SESSION)) {
        session_start();
      }
      if (isset($_POST["delivery"])) {
        $delivery = $_POST["delivery"];
      }
      $sf = $_POST["sFee"];
      if (empty(isset($_POST["delivery"]))) {
        echo "<script> Swal.fire({
            icon: 'error',
            title: 'Empty Field',
            text: 'Please select shipping method',
          });
          </script>";
      } else {
        $_SESSION["checkout"]["method"] = $delivery;
        $_SESSION["checkout"]["sf"] = $sf;
        if (isset($_SESSION["userdata"])) {
          $ID = $_SESSION["userdata"]["ID"];
          header("Location: checkoutpayment.php?ID=$ID");
        }
      }
    }
    if (isset($_POST["backShip"])) {
      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION["checkout"]["method"] = null;
      $_SESSION["checkout"]["sf"] = null;
      unset($_SESSION["checkout"]["method"]);
      unset($_SESSION["checkout"]["sf"]);
      if (isset($_SESSION["userdata"])) {
        $ID = $_SESSION["userdata"]["ID"];
        header("Location: checkoutship.php?ID=$ID");
      }
    }
    if (isset($_POST["proceedReview"])) {
      if (!isset($_SESSION)) {
        session_start();
      }
      if (isset($_POST["payment"])) {
        $payment = $_POST["payment"];
      }
      if (empty(isset($_POST["payment"]))) {
        echo "<script> Swal.fire({
            icon: 'error',
            title: 'Empty Field',
            text: 'Please select payment method',
          });
          </script>";
      } else {
        $_SESSION["checkout"]["payment"] = $payment;
        if (isset($_SESSION["userdata"])) {
          $ID = $_SESSION["userdata"]["ID"];
          header("Location: checkoutreview.php?ID=$ID");
        }
      }
    }
  }

  // get checkout
  public function get_checkout()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    if (isset($_SESSION["checkout"])) {
      return $_SESSION["checkout"];
    } else {
      return null;
    }
  }

  // sales
  public function sales()
  {
    if (isset($_POST["complete"])) {
      $count = count($_POST["productID"]);
      $shipMethod = $_POST["deliveryMethod"];
      $shipFee = $_POST["sf"];
      $paymentMethod = $_POST["payment"];
      $totalAmount = $_POST["totalAmount"];
      $acctID = $_POST["acctID"];
      $paymentStatus = $_POST["paymentStatus"];
      $orderStatus = $_POST["orderStatus"];

      for ($i = 0; $i < $count; $i++) {
        $productID = $_POST["productID"][$i];
        $stockID = $_POST["stockID"][$i];
        $salesQty = $_POST["salesQty"][$i];
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO sales_table ( `productID`, `stockID`, `salesQty`, `shipMethod`, `shipFee`, `paymentMethod`, `totalAmount`, `accountId`, `paymentStatus`, `orderStatus`) VALUES (?,?,?,?,?,?,?,?,?,?)"
        );
        $stmt->execute([
          $productID,
          $stockID,
          $salesQty,
          $shipMethod,
          $shipFee,
          $paymentMethod,
          $totalAmount,
          $acctID,
          $paymentStatus,
          $orderStatus,
        ]);
      }
      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION["checkout"] = null;
      unset($_SESSION["checkout"]);
      if (isset($_SESSION["userdata"])) {
        $ID = $_SESSION["userdata"]["ID"];
        header("Location: orderConfirmed.php?ID=$ID");
      }
    }
  }

  // shipping address
  public function shipping_address()
  {
    if (isset($_POST["complete"])) {
      $acctID = $_POST["acctID"];
      $firstName = $_POST["firstName"];
      $lastName = $_POST["lastName"];
      $address1 = $_POST["address1"];
      $address2 = $_POST["address2"];
      $city = $_POST["city"];
      $postalCode = $_POST["postalCode"];
      $region = $_POST["region"];
      $country = $_POST["country"];
      $phoneNumber = $_POST["phoneNumber"];
      $primaryAddress = $_POST["primaryAddress"];

      $connection = $this->openConnection();
      $stmt = $connection->prepare(
        "INSERT INTO address_table (`firstName`, `lastName`, `address1`, `address2`, `city`, `postalCode`, `region`, `country`, `phoneNumber`, `addressType`, `accountID`) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
      );
      $stmt->execute([
        $firstName,
        $lastName,
        $address1,
        $address2,
        $city,
        $postalCode,
        $region,
        $country,
        $phoneNumber,
        $primaryAddress,
        $acctID,
      ]);
      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION["checkout"] = null;
      unset($_SESSION["checkout"]);
      if (isset($_SESSION["userdata"])) {
        $ID = $_SESSION["userdata"]["ID"];
        header("Location: orderConfirmed.php?ID=$ID");
      }
    }
  }

  // add raw materials
  public function add_material()
  {
    if (isset($_POST["addMaterials"])) {
      $materialName = $_POST["materialName"];
      $unitPrice = $_POST["unitPrice"];
      $stockQty = $_POST["stockQty"];
      if (isset($_POST["supplierID"])) {
        $supplierID = $_POST["supplierID"];
      }

      if (
        empty($materialName) ||
        empty($unitPrice) ||
        empty($stockQty) ||
        empty(isset($_POST["supplierID"]))
      ) {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Empty Field',
          text: 'Please input missing field',
        });
        </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO rawmaterials_table (`materialName` , `unitPrice` , `stockQty` , `supplierID`) VALUES (?,?,?,?)"
        );
        $stmt->execute([$materialName, $unitPrice, $stockQty, $supplierID]);
        echo "<script>  
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Material Added',
            showConfirmButton: false,
            timer: 1000
          },function(){ window.location.href = 'materials.php';});
        </script>";
      }
    }
  }

  // display raw materials
  public function get_all_materials()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT materials.ID, materialName, unitPrice, stockQty, supplierID, supplierName FROM rawmaterials_table materials LEFT JOIN supplier_table supplier ON materials.supplierID = supplier.ID"
    );
    $stmt->execute();
    $materials = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $materials;
    } else {
      return false;
    }
  }

  // display used raw materials
  public function used_materials($rawID)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(materialQty) as materialQty FROM costing_table WHERE costing_table.materialID = ? GROUP BY costing_table.materialID"
    );
    $stmt->execute([$rawID]);
    $usedMaterials = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $usedMaterials;
    } else {
      return false;
    }
  }

  // display added inventory raw materials
  public function get_added_stock_materials($rawID)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT stockQty, SUM(addedQty) as addedQty FROM inventorymaterial_table inventory LEFT JOIN rawmaterials_table materials ON inventory.materialID = materials.ID WHERE inventory.materialID = ? GROUP BY inventory.materialID"
    );
    $stmt->execute([$rawID]);
    $addedInventoryMaterials = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $addedInventoryMaterials;
    } else {
      return false;
    }
  }

  // update raw materials
  public function update_material()
  {
    if (isset($_POST["updateMaterial"])) {
      $materialID = $_POST["materialID"];
      $materialName = $_POST["materialName"];
      $unitPrice = $_POST["unitPrice"];
      $stockQty = $_POST["stockQty"];
      $supplierID = $_POST["supplierID"];

      if (empty($materialName) || empty($unitPrice) || empty($stockQty)) {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Empty Field',
          text: 'Please input missing field',
        });
        </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "UPDATE rawmaterials_table SET `materialName` = ?, `unitPrice` = ?, `stockQty` = ?, `supplierID` = ? WHERE ID = '$materialID'"
        );
        $stmt->execute([$materialName, $unitPrice, $stockQty, $supplierID]);
        $row = $stmt->fetch();
        echo "<script>  
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Material Updated',
        showConfirmButton: false,
        timer: 1000
      },function(){ window.location.href = 'materials.php';});
      </script>";
        return $row;
      }
    }
  }

  // inventory raw material
  public function add_inventory_materials()
  {
    if (isset($_POST["addInventoryMaterials"])) {
      $adminID = $_POST["adminID"];
      $addedStockQty = $_POST["addedStockQty"];
      if (isset($_POST["material"])) {
        $material = $_POST["material"];
      }

      if (empty($addedStockQty) || empty(isset($_POST["material"]))) {
        echo "<script> Swal.fire({
            icon: 'error',
            title: 'Empty Field',
            text: 'Please input missing field',
          });
          </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO inventorymaterial_table (`materialID` , `addedQty`, `adminID`) VALUES (?,?,?)"
        );
        $stmt->execute([$material, $addedStockQty, $adminID]);
        echo "<script>  
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Inventory Added',
              showConfirmButton: false,
              timer: 1000
            },function(){ window.location.href = 'inventorymaterial.php';});
          </script>";
      }
    }
  }

  // display inventory added raw materials
  public function get_inventory_materials_added()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT inventory.ID, materialID, materialName, addedQty, dateTime, account.firstName as addedByName, account.lastName as addedByLastName, account2.firstName as editByName, account2.lastName as editByLastName FROM (SELECT * FROM inventorymaterial_table) inventory LEFT JOIN rawmaterials_table materials ON inventory.materialID = materials.ID LEFT JOIN account_table account ON inventory.adminID = account.ID LEFT JOIN account_table account2 ON inventory.editBy = account2.ID"
    );
    $stmt->execute();
    $inventoryMaterials = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $inventoryMaterials;
    } else {
      return false;
    }
  }

  // update inventory raw materials
  public function update_inventory_material()
  {
    if (isset($_POST["updateInventoryMaterial"])) {
      $inventoryMaterialID = $_POST["inventoryMaterialID"];
      $adminID = $_POST["adminID"];
      $material = $_POST["material"];
      $addedStockQty = $_POST["addedStockQty"];

      if (empty($addedStockQty)) {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Empty Field',
          text: 'Please input missing field',
        });
        </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "UPDATE inventorymaterial_table SET `materialID` = ?, `addedQty` = ?, dateTime = now(), `editBY` = ? WHERE ID = '$inventoryMaterialID'"
        );
        $stmt->execute([$material, $addedStockQty, $adminID]);
        $row = $stmt->fetch();
        echo "<script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Inventory Updated',
        showConfirmButton: false,
        timer: 1000
      },function(){ window.location.href = 'inventorymaterial.php';});
      </script>";
        return $row;
      }
    }
  }

  // add supplier
  public function add_supplier()
  {
    if (isset($_POST["supplier"])) {
      $supplierName = $_POST["supplierName"];
      $supplierAddress = $_POST["supplierAddress"];
      $supplierContactNo = $_POST["supplierContactNo"];

      if (
        empty($supplierName) ||
        empty($supplierAddress) ||
        empty($supplierContactNo)
      ) {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Empty Field',
          text: 'Please input missing field',
        });
        </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO supplier_table (`supplierName` , `supplierAddress` , `supplierContactNumber`) VALUES (?,?,?)"
        );
        $stmt->execute([$supplierName, $supplierAddress, $supplierContactNo]);
        echo "<script>  
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Supplier Added',
            showConfirmButton: false,
            timer: 1000
          },function(){ window.location.href = 'supplier.php';});
        </script>";
      }
    }
  }

  // display supplier
  public function get_all_supplier()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM supplier_table");
    $stmt->execute();
    $supplier = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $supplier;
    } else {
      return false;
    }
  }

  // update supplier
  public function update_supplier()
  {
    if (isset($_POST["updateSupplier"])) {
      $supplierID = $_POST["supplierID"];
      $supplierName = $_POST["supplierName"];
      $supplierAddress = $_POST["supplierAddress"];
      $supplierContactNo = $_POST["supplierContactNo"];

      if (
        empty($supplierName) ||
        empty($supplierAddress) ||
        empty($supplierContactNo)
      ) {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Empty Field',
          text: 'Please input missing field',
        });
        </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "UPDATE supplier_table SET `supplierName` = ?, `supplierAddress` = ?, `supplierContactNumber` = ? WHERE ID = '$supplierID'"
        );
        $stmt->execute([$supplierName, $supplierAddress, $supplierContactNo]);
        $row = $stmt->fetch();
        echo "<script>  
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Supplier Updated',
          showConfirmButton: false,
          timer: 1000
        },function(){ window.location.href = 'supplier.php';});
        </script>";
        return $row;
      }
    }
  }

  //email notification (subscribe)
  public function subscribe()
  {
    if(isset($_POST['subscribe'])){
      $email = $_POST['email'];
      
      $mailTo = $email;
      $body = "Thank you for subscribing <b>INVI Clothing Co.</b> We will make sure to send to you every latest updates. Enjoy Shoppers!";
      
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      //$mail->SMTPDebug = 1;
      $mail->isSMTP();
      $mail->Host = "mail.smtp2go.com";
      $mail->SMTPAuth = true;
      $mail->Username = "INVI";
      $mail->Password = "inviclothingco";
      $mail->SMTPSecure = "tls";
      $mail->Port = "2525";
      $mail->From = "inviclothing.co@gmail.com";
      $mail->FromName = "INVI Clothing Co.";
      $mail->addAddress($mailTo, "INVI Clothing Co.");
      $mail->isHTML(true);
      $mail->Subject = "INVI Clothing Co. - Subscription";
      $mail->Body = $body;
      
      if(!$mail->send()){
        echo "Mailer Error: ". $mail->ErrorInfo;
      }else{
        echo "Email has been sent!";
      }
    }
  }
}
$store = new WebStore();
?>
