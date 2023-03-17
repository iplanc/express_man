<?php
  //Author: PlanC
  //Date: 2023-03-17 09:48:05
  //LastEditTime: 2023-03-17 16:35:35
  //FilePath: \express_man\public\api\test.php
?>

<?php
  include "config.php";

  header("Access-Control-Allow-Origin:*");

  $conn = new mysqli($server, $username, $password, $db);

  if ($conn->connect_error) {
    die("连接失败：" . $conn->connect_error);
  }
  else {
    $sql = "select password='" . strtoupper(md5($_GET['password'])) . "' as verify, id from users where username='" . $_GET['username'] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      // print_r(array_keys($row));
      $json['result'] = (bool)$row['verify'];
      $json['id'] = $row['id'];
      $json['param']['username'] = $_GET['username'];
      $json['param']['password'] = md5($_GET['password']);
    }
    echo json_encode($json);
  }
?>
