<?php
require_once("connection.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    redirect("index.php");
}

include 'headerlogged.php';
?>

<main>

</main>

<div class="grid-container">
    <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
            <center><h2>Membership Plans Operations</h2></center>
            </br><center><a href="view_memberships.php" class="button">View All Membership Plans</a></center>
            </br><center><a href="add_membership1.php" class="button">Add Membership Plan</a></center>
            </br><center><a href="delete_membership1.php" class="button">Delete Membership Plan</a></center>
            </br><center><a href="search_membership1.php" class="button">Search Membership Plan</a></center>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
