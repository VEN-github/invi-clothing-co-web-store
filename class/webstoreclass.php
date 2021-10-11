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
      $this->logout();
      header("Location: index.php");
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
      "SELECT * FROM account_table WHERE access = 'admin' ORDER BY ID DESC"
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
    $stmt = $connection->prepare(
      "SELECT * FROM category_table ORDER BY ID DESC"
    );
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
      "SELECT product.ID, productName, categoryName, productColor, coverPhoto, netSales, productCost, netIncome FROM (SELECT * FROM product_table) product LEFT JOIN category_table category ON product.categoryID = category.ID LEFT JOIN costing_table costing ON product.ID = costing.productID GROUP BY product.ID ORDER BY product.ID DESC"
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
      "SELECT product.ID, productName, productDescription, categoryName, netSales, netIncome, productColor, coverPhoto, image1, image2, image3, sizeGuide FROM (SELECT * FROM product_table WHERE product_table.ID = ?) product LEFT JOIN category_table category ON product.categoryID = category.ID LEFT JOIN costing_table costing ON product.ID = costing.productID"
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
  public function view_all_stocks($productID)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT * FROM product_table product LEFT JOIN stocks_table stocks ON product.ID = stocks.productID WHERE product.ID = ?"
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

  //sum stocks
  public function sum_stocks($productID)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(stock) as totalStocks FROM stocks_table WHERE productID = ?"
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
      $orderID = $_POST["orderID"];
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
          "INSERT INTO sales_table ( `orderID`,`productID`, `stockID`, `salesQty`, `shipMethod`, `shipFee`, `paymentMethod`, `totalAmount`, `accountId`, `paymentStatus`, `orderStatus`) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
        );
        $stmt->execute([
          $orderID,
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

  // display order
  public function get_orders()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT orderID, accountID, firstName, lastName, email,coverPhoto, productName, productColor, size, salesQty, totalAmount, paymentMethod, paymentStatus, shipMethod, orderStatus, orderDate FROM sales_table sales  LEFT JOIN account_table account ON sales.accountID = account.ID LEFT JOIN product_table product ON sales.productID = product.ID LEFT JOIN stocks_table stocks ON sales.stockID = stocks.ID ORDER BY orderDate DESC"
    );
    $stmt->execute();
    $orders = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $orders;
    } else {
      return false;
    }
  }

  // print receipt
  public function invoice($orderID, $accountID)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT orderID, account.firstName as firstName, account.lastName as lastName, email, coverPhoto, productName, productColor, size, salesQty, totalAmount, paymentMethod, netSales, shipMethod, shipFee, orderDate, shipAddress.firstName as addressFname, shipAddress.lastName as addressLname, address1, address2, city, postalCode, region, country, phoneNumber FROM sales_table sales  LEFT JOIN account_table account ON sales.accountID = account.ID LEFT JOIN product_table product ON sales.productID = product.ID LEFT JOIN stocks_table stocks ON sales.stockID = stocks.ID LEFT JOIN costing_table costing ON sales.productID = costing.productID LEFT JOIN address_table shipAddress ON sales.accountID = shipAddress.accountID WHERE orderID = ? AND sales.accountID = ? GROUP BY sales.productID"
    );
    $stmt->execute([$orderID, $accountID]);
    $order = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $order;
    } else {
      return $this->show_dashboard404();
    }
  }

  // count pending orders
  public function count_orders()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT COUNT(DISTINCT(orderID)) FROM sales_table WHERE orderStatus = 'Placed' OR orderStatus = 'Processing'"
    );
    $stmt->execute();
    $orders = $stmt->fetchColumn();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $orders;
    } else {
      return false;
    }
  }

  // update payment status
  public function update_payment_status()
  {
    if (isset($_POST["updatePaymentStatus"])) {
      $orderID = $_POST["orderID"];
      if (isset($_POST["paymentStatus"])) {
        $paymentStatus = $_POST["paymentStatus"];
      }

      if (empty(isset($_POST["paymentStatus"]))) {
        echo "<script> Swal.fire({
        icon: 'error',
        title: 'Empty Field',
        text: 'Please select status',
      });
      </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "UPDATE sales_table SET `paymentStatus` = ? WHERE orderID = '$orderID'"
        );
        $stmt->execute([$paymentStatus]);
        $row = $stmt->fetch();
        echo "<script>
              Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Payment Status Updated',
              showConfirmButton: false,
              timer: 1000
              },function(){ window.location.href = 'orders.php';});
          </script>";
        return $row;
      }
    }
  }

  // update order status
  public function update_order_status()
  {
    if (isset($_POST["updateOrderStatus"])) {
      $orderID = $_POST["orderID"];
      if (isset($_POST["orderStatus"])) {
        $orderStatus = $_POST["orderStatus"];
      }

      if (empty(isset($_POST["orderStatus"]))) {
        echo "<script> Swal.fire({
        icon: 'error',
        title: 'Empty Field',
        text: 'Please select status',
      });
      </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "UPDATE sales_table SET `orderStatus` = ? WHERE orderID = '$orderID'"
        );
        $stmt->execute([$orderStatus]);
        $row = $stmt->fetch();
        echo "<script>
              Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Order Status Updated',
              showConfirmButton: false,
              timer: 1000
              },function(){ window.location.href = 'orders.php';});
          </script>";
        return $row;
      }
    }
  }

  // display sales
  public function get_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT sales.productID as productID, orderID, productName, productColor, size, salesQty, totalAmount,orderDate FROM sales_table sales LEFT JOIN product_table product ON sales.productID = product.ID LEFT JOIN stocks_table stocks ON sales.stockID = stocks.ID WHERE paymentStatus = 'Paid' ORDER BY orderDate DESC"
    );
    $stmt->execute();
    $sales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $sales;
    } else {
      return false;
    }
  }

  // display top selling products
  public function get_top_selling_products()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT sales.productID as productID, productName, productColor, size, SUM(salesQty) as salesQty FROM sales_table sales LEFT JOIN product_table product ON sales.productID = product.ID LEFT JOIN stocks_table stocks ON sales.stockID = stocks.ID WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND
      MONTH(orderDate) = MONTH(CURRENT_DATE()) GROUP BY sales.stockID ORDER BY SUM(salesQty) DESC LIMIT 5"
    );
    $stmt->execute();
    $topSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $topSales;
    } else {
      return false;
    }
  }

  // display top selling categories
  public function get_top_selling_category()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT categoryName, SUM(salesQty) as salesQty FROM sales_table sales LEFT JOIN product_table product ON sales.productID = product.ID LEFT JOIN category_table category ON product.categoryID = category.ID WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = MONTH(CURRENT_DATE()) GROUP BY categoryName ORDER BY SUM(salesQty) DESC LIMIT 5"
    );
    $stmt->execute();
    $topCategories = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $topCategories;
    } else {
      return false;
    }
  }

  // display total sales today
  public function get_total_sales_today()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount, DATE_FORMAT(orderDate, '%Y-%m-%d') FROM sales_table WHERE paymentStatus = 'Paid' AND DATE(orderDate) = CURDATE() GROUP BY orderID"
    );
    $stmt->execute();
    $totalSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $totalSales;
    } else {
      return false;
    }
  }

  // display total sales this month
  public function get_sales_this_month()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = MONTH(CURRENT_DATE()) GROUP BY orderID"
    );
    $stmt->execute();
    $salesMonth = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $salesMonth;
    } else {
      return false;
    }
  }

  // get total net income
  public function get_total_net_income()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT productID, salesQty as salesQty FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = MONTH(CURRENT_DATE())"
    );
    $stmt->execute();
    $totalIncome = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $totalIncome;
    } else {
      return false;
    }
  }

  // display total sales this jan
  public function get_jan_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 01 GROUP BY orderID"
    );
    $stmt->execute();
    $janSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $janSales;
    } else {
      return false;
    }
  }

  // display total sales this feb
  public function get_feb_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 02 GROUP BY orderID"
    );
    $stmt->execute();
    $febSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $febSales;
    } else {
      return false;
    }
  }

  // display total sales this mar
  public function get_mar_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 03 GROUP BY orderID"
    );
    $stmt->execute();
    $marSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $marSales;
    } else {
      return false;
    }
  }

  // display total sales this apr
  public function get_apr_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 04 GROUP BY orderID"
    );
    $stmt->execute();
    $aprSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $aprSales;
    } else {
      return false;
    }
  }

  // display total sales this may
  public function get_may_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 05 GROUP BY orderID"
    );
    $stmt->execute();
    $maySales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $maySales;
    } else {
      return false;
    }
  }

  // display total sales this jun
  public function get_jun_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 06 GROUP BY orderID"
    );
    $stmt->execute();
    $junSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $junSales;
    } else {
      return false;
    }
  }

  // display total sales this jul
  public function get_jul_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 07 GROUP BY orderID"
    );
    $stmt->execute();
    $julSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $julSales;
    } else {
      return false;
    }
  }

  // display total sales this aug
  public function get_aug_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 08 GROUP BY orderID"
    );
    $stmt->execute();
    $augSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $augSales;
    } else {
      return false;
    }
  }

  // display total sales this sep
  public function get_sep_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 09 GROUP BY orderID"
    );
    $stmt->execute();
    $sepSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $sepSales;
    } else {
      return false;
    }
  }

  // display total sales this oct
  public function get_oct_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 10 GROUP BY orderID"
    );
    $stmt->execute();
    $octSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $octSales;
    } else {
      return false;
    }
  }

  // display total sales this nov
  public function get_nov_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 11 GROUP BY orderID"
    );
    $stmt->execute();
    $novSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $novSales;
    } else {
      return false;
    }
  }

  // display total sales this dec
  public function get_dec_sales()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(DISTINCT totalAmount) as totalAmount FROM sales_table WHERE paymentStatus = 'Paid' AND YEAR(orderDate) = YEAR(CURRENT_DATE()) AND 
      MONTH(orderDate) = 12 GROUP BY orderID"
    );
    $stmt->execute();
    $decSales = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $decSales;
    } else {
      return false;
    }
  }

  // display sold products
  public function sold_products($productID, $stockID)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT SUM(salesQty) as salesQty FROM sales_table WHERE productID = ? AND stockID = ? GROUP BY productID AND stockID"
    );
    $stmt->execute([$productID, $stockID]);
    $soldProducts = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $soldProducts;
    } else {
      return false;
    }
  }

  // display added inventory products
  public function get_added_stock_products($productID, $stockID)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT stock, SUM(addedQty) as addedQty FROM inventoryproduct_table inventory LEFT JOIN stocks_table stock ON inventory.stockID = stock.ID LEFT JOIN product_table product ON inventory.productID = product.ID WHERE inventory.productID = ? AND inventory.stockID = ? GROUP BY inventory.productID AND inventory.stockID"
    );
    $stmt->execute([$productID, $stockID]);
    $addedInventoryProducts = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $addedInventoryProducts;
    } else {
      return false;
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
      "SELECT materials.ID, materialName, unitPrice, stockQty, supplierID, supplierName, supplierEmail FROM rawmaterials_table materials LEFT JOIN supplier_table supplier ON materials.supplierID = supplier.ID ORDER BY ID DESC"
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

  // inventory product material
  public function add_inventory_products()
  {
    if (isset($_POST["addInventoryProducts"])) {
      $adminID = $_POST["adminID"];
      $stockID = $_POST["stockID"];
      $addedStockQty = $_POST["addedStockQty"];
      if (isset($_POST["products"])) {
        $products = $_POST["products"];
      }

      if (empty($addedStockQty) || empty(isset($_POST["products"]))) {
        echo "<script> Swal.fire({
            icon: 'error',
            title: 'Empty Field',
            text: 'Please input missing field',
          });
          </script>";
      } else {
        $connection = $this->openConnection();
        $stmt = $connection->prepare(
          "INSERT INTO inventoryproduct_table (`productID`, `stockID`, `addedQty`, `addedBy`) VALUES (?,?,?,?)"
        );
        $stmt->execute([$products, $stockID, $addedStockQty, $adminID]);
        echo "<script>  
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Inventory Added',
              showConfirmButton: false,
              timer: 1000
            },function(){ window.location.href = 'inventoryproducts.php';});
          </script>";
      }
    }
  }

  // display inventory added products
  public function get_inventory_products_added()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare(
      "SELECT inventory.ID , inventory.productID, inventory.stockID, productName, productColor, size, addedQty, dateTime, account.firstName as addedByName, account.lastName as addedByLastName, account2.firstName as editByName, account2.lastName as editByLastName FROM (SELECT * FROM inventoryproduct_table) inventory LEFT JOIN product_table product ON inventory.productID = product.ID LEFT JOIN stocks_table stocks ON inventory.stockID = stocks.ID LEFT JOIN account_table account ON inventory.addedBy = account.ID LEFT JOIN account_table account2 ON inventory.editedBy = account2.ID ORDER BY ID DESC"
    );
    $stmt->execute();
    $inventoryProducts = $stmt->fetchall();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return $inventoryProducts;
    } else {
      return false;
    }
  }

  // update inventory products
  public function update_inventory_product()
  {
    if (isset($_POST["updateInventoryProduct"])) {
      $inventoryProductID = $_POST["inventoryProductID"];
      $adminID = $_POST["adminID"];
      $stockID = $_POST["stockID"];
      $product = $_POST["products"];
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
          "UPDATE inventoryproduct_table SET `productID` = ?, `stockID` = ?, `addedQty` = ?, dateTime = now(), `editedBy` = ? WHERE ID = '$inventoryProductID'"
        );
        $stmt->execute([$product, $stockID, $addedStockQty, $adminID]);
        $row = $stmt->fetch();
        echo "<script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Inventory Updated',
        showConfirmButton: false,
        timer: 1000
      },function(){ window.location.href = 'inventoryproducts.php';});
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
      "SELECT inventory.ID, materialID, materialName, addedQty, dateTime, account.firstName as addedByName, account.lastName as addedByLastName, account2.firstName as editByName, account2.lastName as editByLastName FROM (SELECT * FROM inventorymaterial_table) inventory LEFT JOIN rawmaterials_table materials ON inventory.materialID = materials.ID LEFT JOIN account_table account ON inventory.adminID = account.ID LEFT JOIN account_table account2 ON inventory.editBy = account2.ID ORDER BY ID DESC"
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
      $supplierEmail = $_POST["supplierEmail"];
      $supplierAddress = $_POST["supplierAddress"];
      $supplierContactNo = $_POST["supplierContactNo"];

      if (
        empty($supplierName) ||
        empty($supplierEmail) ||
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
          "INSERT INTO supplier_table (`supplierName` , supplierEmail, `supplierAddress` , `supplierContactNumber`) VALUES (?,?,?,?)"
        );
        $stmt->execute([
          $supplierName,
          $supplierEmail,
          $supplierAddress,
          $supplierContactNo,
        ]);
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
    $stmt = $connection->prepare(
      "SELECT * FROM supplier_table ORDER BY ID DESC"
    );
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
      $supplierEmail = $_POST["supplierEmail"];
      $supplierAddress = $_POST["supplierAddress"];
      $supplierContactNo = $_POST["supplierContactNo"];

      if (
        empty($supplierName) ||
        empty($supplierEmail) ||
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
          "UPDATE supplier_table SET `supplierName` = ?, `supplierEmail` = ?, `supplierAddress` = ?, `supplierContactNumber` = ? WHERE ID = '$supplierID'"
        );
        $stmt->execute([
          $supplierName,
          $supplierEmail,
          $supplierAddress,
          $supplierContactNo,
        ]);
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
      $body = "Thank you for subscribing <b>INVI Clothing Co.</b> We will make sure to send to you every latest updates. Enjoy INVI Shoppers!";
      
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
  
  //update customer via email
  public function order_email_notif()
  {
    if(isset($_POST['updateOrderStatus'])){
      $customerEmail = $_POST['customerEmail'];
      $orderID = $_POST['orderID'];

      $mailTo = $customerEmail;
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
      $mail->Subject = "INVI Clothing Co. - ORDER#".$orderID;
      

      if($_POST['orderStatus'] == "Processing"){
        $mail->Body = "<h4> Order# ".$orderID." </h4>".
                      "<b>Your order is being processed.</b>" ;
      }
      if($_POST['orderStatus'] == "Shipped"){
        $mail->Body = "<h4> Order# ".$orderID." </h4>".
                      "Your order/s has been shipped out.";
      }
      if($_POST['orderStatus'] == "Delivered"){
        $mail->Body = "<h4> Order# ".$orderID." </h4>".
                      "Your order/s has been delivered. Thank you for supporting INVI Clothing Co.";
      }
      if($_POST['orderStatus'] == "Cancelled"){
        $mail->Body = "<h4> Order# ".$orderID." </h4>".
                      "Cancelled order.";
      }

      if(!$mail->send()){
        echo "Mailer Error: ". $mail->ErrorInfo;
      }else{
        echo "Email has been sent!";
      }
    }
  }

  //contact supplier via email
  public function contact_supplier()
  {
    if(isset($_POST['contactSupplier'])){
      $supplierEmail = $_POST['supplierEmail'];
      $body = $_POST['message'];

      $mailTo = $supplierEmail;
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
      $mail->Subject = "INVI Clothing Co.";
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
