<!DOCTYPE html>
<html>

<head>
  <title>ربط - تسجيل الحساب</title>
  <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/styleLogin.css" />
</head>

<body class="turki">
  <form class="form" name="creates" onsubmit="check(event)" action="signup.php" method="post">
    <?php
    include("./assets/php/auth.php");
    if($loggedIn){
        header("location: dashboard.php");
        exit();
    }
    
    include './assets/php/connection.php';
    if (isset($_POST["signin"])) {
      $name = trim($_POST['name']);
      $user = trim($_POST['user']);
      $email = trim($_POST['email']);
      $password = trim($_POST['password']);
      $error = false;
      if (empty($name) || empty($user) || empty($email) || empty($password)) {
        echo '<script>alert("الرجاء تعبئة النموذج")</script>';
        $error = true;
      }

      if (strlen($password) < 8) {
        echo '<script>alert("الرجاء التحقق من ادخال 8 أحرف أو أكثر لكلمة المرور")</script>';
        $error = true;
      }

      $checkUser = "select username from users where username = '$user' ";
      $checkUser = mysqli_query($con, $checkUser);
      if (mysqli_num_rows($checkUser) > 0) {
        echo '<script>alert("اسم المستخدم غير متاح")</script>';
        $error = true;
      }

      $checkEmail = "select email from users where email = '$email' ";
      $checkEmail = mysqli_query($con, $checkEmail);
      if (mysqli_num_rows($checkEmail) > 0) {
        echo " <script>alert(البريد الإلكتروني غير متاح)</script>";
        $error = true;
      }


      if (!$error) {
        $insert = "INSERT INTO users(username,name,email,password) 
        VALUES('$user','$name','$email',md5('$password'))";

        $insert = mysqli_query($con, $insert);

        if ($insert > 0) {
          header("location:login.php?signup=true");
          exit();
        }

      }

    }
    
    mysqli_close($con);
    ?>
    <h2>حساب جديد</h2>
    <p>الاسم</p>
    <input type="text" name="name" placeholder=" ادخل اسمك  ">
    <p>اسم المستخدم</p>
    <input type="text" name="user" placeholder=" ادخل اسم المستخدم  " oninput="checkUser(event)">
    <p>البريد الإلكتروني</p>
    <input type="email" name="email" placeholder=" ادخل البريد الإلكتروني  ">
    <p>كلمة المرور</p>
    <input type="password" name="password" placeholder=" ادخل كلمة المرور  ">
    <input class="button" type="submit" name="signin" value="انشئ حسابي">
    <div>
      <a href="login.php"> لدي حساب</a>
    </div>
  </form>
    <script src='./assets/js/signup.js'></script>
  </body >
</html >