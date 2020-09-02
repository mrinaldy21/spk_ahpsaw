<?php
include "../koneksi.php";
include "../variableStore.php";
// session_start();

if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='" . $username . "' AND password='" . $password . "';";
    $stmt = $con->query($sql);
    $result = $stmt->fetch_assoc();
    $params = array(
        ":username" => $username,
        ":password" => $password,
    );
    if ($result) {
        $_SESSION["iduser"] = $result["id"];
        $_SESSION['data'] = $result;
        header("Location: http://$baseUrl"."/admin/index.php?modul=dashboard");
        //var_dump($result["id"]);
    } else {
        header("Location: http://$baseUrl");
    }
} else {
    header("Location: http://$baseUrl");
}
