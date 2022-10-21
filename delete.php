<?php
require "db.php";
session_start();

if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  return;
}

$id = $_GET["id"];

$statement = $conn->prepare("SELECT * FROM contacts WHERE id = :id LIMIT 1");
$statement->execute([":id" => $id]); //shortcut

if ($statement->rowCount() == 0) {
  http_response_code(404);
  echo ("HTTP 404 NOT FOUND");
  return;
}

// Para que no eliminen o editen contactos de otros usurios
$contact = $statement->fetch(PDO::FETCH_ASSOC);
if ($contact["user_id"]!==$_SESSION["user"]["id"]) {
  http_response_code(403);
  echo("<h1>"."HTTP 403 UNAUTHORIZED Pinchi juacker"."</h1>");
  return;
}

$conn->prepare("DELETE FROM contacts WHERE id = :id")->execute([":id" => $id]); //shortcut


// $statement = $conn->prepare("DELETE FROM contacts WHERE id = :id");
// $statement->execute()([":id"=>$id]); //shortcut
// $statement->bindParam(":id", $id);
// $statement->execute();

header("Location: home.php");
