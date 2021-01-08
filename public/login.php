<?php

require __DIR__."/../bootstrap/web.php";

if (isset($_SESSION["user_id"])) {
  header("Location: home.php");
} else if (isset($_GET["action"])) {
  load_api("login");
} else {
  load_view("login");
}
