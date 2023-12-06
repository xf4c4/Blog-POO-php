<?php

require_once __DIR__ . "/../config/conexion.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        $error = "Please fill all the fields.";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error = "Email format is incorrect.";
    } else {
        $statement = $conexion->prepare("SELECT * FROM users WHERE email = ?");
        $statement->bind_param("s", $_POST["email"]);
        $statement->execute();

        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            $error = "Ya existe una cuenta vinculada.";
        } else {
            $stmt = $conexion->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $_POST["name"], $_POST["email"], password_hash($_POST["password"], PASSWORD_BCRYPT));
            $stmt->execute();

            $statement = $conexion->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
            $statement->bind_param("s", $_POST["email"]);
            $statement->execute();

            $result = $statement->get_result();
            $user = $result->fetch_assoc();

            session_start();
            $_SESSION["user"] = $user;

            header("Location: ../views/index.php");
            exit();
        }
    }
}
?>

<?php require_once __DIR__ . "/../views/templates/header.php" ?>

<br>
<h1 class="text-center">Registrarse</h1>
<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
          <?php if ($error): ?>
            <p class="text-danger">
              <?= $error ?>
            </p>
          <?php endif ?>
          <form method="POST" action="register.php">
            <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" autocomplete="email" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" autocomplete="password" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<p class="text-center">Si ya tienes cuenta <a class="btn btn-primary" href="./login.php">Iniciar sesión</a></p>
