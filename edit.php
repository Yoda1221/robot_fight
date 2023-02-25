<?
$root = "./";
$title = "Add New";
require './config/connect.php';
require_once "./vendor/autoload.php";

if(isset($_GET["id"])) {
    $id     = $_GET["id"];
    $query  = "SELECT `id`, `name`, `type`, `power`, `created_at` FROM `robots` WHERE `id` = $id ";
    $item = mysqli_fetch_object(mysqli_query($conn, $query));
}
if(isset($_POST["submit"])) {
    $id     = $_GET["id"];
    $name     = mysqli_real_escape_string($conn, $_POST["name"]);
    $type     = mysqli_real_escape_string($conn, $_POST["type"]);
    $power    = mysqli_real_escape_string($conn, $_POST["power"]);
    $query  = "UPDATE `robots` SET `name`='$name',`type`='$type',`power`='$power' WHERE `id`=$id  ";
    $result = mysqli_query($conn, $query);
    $msg    = $result === true ? "Success" : "Failed";
    $type   = $result === true ? "success" : "warning";
    $_SESSION['msg']    = "Updat item in database <strong>$msg</strong>!";
    $_SESSION['type']   = $type;
    header("Location: index.php");
}

include_once "./app/view/html/header.php";
?>

<div class="container mt-5">
    <h2>Update</h2>
    <form autocomplete="off" action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input 
                name="name" 
                type="text" 
                value="<?= $item ? $item->name : "" ?>"
                class="form-control form-control-sm" 
            />
        </div>
        <div class="row">
            <div class="col">
                <label for="type" class="form-label">Type</label>
                <select name="type" class="form-select form-select-sm">
                    <option 
                        value="brawler" 
                        <?= $item->type == "brawler" ? "selected" : "" ?>
                    >
                        Brawler
                    </option>
                    <option 
                        value="rouge"
                        <?= $item->type == "rouge" ? "selected" : "" ?>
                    >
                        Rouge
                    </option>
                    <option 
                        value="assault"
                        <?= $item->type == "assault" ? "selected" : "" ?>
                    >
                        Assault
                    </option>
                </select>
            </div>
            <div class="col d-flex justify-content-center gap-2 align-items-end">
                <button 
                    id="down" 
                    type="button" 
                    class="btn btn-sm btn-danger" 
                    data-power=<?= $item ? $item->power : "" ?>
                >
                    down
                </button>
                <div>
                    <label for="power" class="form-label" >Power</label>
                    <input 
                        id="power"
                        name="power" 
                        type="text" 
                        class="form-control form-control-sm" 
                        value="<?= $item ? $item->power : "" ?>"
                        readonly
                    />
                </div>
                <button 
                    id="up" 
                    type="button" 
                    class="btn btn-sm btn-success" 
                    data-power=<?= $item ? $item->power : "" ?>
                >
                    up
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="./index.php" type="submit" class="btn btn-warning rounded-pill px-5 mt-5">Cancel</a>
            </div>
            <div class="col d-flex justify-content-md-end">
                <button type="submit" name="submit" class="btn btn-info rounded-pill px-5 mt-5" ">Update</button>
            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const up    = document.querySelector("#up")
        const down  = document.querySelector("#down")
        const power = document.querySelector("#power")

        down.addEventListener('click', (e) => {
            e.preventDefault()
            power.value = getRandomInt(10, down.dataset.power)
        })
        up.addEventListener('click', (e) => {
            e.preventDefault()
            power.value = getRandomInt(e.target.dataset.power, 100)
        })
    })
    
    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min) + min); // The maximum is exclusive and the minimum is inclusive
    }

</script>
<? 
include_once "./app/view/html/header.php";
?>