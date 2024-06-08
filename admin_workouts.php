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
            <center><h2>Workouts Operations</h2></center>
            </br><center><a href="vizualizare.php" class="button">View All Workouts</a></center>
            </br><center><a href="adauga1.php" class="button">Add Workout</a></center>
            </br><center><a href="sterge1.php" class="button">Delete Workout</a></center>
            </br><center><a href="cauta1.php" class="button">Search Workout</a></center>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
