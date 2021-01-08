<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
<?php load_view("layout/header"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/login.css?t=<?php echo time(); ?>"/>
</head>
<body>
  <div class="main-cage">
    <div class="login-cage">
      <h1>Login Motion Sensor Dashboard</h1>
      <form id="login_form" method="post" action="javascript:void(0);">
        <div class="in-label">Username:</div>
        <div class="in-cage"><input type="text" name="username" required="1"/></div>
        <div class="in-label">Password:</div>
        <div class="in-cage"><input type="password" name="password" required="1"/></div>
        <div class="in-cage in-btn-login"><button>Login</button></div>
      </form>
    </div>
  </div>
<script type="text/javascript">
  let form = document.getElementById("login_form");
  form.addEventListener("submit", function () {
    let ch = new XMLHttpRequest;
    ch.withCredentials = true;
    ch.onload = function () {
      let json = JSON.parse(this.responseText);
      if (typeof json.alert != "undefined")
        alert(json.alert);
      if (typeof json.redirect != "undefined")
        window.location = json.redirect;
    };
    ch.open("POST", "login.php?action=1");
    ch.send(new FormData(form));
  });
</script>
</body>
</html>