<!DOCTYPE html>
<html>

<head>
  <title>ربط - نسيت كلمة المرور</title>
  <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/styleLogin.css" />
</head>

<body class="turki">
  <form class="form" name="forgeted" onsubmit="check(event)" action="">
    <?php
    include './assets/php/connection.php';

    if (isset($_POST["forget"])) {
      $user = trim($_POST['email']);

      if (empty($email)) {
        echo 'الرجاء إدخال البريد الإلكتروني';
        return;
      }

      $checkEmail = "select email from users where email = '$email' ";
      $checkEmail = mysqli_query($con, $checkEmail);
      if (mysqli_num_rows($checkEmail) == 0) {
        echo " البريد الإلكتروني غير موجود";
        return;
      }
      $to=$checkEmail;
      $subject = 'تحقق من صاحب الحساب';
      $message = 'هل نسيت كلمة المرور';
      $headers = 'From: turki@rabt.com.sa' . "\r\n" .
        'Reply-To: turki@rabt.com.sa' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $message, $headers);
    }
    ?>
    <h2>نسيت كلمة المرور </h2>
    <p>البريد الإلكتروني</p>
    <input type="email" name="email" placeholder=" ادخل البريد الإلكتروني  ">
    <input class="button" type="submit" name="forget" value="ارسل الرابط">
    <div>
      <a href="login.php">لدي حساب</a>
      <a href="signup.php">انشئ حساب</a>
    </div>
  </form>
  <script type="text/javascript">
    function check(event) {
      var error = false;
      var email = forgeted.email.value;
      if (email == "") {
        alert("الرجاء ادخل البريد الإلكتروني");
        error = true;
      }
      if (error) {
        event.preventDefault();
      }
    }
  </script>
</body>

</html>