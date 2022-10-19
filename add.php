<?php
require "db.php";
$error = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // var_dump($_POST);
  // die();
  // $contact = [
  //   "name" => $_POST["name"],
  //   "phone_number" => $_POST["phone_number"],
  // ];
  // $name = $_POST["name"];
  // $phoneNumber = $_POST["phone_number"];

  // if (file_exists("contacts.json")) {
  //   $contacts = json_decode(file_get_contents("contacts.json"), true);
  // } else {
  //   $contacts = [];
  // }
  // $contacts[] = $contact;
  // file_put_contents("contacts.json", json_encode($contacts));
  // $statement = $conn->prepare("INSERT INTO contacts(name, phone_number) VALUES('$name', '$phoneNumber')");
  // $statement->execute();
  // header("Location: index.php");
  if (empty($_POST["name"]) || empty($_POST["phone_number"])) {
    $error = "Please fill all the field";
  } else if (strlen($_POST["phone_number"]) < 9) {
    $error = "Phone number must be at least 9 numbers";
  } else {
    $name = $_POST["name"];
    $phoneNumber = $_POST["phone_number"];
    $statement = $conn->prepare("INSERT INTO contacts(name, phone_number) VALUES(:name, :phone_number)");
    $statement->bindParam(":name", $_POST["name"]);
    $statement->bindParam(":phone_number", $_POST["phone_number"]);
    $statement->execute();
    header("Location: index.php");
  }
}
?>
<!-- Segun definio en el campo input atributo name asi llegara aqui en el post las variables -->
<?php require "partials/header.php" ?>

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Add New Contact</div>
        <div class="card-body">
          <!-- //ANCHOR  - if error -->
          <?php if ($error) : ?>
            <p class="text-danger">
              <?= $error ?>
            </p>
          <?php endif ?>
          <!-- //ANCHOR -  Formulario action es el que nos ayuda con esta peticion-->
          <form method="POST" action="add.php">
            <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

              <div class="col-md-6">
                <!-- la variable name define el nombre de variables de como van a llegar en el post -->
                <input id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>

              <div class="col-md-6">
                <input id="phone_number" type="tel" class="form-control" name="phone_number" autocomplete="phone_number" autofocus>
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
