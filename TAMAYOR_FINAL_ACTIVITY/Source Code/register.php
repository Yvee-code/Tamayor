<?php
require_once 'db.php';

$name = '';
$email = '';
$password = '';
$confirm_password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $confirm_password = trim($_POST['confirm_password']);

  if (empty($name)) {
    $name_err = 'Please enter your name';
  }


  if (empty($email)) {
    $email_err = 'Please enter email address';
  } else {
    $sql = 'SELECT id FROM users WHERE email = :email';

    if ($stmt = $pdo->prepare($sql)) {
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);

      if ($stmt->execute()) {
        if ($stmt->rowCount() === 1) {
          $email_err = 'Email is already taken';
        }
      } else {
        die('Something went wrong');
      }
    }

    unset($stmt);
  }


  if (empty($password)) {
    $password_err = 'Please enter a password';
  } elseif (strlen($password) < 6) {
    $password_err = 'Password must be at least 6 characters';
  }


  if (empty($confirm_password)) {
    $confirm_password_err = 'Please confirm password';
  } else {
    if ($password !== $confirm_password) {
      $confirm_password_err = 'Passwords do not match';
    }
  }

  //inputs are okay to be saved to the database
  if (empty($name_err) &&
    empty($email_err) &&
    empty($password_err) &&
    empty($confirm_password_err)) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

    if ($stmt = $pdo->prepare($sql)) {
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':password', $password, PDO::PARAM_STR);

      if ($stmt->execute()) {
        header('location: login.php');
      } else {
        die('Something went wrong');
      }
    }

    unset($stmt);
  }
  unset($pdo);
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Register</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
          <h2>Register</h2>
          <p>Fill up this form to register.</p>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group my-2">
              <label>Name:<sup class="text-danger">*</sup></label>
              <input type="text" name="name"
                class="form-control form-control-lg <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
                value="<?php echo $name; ?>">
              <span class="invalid-feedback">
                <?php echo $name_err; ?>
              </span>
            </div>
            <div class="form-group my-2">
              <label>Email Address:<sup class="text-danger">*</sup></label>
              <input type="email" name="email"
                class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?> "
                value="<?php echo $email; ?> ">
              <span class="invalid-feedback">
                <?php echo $email_err; ?>
              </span>
            </div>
            <div class="form-group my-2">
              <label>Password:<sup class="text-danger">*</sup></label>
              <input type="password" name="password"
                class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                value="<?php echo $password; ?>">
              <span class="invalid-feedback">
                <?php echo $password_err; ?>
              </span>
            </div>
            <div class="form-group my-2">
              <label>Confirm Password:<sup class="text-danger">*</sup></label>
              <input type="password" name="confirm_password"
                class="form-control form-control-lg <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                value="<?php echo $confirm_password; ?>">
              <span class="invalid-feedback">
                <?php echo $confirm_password_err; ?>
              </span>
            </div>
            <div class="form-group py-2">
              <input type="submit" class="btn btn-primary btn-block" value="Register"> <a href="login.php"
                class="btn btn-danger btn-block">Have an account? Login instead.</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>

</html>