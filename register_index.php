<?php
// Register connection
include "backend/register_cont.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="bootstrap/assets/js/color-modes.js"></script>
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
    <link href="css/sign-in.css" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <main class="d-flex align-items-center bg-body-tertiary justify-content-center">
        <div class="form-signin border rounded py-5 my-5 w-75" style="max-width: 500px;">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="container text-center p-0">
                    <a class="navbar-brand mx-5" href="index.php">
                        <img class="mb-4" src="website images/logof.png" width="100px" height="auto">
                    </a>
                    <h1 class="h3 mb-3 fw-normal">Register</h1>
                    <p>Please fill this form to create an account.</p>
                </div>

                <div class="container p-0">
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control rounded <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Enter Username</label>
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Enter Password</label>
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="confirm_password" class="form-control rounded <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Confirm Password</label>
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>

                    <hr>

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control rounded <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Enter Name</label>
                        <span class="invalid-feedback"><?php echo $name_err; ?></span>
                    </div>
                    <div class="row px-2">
                        <div class="col px-1">
                            <div class="form-floating mb-3">
                                <input type="number" name="age" class="form-control rounded <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Enter Age</label>
                                <span class="invalid-feedback"><?php echo $age_err; ?></span>
                            </div>
                        </div>
                        <div class="col px-1">
                            <div class="form-floating mb-3">
                                <select name="gender" class="form-select <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" id="floatingSelectGrid">
                                    <option selected></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="bayot">etc.</option>
                                </select>
                                <label for="floatingSelectGrid">Enter Gender</label>
                                <span class="invalid-feedback"><?php echo $gender_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="address" class="form-control rounded <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Enter Address</label>
                        <span class="invalid-feedback"><?php echo $address_err; ?></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="contact" class="form-control rounded <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Enter Contact Number</label>
                        <span class="invalid-feedback"><?php echo $contact_err; ?></span>
                    </div>
                </div>

                <div class="container p-0 text-center">
                    <div class="form-group">
                        <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                    <p class="m-0 mt-3">Already have an account?</p>
                    <a href="login_index.php">Login here</a>
                </div>
            </form>
        </div>
    </main>

    <script src="bootstrap/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>