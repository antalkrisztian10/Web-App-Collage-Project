<?php
require_once("connection.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    redirect("index.php");
}

include 'headerlogged.php';

$user_id = $_SESSION["user_id"];
$user_type = "";

$query = "SELECT type FROM users WHERE id = '$user_id'";
$result = mysqli_query($db, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_type = $row['type'] == 1 ? "Admin" : "User";
}

?>

<main>

</main>

<div class="grid-container">
    <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
            <h2>Account Settings</h2>
            <p>Account Type: <?php echo $user_type; ?></p>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_password'])) {
                $current_password = trim($_POST['current_password']);
                $new_password = trim($_POST['new_password']);

                $query = "SELECT password FROM users WHERE id = '$user_id'";
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_assoc($result);

                if ($row && $current_password == $row['password']) {
                    $update_query = "UPDATE users SET password = '$new_password' WHERE id = '$user_id'";
                    if (mysqli_query($db, $update_query)) {
                        echo "Password updated successfully.";
                    } else {
                        echo "Error updating password: " . mysqli_error($db);
                    }
                } else {
                    echo "Current password is incorrect.";
                }
            }
            ?>

            <form method="post" action="">
                <label>Current Password:
                    <input type="password" name="current_password" required>
                </label>
                <label>New Password:
                    <input type="password" name="new_password" required>
                </label>
                <button type="submit" class="button" name="update_password">Update Password</button>
            </form>
            <br>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
