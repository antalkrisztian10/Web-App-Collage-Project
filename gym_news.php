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
            <div class="cell">
                <h1>Gym News</h1>
            </div>
        </div>

        <?php

        $db = new mysqli("localhost", "root", "", "gym_genius");

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $sql = "SELECT id, title, description, image_url, published_date FROM gym_news";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="grid-x grid-padding-x">';
            while($row = $result->fetch_assoc()) {
                echo '
                <div class="cell medium-4">
                    <div class="news">
                        <h2>' . $row["title"] . '</h2>
                        <img src="' . $row["image_url"] . '" alt="News Image" style="width: 400px; height: 350px;">
                        <p>' . $row["description"] . '</p>
                        <a href="viz_news.php?id=' . $row["id"] . '" class="button expanded">View Details</a>
                    </div>
                </div>';
            }
            echo '</div>';
        } else {
            echo "<p>No news found.</p>";
        }

        $db->close();
        ?>
    </div>
</main>

<?php include 'footer.php'; ?>
