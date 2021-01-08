<?php

if (!isset($_SESSION["user_id"])) {
  exit;
}

if (isset($_GET["action"]) && is_string($_GET["action"])) {
  $json = [];

  switch ($_GET["action"]) {
    case "get_table_data":
      $json = get_table_data();
      break;
  }

  header("Content-Type: application/json");
  echo json_encode($json, JSON_UNESCAPED_SLASHES);
  exit;
}

/**
 * @return array
 */
function get_table_data()
{
  $pdo = DB::pdo();
  $st  = $pdo->prepare("SELECT b.motion_id, a.name, b.created_at FROM devices AS a INNER JOIN motion_history AS b ON a.device_id = b.device_id ORDER BY b.motion_id DESC LIMIT 10");
  $st->execute();
  return $st->fetchAll(PDO::FETCH_ASSOC);
}
