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
                <h2>All News</h2>
                </br>

                <?php
                $db = new mysqli("localhost", "root", "", "gym_genius");

                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }

                $sqlv = "SELECT id, title, description, image_url, published_date FROM gym_news";
                $resultv = mysqli_query($db, $sqlv);

                if (!$resultv) {
                    die('Invalid query:' . mysqli_error($db));
                } else {
                    echo '<div class="table-responsive">';
                    echo "<table class=\"unstriped\">";
                    echo "<thead><tr><th width=\"100\"><b>Title</b></th><th width=\"300\"><b>Description</b></th><th width=\"150\"><b>Image</b></th><th width=\"150\"><b>Published Date</b></th><th width=\"100\"><b>Actions</b></th></tr></thead><tbody>";
                    while ($row = mysqli_fetch_array($resultv, MYSQLI_ASSOC)) {
                        echo "<tr><td>";
                        echo $row["title"];
                        echo "</td><td>";
                        echo $row["description"];
                        echo "</td><td>";
                        echo "<img src='" . $row["image_url"] . "' alt='News Image' style='width: 200px;'>";
                        echo "</td><td>";
                        echo $row["published_date"];
                        echo "</td><td>";
                        echo "<a href='edit_news.php?id=" . $row["id"] . "' class='button'>Edit</a>";
                        echo "</td></tr>";
                    }
                    echo "</tbody></table>";
                    echo '</div>';
                }

                $db->close();
                ?>

                </br>
                <a href="admin_news.php" class="button">Back to News</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
