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
            <div class="cell medium-8 medium-offset-2 small-10 small-offset-1">
                <section id="about">
                    <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="cell text-center">
                                <h2>About GymGenius</h2>
                                <p>GymGenius is your ultimate fitness companion, dedicated to helping you achieve your health and wellness goals. Whether you're a seasoned gym-goer or just starting your fitness journey, GymGenius provides you with the tools, resources, and support you need to succeed.</p>
                                <p>Our mission is to empower individuals to lead healthier, happier lives through exercise, nutrition, and lifestyle choices. With a wide range of workouts, expert trainers, and personalized plans, GymGenius makes it easy to stay motivated and stay on track.</p>
                                <p>Join the GymGenius community today and take the first step towards a stronger, fitter you!</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
