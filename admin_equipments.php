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
        <center><h2>Equipments Operations</h2></center>
            </br><center><a href="view_equipments.php" class="button">View All Equipments</a></center>
            </br><center><a href="add_equipment1.php" class="button">Add Equipment</a></center>
            </br><center><a href="delete_equipment1.php" class="button">Delete Equipment</a></center>
            </br><center><a href="search_equipment1.php" class="button">Search Equipment</a></center>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
