<?php
include 'connection.php';

if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
    header("Location: dashboard.php");
    exit();
}

include 'header.php';

$mode = "";
$title = "Autentificare";

if (isset($_POST['mode'])) {
    $mode = $_POST['mode'];
}

if ($mode == "loginare") {
    $username = trim($_POST['username']);
    $pass = trim($_POST['user_password']);

    if ($username != "" && $pass != "") {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$pass'";
        $results = mysqli_query($db, $sql);

        if ($results && mysqli_num_rows($results) > 0) {
            $sql2 = mysqli_query($db, "SELECT users.Id, users.nume, users.username, user_types.redirect, dash_text.content_text, dash_text.titlu
                                       FROM users
                                       LEFT JOIN dash_text ON users.type = dash_text.user_type_id
                                       LEFT JOIN user_types ON users.type = user_types.Id
                                       WHERE users.username = '$username' AND users.password = '$pass'");
            if ($sql2 && mysqli_num_rows($sql2) > 0) {
                $myrow1 = mysqli_fetch_assoc($sql2);

                $_SESSION["user_id"] = $myrow1["Id"];
                $_SESSION["name"] = $myrow1["nume"];
                $_SESSION["username"] = $myrow1["username"];
                $_SESSION["titlu"] = $myrow1["titlu"];
                $_SESSION["continut"] = $myrow1["content_text"];

                header("Location: " . $myrow1["redirect"]);
                exit();
            }
        }
    }
    header("Location: index.php");
    exit();
}
?>
<div class="page-header">
    <h1><?php echo $title ?></h1>
</div>
<form name="contact_form" id="contact_form" method="post" action="">
    <div class="row">
        <input type="hidden" name="mode" value="loginare">
        <div class="columns large-centered large-5 medium-5 medium-centered small-12 small-centered cell">
            Username: <input type="text" name="username" required>
        </div>
        <div class="columns large-centered large-5 medium-5 medium-centered small-12 small-centered cell">
            Parola: <input type="password" name="user_password" required>
        </div>
        <div class="large-8 medium-8 small-8 columns">
            <button type="submit" class="success button" name="submit">Logare</button>
        </div>
    </div>
</form>

<?php include 'footer.php'; ?>
