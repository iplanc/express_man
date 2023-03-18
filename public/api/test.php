<?php
  include "config.php";

  header("Access-Control-Allow-Origin:*");

  $conn = new mysqli($server, $username, $password, $db);

  if ($conn->connect_error) {
    die("连接失败：" . $conn->connect_error);
  }
  else {
    $sql = "select password='" . strtoupper(md5($_POST['password'])) . "' as verify, id from users where username='" . $_POST['username'] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      // print_r(array_keys($row));
      $json['result'] = (bool)$row['verify'];
      $json['id'] = $row['id'];
      $json['param']['username'] = $_POST['username'];
      $json['param']['password'] = md5($_POST['password']);
    }
    echo json_encode($json);
  }
?>
