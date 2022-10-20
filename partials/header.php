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

  <!-- ?php var_dump($_SERVER["REQUEST_URI"]);
        die(); ? -->
  <!-- ?php $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
  var_dump($uri);
  die(); ? -->

  <?php $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) ?>
  <!-- ?php if ($uri == "/" || $uri == "/index.php"): ?> -->
  <?php if ($uri == "/contacts-app/" || $uri == "/contacts-app/index.php"): ?>
    <script defer src="./static/js/welcome.js"></script>
  <?php endif ?>

  <title>Contacts App</title>
</head>

<body>
  <?php require "navbar.php" ?>

  <main>

    <!-- content here -->
