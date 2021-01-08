<?php

require __DIR__."/bootstrap/global.php";

$pdo = DB::pdo();

$st = $pdo->prepare("INSERT INTO motion_history (device_id, created_at) VALUES (?, ?)");

$time = time() - (3600 * 24 * 4);

$devices = [1, 2];

for ($i=0; $i < 50; $i++) { 
  $st->execute([$devices[rand(0, 1)], date("Y-m-d H:i:s", $time)]);
  $time += rand(3, 3600 * 2);
}

$st = $st->execute();
