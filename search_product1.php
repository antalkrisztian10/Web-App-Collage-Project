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
            <h2>Search Product</h2>
            <form method="post" action="search_product.php">
                <label>Name:
                    <input type="text" name="name">
                </label>
                <button type="submit" class="button">Search Product</button>
            </form>
            <br>
            <a href="admin_products.php" class="button">Back to Operations</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
