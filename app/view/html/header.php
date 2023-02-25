<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= $root ?>public/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="<?= $root ?>public/css/cyborg.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= $root ?>public/css/style.css" />
    <style>
      .roobotsList {
        height: 400px !important;
        overflow: scroll;
      }
    </style>
    <title><?= $title ?></title>
</head>
<nav class="navbar navbar-expand-md bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Robot Fight</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./addNew.php">Add new</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./fight.php">Fight</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<body>
  <!-- BLOBS -->
<img id="darkBlob" src="<?= $root?>public/img/DarkBlob.png" alt="DarkBlob" />
<img id="lightBlob" src="<?= $root?>public/img/LightBlob.png" alt="LightBlob" />
<img id="dashedBlob" src="<?= $root?>public/img/DashedBlob.png" alt="DashedBlob" />
