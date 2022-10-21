<?php
require "db.php";

// if (!isset($_SESSION["user"])) {
//   header("Location: home.php");
//   return;
// }

$error = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ( empty($_POST["email"]) || empty($_POST["password"])) {
    $error="Please fill all the fileds";
  } //else if(!str_contains($_POST["email"],"@")){//esta funcion esta disponible en php8
    else if(!strpos($_POST["email"],"@")){
    $error = "Email format is incorrect.";
  }else{
    $statement = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1" );
    $statement->bindParam(":email", $_POST["email"]);
    $statement->execute();

    if ($statement->rowCount()== 0) {
      $error="Invalid credential.";
    }else{
      $user= $statement->fetch(PDO::FETCH_ASSOC);
      if (!password_verify($_POST["password"], $user["password"])){
        $error="Invalid credendials.";
      }else{
        session_start();
        unset($user["password"]);
        $_SESSION["user"] = $user;
        header("Location: home.php");
      }
    }
  }
}
?>
<!-- Segun definio en el campo input atributo name asi llegara aqui en el post las variables -->
<?php require "partials/header.php" ?>

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
          <!-- //ANCHOR  - if error -->
          <?php if ($error) : ?>
            <p class="text-danger">
              <?= $error ?>
            </p>
          <?php endif ?>
          <!-- //ANCHOR -  Formulario action es el que nos ayuda con esta peticion-->
          <form method="POST" action="login.php">
            <!--//ANCHOR Name user -->
            <!-- <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

              <div class="col-md-6"> -->
                <!-- la variable name define el nombre de variables de como van a llegar en el post -->
                <!-- <input id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus>
              </div>
            </div> -->
            <!--//ANCHOR Email user -->
            <div class="mb-3 row">
              <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

              <div class="col-md-6">
                <input id="email" type="" class="form-control" name="email" autocomplete="email" autofocus>
              </div>
            </div>

            <!-- //ANCHOR - Password user -->
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

<?php require "partials/footer.php" ?>
