<?
require './config/connect.php';
require_once "./vendor/autoload.php";

if(isset($_GET["id"])) {
    $id         = $_GET["id"];
    $query      = "DELETE FROM robots WHERE id = '$id' ";
    $result     = mysqli_query($conn, $query);
    $msg        = $result === true ? "Success" : "Failed";
    $type       = $result === true ? "success" : "warning";
    header("Location: index.php?msg=Delete from database $msg!&type=$type");
}

?>
