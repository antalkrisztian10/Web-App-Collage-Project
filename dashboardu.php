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
    <div class="cell text-center">
        <h1>Welcome To GymGenius</h1>
    </div>
</div>
<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <div class="orbit-wrapper">
    <div class="orbit-controls">
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
    </div>
    <ul class="orbit-container">
      <li class="is-active orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://www.ptacademy.edu.au/wp-content/uploads/2023/02/Untitled-design-59.png" alt="Space">
          <figcaption class="orbit-caption">Find Your Favourite Trainers!</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://www.evolutionnutrition.com/sites/default/files/article-images/blog-x-factor_0.jpg" alt="Space">
          <figcaption class="orbit-caption">Choose your workout!</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://burnnsweat.com/wp-content/uploads/2017/09/strength-workout.jpg" alt="Space">
          <figcaption class="orbit-caption">Enjoy a healthy lifestyle</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://sportswestathleticclub.com/wp-content/uploads/2023/08/medium-shot-people-training-together-2.jpg" alt="Space">
          <figcaption class="orbit-caption">Start working out today!</figcaption>
        </figure>
      </li>
    </ul>
  </div>
  <nav class="orbit-bullets">
    <button class="is-active" data-slide="0">
      <span class="show-for-sr">First slide details.</span>
      <span class="show-for-sr" data-slide-active-label>Current Slide</span>
    </button>
    <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
    <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
    <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
  </nav>
</div>

<a class="button expanded" href="antrenamente.php">Popular Workouts</a>

<div class="grid-x grid-padding-x">
    <div class="cell text-center">
        <h1>Find Your Favorite Recipes </h1>
    </div>
</div>
<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <div class="orbit-wrapper">
    <div class="orbit-controls">
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
    </div>
    <ul class="orbit-container">
      <li class="is-active orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://www.fyp365.com/wp-content/uploads/2024/03/carbohydrate-food-carbs-bread-veg-fruit-grain-1200x500-1.jpg" alt="Space">
          <figcaption class="orbit-caption">Start Eating Healthier</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://www.vitality.co.uk/media-online/uploads/2023/12/overdoing-it-at-christmas-main.jpg" alt="Space">
          <figcaption class="orbit-caption">Choose Your Favorite Recipe</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://veganessentials.com/cdn/shop/articles/vegan-prepared-food_fb8d0c1b-67e7-4306-835c-95d73c9b67c3.jpg?v=1673971403" alt="Space">
          <figcaption class="orbit-caption">Variety Of Vegan Foods</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://thomsonscientific.com/wp-content/uploads/2023/06/The-role-of-water-in-bodybuilding-nutrition-1.png" alt="Space">
          <figcaption class="orbit-caption">Food Prepared For Athletes</figcaption>
        </figure>
      </li>
    </ul>
  </div>
  <nav class="orbit-bullets">
    <button class="is-active" data-slide="0">
      <span class="show-for-sr">First slide details.</span>
      <span class="show-for-sr" data-slide-active-label>Current Slide</span>
    </button>
    <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
    <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
    <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
  </nav>
</div>

<a class="button expanded" href="recipes.php">Popular Recipes</a>

<div class="grid-x grid-padding-x">
    <div class="cell text-center">
        <h1>New Gym Equipment</h1>
    </div>
</div>
<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <div class="orbit-wrapper">
    <div class="orbit-controls">
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
    </div>
    <ul class="orbit-container">
      <li class="is-active orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://www.teamstronghold.com/wp-content/uploads/2019/01/Cardio-Equipment-in-Glenco-MN-at-The-Strong-Hold-Gym.jpg" alt="Space">
          <figcaption class="orbit-caption">Enjoy Brand New Equipment</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://www.lexcocable.com/media/h5gp1jvz/blog-interior-image-a-single-pulley.jpg" alt="Space">
          <figcaption class="orbit-caption">Clean and shiny</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://www.swellpalmerston.com.au/getmedia/df3429fa-10ae-4b54-a5ea-1f50a944b9fe/Untitled-design-(4).png?ext=.png" alt="Space">
          <figcaption class="orbit-caption">Enjoy it with friends</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://i0.wp.com/perfectgymsolutions.com/wp-content/uploads/2019/12/UNI-OF-SURREY22.png?fit=1200%2C500&ssl=1" alt="Space">
          <figcaption class="orbit-caption">100% American Brands</figcaption>
        </figure>
      </li>
    </ul>
  </div>
  <nav class="orbit-bullets">
    <button class="is-active" data-slide="0">
      <span class="show-for-sr">First slide details.</span>
      <span class="show-for-sr" data-slide-active-label>Current Slide</span>
    </button>
    <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
    <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
    <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
  </nav>
</div>

<a class="button expanded" href="equipments.php">Popular Equipments</a>


<div class="grid-x grid-padding-x">
    <div class="cell text-center">
        <h1>Quality Gym Products</h1>
    </div>
</div>
<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <div class="orbit-wrapper">
    <div class="orbit-controls">
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
    </div>
    <ul class="orbit-container">
      <li class="is-active orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://www.kaged.com/cdn/shop/collections/stacks_Small_90c84c3d-1021-4ba4-a556-76817d9263f0.png?v=1692212039" alt="Space">
          <figcaption class="orbit-caption">Get Your Daily Supliments</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://erp-image.sgliteasset.com/_next/image?url=https%3A%2F%2Fcdn1.sgliteasset.com%2Fnutrivel%2Fimages%2Ftexteditor%2FMoreToYou_1200x500_1680439254.jpg&w=3840&q=75" alt="Space">
          <figcaption class="orbit-caption">100% Vegan Products</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://www.kaged.com/cdn/shop/collections/stacks_Small_90c84c3d-1021-4ba4-a556-76817d9263f0.png?v=1692212039" alt="Space">
          <figcaption class="orbit-caption">Only quality products</figcaption>
        </figure>
      </li>
      <li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="https://erp-image.sgliteasset.com/_next/image?url=https%3A%2F%2Fcdn1.sgliteasset.com%2Fnutrivel%2Fimages%2Ftexteditor%2FMoreToYou_1200x500_1680439254.jpg&w=3840&q=75" alt="Space">
          <figcaption class="orbit-caption">The cheapest price in town</figcaption>
        </figure>
      </li>
    </ul>
  </div>
  <nav class="orbit-bullets">
    <button class="is-active" data-slide="0">
      <span class="show-for-sr">First slide details.</span>
      <span class="show-for-sr" data-slide-active-label>Current Slide</span>
    </button>
    <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
    <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
    <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
  </nav>
</div>

<a class="button expanded" href="products.php">Popular Products</a>

<?php include 'footer.php'; ?>
