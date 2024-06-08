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
                <h2>Delete Membership Plan</h2>
                <form method="post" action="delete_membership.php">
                    <label>Plan Name:
                        <input type="text" name="plan_name" required>
                    </label>
                    <button type="submit" class="button">Delete Membership Plan</button>
                </form>
                <br>
                <a href="admin_memberships.php" class="button">Back to Membership Plans</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
