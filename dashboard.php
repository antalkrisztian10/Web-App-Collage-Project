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
            <center><h2>Admin Operations</h2></center>
            </br><center><a href="admin_users.php" class="button">Users Page</a></center>
            </br><center><a href="admin_workouts.php" class="button">Workouts Page</a></center>
            </br><center><a href="admin_recipes.php" class="button">Recipes Page</a></center>
            </br><center><a href="admin_equipments.php" class="button">Equipments Page</a></center>
            </br><center><a href="admin_products.php" class="button">Products Page</a></center>
            </br><center><a href="admin_news.php" class="button">News Page</a></center>
            </br><center><a href="admin_memberships.php" class="button">Memberships Page</a></center>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
