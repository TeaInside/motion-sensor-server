<?php

if (!isset($_SERVER["HTTP_API_KEY"])) {
  exit;
}

$pdo = DB::pdo();
$pdo->prepare("INSERT INTO motion_history (device_id, created_at) SELECT device_id, NOW() FROM devices WHERE api_key = ?")->execute([$_SERVER["HTTP_API_KEY"]]);
echo ["status" => "ok", "id" => $pdo->lastInsertId()];
