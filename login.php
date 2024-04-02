<!DOCTYPE html>
<html>

<head>
  <title>ربط - تسجيل الدخول</title>
  <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/styleLogin.css" />
</head>

<body class="turki">
  <form class="form" name="entrance" onsubmit="check(event)" action="login.php" method="post">
    <?php
    include("./assets/php/auth.php");
    if($loggedIn){
      header("location: dashboard.php");
      exit();
    }
    if (isset($_GET["signup"]) && $_GET["signup"] == 'true') {
      echo "<script>alert('تم انشاء حسابك')</script>";
    }

    include './assets/php/connection.php';
    if (isset($_POST["login"])) {
      $user = trim($_POST['user']);
      $password = trim($_POST['password']);
      $error = false;
      if (empty($user) || empty($password)) {
        echo '<script>alert("الرجاء تعبئة النموذج")</script>';
        $error = true;
      }

      if (!$error) {
        $checkAccount = "select id,username,email,subscribed from users where username = '$user' and password=md5('$password')";
        $checkAccount = mysqli_query($con, $checkAccount);

        if (mysqli_num_rows($checkAccount) >= 1) {
          $user = mysqli_fetch_array($checkAccount);
          
          //جزئية حسام
            $user['newsletter'] = 0;
            $email = $user['email'];
            $getNewsletter = mysqli_query($con, "SELECT email FROM newsletter WHERE email = '$email'");
            if (mysqli_num_rows($getNewsletter) >= 1) {
              $user['newsletter'] = 1;
            }
          //نهاية جزئية حسام
          
          setcookie("user", json_encode($user), time() + 60 * 60 * 24 * 7, '/');
          header("location: dashboard.php");
          exit();
        } else {
          echo "<script>alert('هنالك خطأ في كلمة المرور أو اسم المستخدم')</script>";
        }
      }
    }
    mysqli_close($con);
    ?>
    <h2>تسجيل الدخول</h2>
    <p>اسم المستخدم</p>
    <input type="text" name="user" placeholder=" ادخل اسم المستخدم  ">
    <p>كلمة المرور</p>
    <input type="password" name="password" placeholder=" ادخل كلمة المرور  ">
    <input class="button" type="submit" name="login" value="تسجيل الدخول">
    <a href="signup.php">ليس لدي حساب</a>
  </form>
</body>

</html>