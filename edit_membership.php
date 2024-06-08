<?php
require_once("connection.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    redirect("index.php");
}

include 'headerlogged.php';
?>

<main>
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">
                <h2>Edit Membership Plan</h2>

                <?php
                $db = new mysqli("localhost", "root", "", "gym_genius");

                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }

                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM membership_plans WHERE id='$id'";
                    $result = mysqli_query($db, $sql);

                    if (!$result) {
                        die('Invalid query: ' . mysqli_error($db));
                    }

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        ?>

                        <form method="post" action="edit_membership.php?id=<?php echo $id; ?>">
                            <div class="row">
                                <div class="large-8 medium-8 small-12 columns">
                                    Plan Name: <input type="text" name="plan_name" value="<?php echo $row['plan_name']; ?>" required>
                                    Price: <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>" required>
                                    Duration (days): <input type="number" name="duration" value="<?php echo $row['duration']; ?>" required>
                                    Benefits: <textarea name="benefits" required><?php echo $row['benefits']; ?></textarea>
                                </div>
                                <div class="large-8 medium-8 small-8 columns">
                                    <button type="submit" class="success button" name="btnSubmit">Update</button>
                                </div>
                            </div>
                        </form>

                        <?php
                    } else {
                        echo "</br>No record found with this ID!";
                    }
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $plan_name = $_POST['plan_name'];
                    $price = $_POST['price'];
                    $duration = $_POST['duration'];
                    $benefits = $_POST['benefits'];

                    $sql_upd = "UPDATE membership_plans SET plan_name='$plan_name', price='$price', duration='$duration', benefits='$benefits' WHERE id='$id'";

                    $result_upd = mysqli_query($db, $sql_upd);

                    if (!$result_upd) {
                        die('Invalid query: ' . mysqli_error($db));
                    } else {
                        echo "The record has been updated.</br>";
                    }
                }

                $db->close();
                ?>

                </br>
                <a href="view_memberships.php" class="button">Back to Membership Plans</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
