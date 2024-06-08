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
            <center><h2>Products Operations</h2></center>
            </br><center><a href="view_products.php" class="button">View All Products</a></center>
            </br><center><a href="add_product1.php" class="button">Add Product</a></center>
            </br><center><a href="delete_product1.php" class="button">Delete Product</a></center>
            </br><center><a href="search_product1.php" class="button">Search Product</a></center>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
