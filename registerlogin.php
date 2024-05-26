<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/portfolio.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/entry.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
      include "components/navbar.php"
    ?>

    <main class="registerlogin-main">
      <div class="register-side">
        <h2>Register</h2>
        <form class="registerlogin-form" action="db/register.php" method="POST" onsubmit="alert('Your have been succesfully registrated!')">
          <fieldset>
            <label for="register-name">Name</label>
            <input type="text" id="register-name" name="register-name">
            <label for="register-email">E-mail</label>
            <input type="email" id="register-email" name="register-email">
            <label for="register-password">Password</label>
            <input type="password" id="register-password" name="register-password">
            <label for="register-password-re">Re:Password</label>
            <input type="password" id="register-password-re" name="register-password-re">
            <label for="register-agree">
              <input type="checkbox" id="register-agree" name="register-agree">
              I agree to the terms and conditions
            </label>
            <input type="submit" value="Submit">
          </fieldset>
        </form>
      </div>
      <div class="login-side">
        <h2>Login</h2>
        <form class="registerlogin-form" action="db/login.php" method="POST">
          <fieldset>
            <label for="login-name">Name</label>
            <input type="text" id="login-name" name="login-name">
            <label for="login-email">E-mail</label>
            <input type="email" id="login-email" name="login-email">
            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="login-password">
            <input type="submit" class="submit-login" value="Submit">
          </fieldset>
        </form>
      </div>
    </main>

    <?php
      include "components/footer.php"
    ?>
</body>
</html>