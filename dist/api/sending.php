<?php
  include "config.php";

  header("Access-Control-Allow-Origin:*");

  $conn = new mysqli($server, $username, $password, $db);

  if ($conn->connect_error) {
    die("连接失败：" . $conn->connect_error);
  }
  else {
    $sql = "select * from express_" . $_POST["param"] . " where send='" . $_POST['username'] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $json = [];
      while ($row = $result->fetch_assoc()) {
        // print_r(array_keys($row));
        $item["id"] = $row["Id"];
        $item["name"] = $row["name"];
        $item["from"] = $row["from"];
        $item["dest"] = $row["dest"];
        $item["at"] = $row["at"];
        $item["send"] = $row["send"];
        $item["recv"] = $row["recv"];
        $item["zip_code"] = $row["zip_code"];
        $item["shelf_position"] = $row["shelf_position"];
        $item["description"] = $row["description"];
        $item["image"] = $row["image"];
        array_push($json, $item);
      }
    }
    echo json_encode($json);
  }
?>
