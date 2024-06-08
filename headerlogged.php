<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymGenius</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<?php
require_once("connection.php");

if (!isset($_SESSION["user_id"])) {
    redirect("logout.php");
}

$page = basename($_SERVER['PHP_SELF']);
$IdUser = $_SESSION["user_id"];

$query = "SELECT pagini.Meniu, pagini.nume_meniu, pagini.pagina 
          FROM pagini 
          INNER JOIN drepturi ON drepturi.IdPage = pagini.Id 
          WHERE drepturi.IdUser = '$IdUser'";
$sql1 = mysqli_query($db, $query);
$rows = mysqli_num_rows($sql1);

if ($rows > 0) {
    echo '<div class="grid-container">';
    echo '<div class="top-bar">';
    echo '<br><br>';
    echo '<div class="top-bar-left">';
    echo '<ul class="menu">';
    echo '<li class="menu-text">GymGenius</li>';

    $sw = 0;

    while ($myrow = mysqli_fetch_array($sql1, MYSQLI_ASSOC)) {
        if ($myrow["pagina"] == $page) {
            $sw = 1;
        }
        if ($myrow["Meniu"] == 1) {
            echo "<li><a href='" . $myrow["pagina"] . "'>" . $myrow["nume_meniu"] . "</a></li>";
        }
    }
    echo '</ul>';
    echo '</div>';
    echo '<div class="top-bar-right">';
    echo '<ul class="menu">';
    echo '<li><a href="logout.php" class="button">Logout</a></li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

if ($sw == 0) {
    redirect("logout.php");
}
?>
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>
</body>
</html>
