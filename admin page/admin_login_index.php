<?php
// Login connection
include "../backend/admin_login_cont.php";
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="../bootstrap/assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <!-- bootstrap CSS -->
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="../css/sign-in.css" rel="stylesheet">

  <title>Admin | Signin</title>
</head>

<body>
  <main class="d-flex align-items-center bg-body-tertiary justify-content-center h-100">
    <div class="form-signin border rounded my-5 py-5 w-75" style="max-width: 400px;">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="container text-center p-0">
          <a class="navbar-brand mx-5" href="index.php">
            <img class="mb-4" src="../website images/logof.png" width="100px" height="auto">
          </a>
          <h1 class="h3 mb-3 fw-normal">Admin | Signin</h1>
        </div>

        <?php
        if (!empty($login_err)) {
          echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <div class="container p-0">
          <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control rounded <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="name@example.com">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-5">
            <input type="password" name="password" class="form-control rounded <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="floatingPassword" placeholder="Password">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
            <label for="floatingPassword">Password</label>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <a class="sign-in btn btn-secondary w-100 py-2" href="../login_index.php" role="button">Back</a>
          </div>
          <div class="col">
            <button class="sign-in btn btn-primary w-100 py-2" type="submit">Sign in</button>
          </div>
        </div>

      </form>
    </div>
  </main>

  <script src="../bootstrap/assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../bootstrap/assets/js/dashboard.js"></script>
</body>

</html>