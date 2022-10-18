<?php
require "db.php";
// $contacs = [
//   ["name" => "pepe", "phone_number"=>"2131231"],
//   ["name" => "Antonio", "phone_number"=>"8534321"],
//   ["name" => "Jose", "phone_number"=>"124347"],
//   ["name" => "Nate", "phone_number"=>"8987632"],
// ]

// if (file_exists("contacts.json")) {
//   $contacts = json_decode(file_get_contents("contacts.json"), true);
// }else{
//   $contacts = [];
// }

$contacts = $conn->query("SELECT * FROM contacts");
// var_dump($contacts);
// die();

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/darkly/bootstrap.min.css" integrity="sha512-8RiGzgobZQmqqqJYja5KJzl9RHkThtwqP1wkqvcbbbHNeMXJjTaBOR+6OeuoxHhuDN5h/VlgVEjD7mJu6KNQXA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <!-- css static content-->
  <link rel="stylesheet" href="./static/css/index.css">
  <title>Contacts App</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" href="#">
        <img class="mr-2" src="./static/img/logo.png" />
        ContactsApp
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./add.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container pt-4 p-3">
      <div class="row">

        <!-- //ANCHOR - if -->
        <?php if ($contacts->rowCount() == 0) : ?>
          <div class="col-md-4 mx-auto">
            <div class="card card-body text-center">
              <p>No contacts save yet</p>
              <a href="./add.php">Add One Now!</a>
            </div>
          </div>
        <?php endif ?>

        <!-- //ANCHOR - foreach -->
        <?php foreach ($contacts as $contact) : ?>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-body">
                <h3 class="card-title text-capitalize"><?= $contact["name"] ?></h3>
                <p class="m-2"><?= $contact["phone_number"] ?></p>
                <a href="edit.php?id=<?= $contact["id"] ?>" class="btn btn-secondary mb-2">Edit Contact</a>
                <a href="delete.php?id=<?= $contact["id"] ?>" class="btn btn-danger mb-2">Delete Contact</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>

      </div>
    </div>
  </main>

</body>

</html>
