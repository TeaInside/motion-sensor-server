<?php

require __DIR__."/../bootstrap/web.php";

if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
} else if (isset($_GET["action"])) {
  load_api("home");
} else {
  load_view("login");
}
