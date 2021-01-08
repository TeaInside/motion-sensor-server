<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
<?php load_view("layout/header"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/home.css?t=<?php echo time(); ?>"/>
  <script type="text/javascript" src="<?php echo asset("js/home.js"); ?>"></script>
</head>
<body>
<!-- <div id="loadingCage">
  <div class="loadingText">
    <h1>Loading Data...</h1>
  </div>
</div> -->
<div class="logoutCage">
  <a href="logout.php"><button>Logout</button></a>
</div>
<div id="mainData">
  <div class="drText">
    <h2>Data realtime monitoring</h2>
  </div>
  <table id="tableData" border="1">
  </table>
</div>
<script type="text/javascript">
</script>
</body>
</html>