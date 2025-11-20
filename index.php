<?php
// Load XML
$data = simplexml_load_file("recipes.xml");
$categories = [];
foreach ($data->recipe as $r) {
    $categories[(string)$r->category] = true;
}

// Recipe detailed info with image links
$recipeFacts = [
    "Burger" => [
        "image" => "assets/burger.jpg",
        "facts" => "Originated in Germany and popularized in the US. Classic comfort food loved worldwide.",
        "pros" => "Quick meal, kid-friendly, filling",
        "cons" => "High calories, not very healthy",
        "taste" => "Savory, meaty, cheesy",
        "time" => "12 mins"
    ],
    "Chicken Pasta" => [
        "image" => "assets/chicken_pasta.jpg",
        "facts" => "Italian-inspired creamy pasta with chicken and herbs. Perfect for family dinners.",
        "pros" => "Rich flavor, protein-packed",
        "cons" => "High calorie, requires cooking skills",
        "taste" => "Savory, creamy",
        "time" => "25 mins"
    ],
    "French Toast" => [
        "image" => "assets/french_toast.jpg",
        "facts" => "Dates back to 17th-century Europe. Sweet breakfast favorite.",
        "pros" => "Quick to make, sweet and soft",
        "cons" => "High sugar if syrup is added",
        "taste" => "Sweet, soft",
        "time" => "10 mins"
    ],
    "Veg Salad" => [
        "image" => "assets/veg_salad.jpg",
        "facts" => "Healthy mixed vegetables with olive oil dressing. Popular light meal.",
        "pros" => "Low calorie, nutrient-rich",
        "cons" => "Not filling enough",
        "taste" => "Fresh, crisp, light",
        "time" => "15 mins"
    ],
    "Grilled Sandwich" => [
        "image" => "assets/grilled_sandwich.jpg",
        "facts" => "A versatile snack with cheese and veggies. Great for breakfast or lunch.",
        "pros" => "Quick, customizable",
        "cons" => "May be oily",
        "taste" => "Savory, crunchy",
        "time" => "12 mins"
    ]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Smart Recipe Hub - Home</title>
    <link rel="stylesheet" href="style-home.css">
    <style>
        /* HERO SECTION */
        .hero-card {
            background: url('assets/hero.jpg') center/cover no-repeat;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            position: relative;
        }
        .hero-card::after {
            content: "";
            position: absolute;
            top:0; left:0; right:0; bottom:0;
            background: rgba(0,0,0,0.35);
        }
        .hero-inner { position: relative; z-index: 1; }
        .hero-inner h2 { font-size: 48px; margin-bottom: 15px; }
        .hero-inner p { font-size: 20px; }

        /* FILTER */
        .controls {
            width: 90%;
            max-width: 900px;
            margin: 25px auto;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        .controls input, .controls select {
            padding: 12px 18px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
            flex: 1;
        }
        button { padding: 12px 22px; background: #ff7f50; color: #fff; border: none; border-radius: 10px; cursor: pointer; font-weight: 500; }
        button:hover { background: #ff5722; }

        /* NATIONALITY SCROLL CARDS */
.nationality-cards { 
    width: 95%; 
    margin: 50px auto; 
    overflow-x: auto; 
    padding: 10px 0; 
}
.cards-container { 
    display: flex; 
    gap: 20px; 
    justify-content: center;  /* Center the cards */
}
.nationality-card {
    min-width: 200px;
    height: 150px;
    border-radius: 18px;
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    color: #fff;
    font-weight: bold;
    font-size: 18px;
    text-shadow: 1px 1px 6px rgba(0,0,0,0.6);
    cursor: pointer;
    transition: transform 0.3s ease;
}
.nationality-card::after {
    content: "";
    position: absolute;
    top:0; left:0; right:0; bottom:0;
    background: rgba(0,0,0,0.3);
    border-radius: 18px;
}
.nationality-card span { 
    position: relative; 
    z-index: 1; 
    margin-bottom: 10px; 
}
.nationality-card:hover { transform: scale(1.05); }

.cards-container::-webkit-scrollbar { height: 8px; }
.cards-container::-webkit-scrollbar-thumb { background: #ff7f50; border-radius: 4px; }
.cards-container::-webkit-scrollbar-track { background: #eee; }


        hr.section-divider {
            width: 80%;
            margin: 50px auto;
            border: 0;
            border-top: 2px solid #ff7f50;
        }
        .section-title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-top: 20px;
            color: #333;
        }

        /* ZIG-ZAG RECIPE CARDS */
        .recipe-list { width: 90%; max-width: 1200px; margin: 50px auto; display: flex; flex-direction: column; gap: 50px; }
        .recipe-card {
            display: flex;
            align-items: center;
            gap: 30px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.12);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }
        .recipe-card:nth-child(even) { flex-direction: row-reverse; }
        .recipe-card:hover { transform: translateY(-6px); box-shadow: 0 12px 25px rgba(0,0,0,0.18); }
        .recipe-card img { width: 50%; height: 300px; object-fit: cover; transition: transform 0.3s ease; }
        .recipe-card:hover img { transform: scale(1.05); }
        .recipe-info { padding: 25px; flex: 1; display: flex; flex-direction: column; gap: 10px; }
        .recipe-title { font-size: 28px; font-weight: bold; color: #333; }
        .recipe-meta { font-size: 14px; color: #777; display: flex; gap: 10px; flex-wrap: wrap; }
        .recipe-facts { font-size: 15px; color: #555; line-height: 1.6; }
        .recipe-pros, .recipe-cons, .recipe-taste { font-size: 14px; margin-top: 5px; }
        .badge { background: #ff7f50; color: #fff; padding: 3px 8px; border-radius: 12px; font-size: 12px; margin-right: 6px; }

        /* LIKE BUTTON */
        .like-btn { position: absolute; top: 15px; right: 15px; font-size: 22px; cursor: pointer; color: #ff7f50; transition: transform 0.2s; }
        .like-btn.liked { color: #e74c3c; transform: scale(1.2); }

        @media(max-width: 900px) { .recipe-card { flex-direction: column; } .recipe-card:nth-child(even) { flex-direction: column; } .recipe-card img { width: 100%; height: 250px; } }
    </style>
</head>
<body>

<header>
    <h1>Smart Recipe Hub</h1>
    <nav>
        <a href="index.php" class="active">Home</a>
        <a href="recipe.php">Recipes</a>
        <a href="about.php">About Us</a>
    </nav>
</header>

<!-- HERO -->
<section class="hero-card">
    <div class="hero-inner">
        <h2>Discover Featured Recipes</h2>
        <p>Learn more about each dish — origins, taste, and fun facts!</p>
    </div>
</section>

<!-- FILTER -->
<section class="controls">
    <form method="GET">
        <input type="text" name="search" placeholder="Search recipes..." value="<?= $_GET['search'] ?? '' ?>">
        <select name="category">
            <option value="">All Categories</option>
            <?php foreach ($categories as $cat => $_) { ?>
                <option value="<?= $cat ?>" <?= (($_GET['category'] ?? '') == $cat) ? 'selected' : '' ?>><?= $cat ?></option>
            <?php } ?>
        </select>
        <button type="submit">Filter</button>
    </form>
</section>

<!-- NATIONALITY SCROLL CARDS -->
<section class="nationality-cards">
    <div class="cards-container">
        <div class="nationality-card" style="background-image:url('assets/korea.jpg');"><span>Korea</span></div>
        <div class="nationality-card" style="background-image:url('assets/japan.jpg');"><span>Japan</span></div>
        <div class="nationality-card" style="background-image:url('assets/italy.jpg');"><span>Italy</span></div>
        <div class="nationality-card" style="background-image:url('assets/india.jpg');"><span>India</span></div>
        <div class="nationality-card" style="background-image:url('assets/french.jpg');"><span>France</span></div>
        <div class="nationality-card" style="background-image:url('assets/america.jpg');"><span>America</span></div>
    </div>
</section>

<hr class="section-divider">
<div class="section-title">The Greatest Dishes Await You!</div>

<!-- FEATURED RECIPE CARDS -->
<section class="recipe-list">
<?php
$search = strtolower($_GET['search'] ?? "");
$filter = $_GET['category'] ?? "";

foreach ($recipeFacts as $name => $info) {
    $cat = '';
    foreach ($data->recipe as $r) {
        if ((string)$r->name == $name) { $cat = (string)$r->category; break; }
    }
    if (($search === "" || strpos(strtolower($name), $search) !== false) &&
        ($filter === "" || $filter == $cat)) {
?>
    <div class="recipe-card">
        <span class="like-btn" onclick="toggleLike(this)">❤</span>
        <img src="<?= $info['image'] ?>" alt="<?= $name ?>">
        <div class="recipe-info">
            <h3 class="recipe-title"><?= $name ?></h3>
            <div class="recipe-meta">
                <span class="badge"><?= $cat ?></span>
                <span class="badge"><?= $info['time'] ?></span>
            </div>
            <p class="recipe-facts"><?= $info['facts'] ?></p>
            <p class="recipe-pros"><strong>Pros:</strong> <?= $info['pros'] ?></p>
            <p class="recipe-cons"><strong>Cons:</strong> <?= $info['cons'] ?></p>
            <p class="recipe-taste"><strong>Taste:</strong> <?= $info['taste'] ?></p>
        </div>
    </div>
<?php
    }
}
?>
</section>

<footer>
    <p>Smart Recipe Hub © 2025. All rights reserved.</p>
</footer>

<script>
function toggleLike(el){ el.classList.toggle('liked'); }
</script>

</body>
</html>
