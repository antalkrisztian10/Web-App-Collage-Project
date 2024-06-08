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
            <h2>Add Product</h2>
            <form method="post" action="add_product.php" enctype="multipart/form-data">
                <label>Name:
                    <input type="text" name="name" required>
                </label>
                <label>Description:
                    <textarea name="description" required></textarea>
                </label>
                <label>Price:
                    <input type="text" name="price" required>
                </label>
                <label>Image:
                    <input type="file" name="image_url" accept="image/*" required>
                </label>
                <button type="submit" class="button">Add Product</button>
            </form>
            <br>
            <a href="admin_products.php" class="button">Back to Operations</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
