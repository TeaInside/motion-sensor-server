<?php

if (isset($_GET["action"])) {
  $json = handle_login_action();
  header("Content-Type: application/json");
  echo json_encode($json, JSON_UNESCAPED_SLASHES);
  exit;
}

/**
 * @return array
 */
function handle_login_action()
{
  if (isset($_POST["username"], $_POST["password"])
      && is_string($_POST["username"])
      && is_string($_POST["password"])) {

    $username = strtolower(trim($_POST["username"]));
    $pdo = DB::pdo();
    $st  = $pdo->prepare("SELECT user_id, password FROM users WHERE username = ?");
    $st->execute([$username]);
    if ($r = $st->fetch(PDO::FETCH_ASSOC)) {
      if (password_verify($_POST["password"], $r["password"])) {
        $_SESSION["user_id"]  = $r["user_id"];
        $_SESSION["username"] = $username;
        return ["status" => "ok", "redirect" => "home.php"];
      }
    }
  }

  return ["status" => "err", "alert" => "Wrong username or password!"];
}
