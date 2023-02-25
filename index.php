<?
$root = "./";
$title = "Robot Fight";
require __DIR__.'/vendor/autoload.php';
require "./config/connect.php";
$select = "SELECT `id`, `name`, `type`, `power`, `created_at` FROM robots";
$rows   = mysqli_fetch_all(mysqli_query($conn, $select));
include_once "./app/view/html/header.php";
?>
<div class="container">
    <h1 class="my-3">Robot fight</h1>
    <div class="alert alert-<?= isset($_SESSION['msg']) ? $_SESSION["type"] : "" ?> text-center" >
        <?= isset($_SESSION["msg"]) ? $_SESSION["msg"] : "&nbsp;" ?>
        <? unset($_SESSION['msg']) ?>
    </div>
    <h6>You have <?= count($rows) ?> robots</h6>
    <ul class="list-group roobotsList" style="opacity: 0.85">
        <li class="list-group-item list-group-item-info">
            <div class="row">
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-4 text-center">name</div>
                <div class="col-md-3 text-center">type</div>
                <div class="col-md-1 text-center">power</div>
                <div class="col-md-3">&nbsp;</div>
            </div>
        </li>
        <? foreach($rows as $row) : ?>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-1 text-end"><?= $row[0] ?></div>
                <div class="col-md-4"><?= $row[1] ?></div>
                <div class="col-md-3"><?= $row[2] ?></div>
                <div class="col-md-1 text-center"><?= $row[3] ?></div>
                <div class="col-md-3 d-flex justify-content-center gap-2">
                    <a 
                        class="link-success"
                        href="./edit.php?id=<?= $row[0] ?>" 
                    >
                        <i class="fa-solid fa-pen-to-square fs-5 me-3 fw-lighter"></i>
                    </a>
                    <a 
                        class="link-danger fw-lighter"
                        href="./delete.php?id=<?= $row[0] ?>" 
                        onClick="javascript: return confirm('Please confirm deletion');" 
                    >
                        <i class="fa-solid fa-trash fs-5"></i>
                    </a>
                </div>
            </div>
        </li>
        <? endforeach; ?>
    </ul>
</div>

<? include_once "./app/view/html/header.php" ?>
