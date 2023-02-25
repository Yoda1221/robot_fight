<?
$root = "./";
$title = "Add New";
require './config/connect.php';
require_once "./vendor/autoload.php";

if(isset($_POST["submit"])) {
    $name     = mysqli_real_escape_string($conn, $_POST["name"]);
    $type     = mysqli_real_escape_string($conn, $_POST["type"]);
    $power    = mysqli_real_escape_string($conn, $_POST["power"]);
    $query    = "INSERT INTO robots(`name`, `type`, `power`) VALUES('$name', '$type', '$power')";
    $result   = mysqli_query($conn, $query);
    $msg      = $result === true ? "Success" : "Failed";
    $type     = $result === true ? "success" : "warning";
    $_SESSION['msg']    = "Insert to database <strong>$msg</strong>!";
    $_SESSION['type']   = $type;
    header("Location: index.php");
}
$power = rand(10,100);
include_once "./app/view/html/header.php";
?>
<div class="container mt-5">
    <h2>Add New</h2>
    <form autocomplete="off" action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control form-control-sm" name="name" />
        </div>
        <div class="row">
            <div class="col">
                <label for="type" class="form-label">Type</label>
                <select name="type" class="form-select form-select-sm">
                    <option selected>Choose...</option>
                    <option value="brawler">Brawler</option>
                    <option value="rouge">Rouge</option>
                    <option value="assault">Assault</option>
                </select>
            </div>
            <div class="col">
                <label for="power" class="form-label">Power</label>
                <input type="text" class="form-control form-control-sm" name="power" value="<?= $power ?>" readonly />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="./index.php" type="submit" class="btn btn-warning rounded-pill px-5 mt-5">Cancel</a>
            </div>
            <div class="col d-flex justify-content-md-end">
                <button type="submit" name="submit" class="btn btn-info rounded-pill px-5 mt-5" ">Save</button>
            </div>
        </div>
    </form>
</div>

<? 
include_once "./app/view/html/footer.php";
?>
