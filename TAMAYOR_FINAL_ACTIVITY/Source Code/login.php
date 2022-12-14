<?php
require_once 'db.php';

$email = '';
$password = '';
$email_err = '';
$password_err = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  $email = trim($_POST['email']);
  $password = trim($_POST['password']);


  if (empty($email)) {
    $email_err = 'Please enter email';
  }

  if (empty($password)) {
    $password_err = 'Please enter password';
  }


  if (empty($email_err) && empty($password_err)) {
    $sql = 'SELECT name, email, password from users where email = :email';

    if ($stmt = $pdo->prepare($sql)) {
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);

      if ($stmt->execute()) {
        if ($stmt->rowCount() == 1) {
          if ($row = $stmt->fetch()) {
            $hashed_password = $row['password'];
            if (password_verify($password, $hashed_password)) {
              session_start();
              $_SESSION['email'] = $email;
              $_SESSION['name'] = $row['name'];
              header('location: index.php');
            } else {
              $password_err = 'The password you entered is not valid';
            }
          }
        } else {
          $email_err = 'No Account found for that email';
        }
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

  <title>Login</title>
</head>


<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
          <h2>Login</h2>
          <p>Please fill in your credentials to login.</p>
          <form action="" method="post">
            <div class="form-group my-2">
              <label>Email:<sup class="text-danger">*</sup></label>
              <input type="text" name="email"
                class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                value="<?php echo $email; ?>">
              <span class="invalid-feedback">
                <?php echo $email_err; ?>
              </span>
            </div>
            <div class="form-group my-2">
              <label>Password:<sup class="text-danger">*</sup></label>
              <input type="password" name="password"
                class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
              <span class="invalid-feedback">
                <?php echo $password_err; ?>
              </span>
            </div>
            <div class="form-group py-2">
              <input type="submit" class="btn btn-primary btn-block" value="Login"> <a href="register.php"
                class="btn btn-danger btn-block">No account? Register instead.</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>