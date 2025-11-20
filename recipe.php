<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Sample recipe data
$recipes = [
    [
        "name" => "Burger",
        "category" => "Breakfast",
        "rating" => 4,
        "description" => "Crispy grilled patty with cheese.",
        "image" => "assets/burger.jpg",
        "time" => "12 mins"
    ],
    [
        "name" => "Chicken Pasta",
        "category" => "Dinner",
        "rating" => 4,
        "description" => "Creamy Italian chicken pasta with herbs and parmesan.",
        "image" => "assets/chicken_pasta.jpg",
        "time" => "25 mins"
    ],
    [
        "name" => "French Toast",
        "category" => "Breakfast",
        "rating" => 5,
        "description" => "Classic golden French toast with maple syrup.",
        "image" => "assets/french_toast.jpg",
        "time" => "10 mins"
    ],
    [
        "name" => "Veg Salad",
        "category" => "Lunch",
        "rating" => 3,
        "description" => "Healthy mixed vegetable salad with olive oil dressing.",
        "image" => "assets/veg_salad.jpg",
        "time" => "15 mins"
    ],
    [
        "name" => "Grilled Sandwich",
        "category" => "Snack",
        "rating" => 4,
        "description" => "Crispy grilled sandwich with cheese and veggies.",
        "image" => "assets/grilled_sandwich.jpg",
        "time" => "12 mins"
    ]
];

// Collect unique categories
$categories = [];
foreach ($recipes as $r) {
    $categories[$r['category']] = true;
}

// Get search and filter
$search = strtolower($_GET['search'] ?? "");
$filter = $_GET['category'] ?? "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Recipes — Smart Recipe Hub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Smart Recipe Hub</h1>
    <nav>
        <a href="index.php">Home</a>
        <a class="active" href="recipe.php">Recipes</a>
        <a href="about.php">About Us</a>
    </nav>
</header>

<!-- Search + Filter -->
<section class="controls">
    <form method="GET">
        <input type="text" name="search" placeholder="Search recipes..." value="<?= $_GET['search'] ?? '' ?>">
        <select name="category">
            <option value="">All Categories</option>
            <?php foreach ($categories as $cat => $_) { ?>
                <option value="<?= $cat ?>" <?= (($_GET['category'] ?? '') == $cat) ? 'selected' : '' ?>>
                    <?= $cat ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit">Filter</button>
    </form>
</section>

<!-- Recipe List -->
<section class="recipe-list">
<?php
foreach ($recipes as $r) {
    if (
        ($search === "" || strpos(strtolower($r['name']), $search) !== false) &&
        ($filter === "" || $filter == $r['category'])
    ) {
?>
    <div class="recipe-card">
        <img src="<?= $r['image'] ?>" alt="<?= $r['name'] ?>" class="recipe-img">
        <div class="recipe-info">
            <h3 class="recipe-title"><?= $r['name'] ?></h3>
            <div class="recipe-meta">
                <span class="recipe-category"><?= $r['category'] ?></span>
                <span class="dot">•</span>
                <span class="recipe-rating">⭐ <?= $r['rating'] ?>/5</span>
            </div>
            <p class="recipe-description"><?= $r['description'] ?></p>
            <button class="view-btn">View Recipe</button>
        </div>
        <div class="recipe-time"><?= $r['time'] ?></div>
    </div>
<?php
    }
}
?>
</section>

<footer>
    <p>Smart Recipe Hub © 2025</p>
</footer>

</body>
</html>
