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
// die()
?>

<?php require "partials/header.php" ?>

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
    <!-- //ANCHOR - foreach  -->
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

<?php require "partials/footer.php" ?>
