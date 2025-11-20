<!DOCTYPE html>
<html>
<head>
    <title>About Us — Smart Recipe Hub</title>
    <link rel="stylesheet" href="style-home.css">
    <style>
        /* HERO SECTION */
        .about-hero {
            background: url('assets/about.jpg') center/cover no-repeat;
            padding: 120px 20px 80px 20px;
            text-align: center;
            color: #fff;
            position: relative;
        }
        .about-hero::after {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.45); /* overlay for readability */
        }
        .about-hero h2,
        .about-hero p {
            position: relative;
            z-index: 1;
        }
        .about-hero h2 {
            font-size: 36px;
            margin-bottom: 15px;
        }
        .about-hero p {
            font-size: 18px;
            max-width: 800px;
            margin: 0 auto;
        }

        /* INFO CARDS */
        .about-cards {
            width: 90%;
            max-width: 1000px;
            margin: 50px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }
        .about-card {
            background: #fff;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.12);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .about-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.18);
        }
        .about-card h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #333;
        }
        .about-card p {
            color: #555;
            font-size: 15px;
            line-height: 1.6;
        }

        /* SUBSCRIBE FORM */
        .subscribe-section {
            background: #fff;
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.12);
            text-align: center;
        }
        .subscribe-section h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #333;
        }
        .subscribe-section p {
            margin-bottom: 25px;
            color: #777;
            font-size: 15px;
        }
        .subscribe-section form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .subscribe-section input {
            padding: 12px 18px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .subscribe-section button {
            padding: 12px 22px;
            border: none;
            border-radius: 10px;
            background: #ff7f50;
            color: #fff;
            font-weight: 500;
            cursor: pointer;
            transition: 0.25s;
        }
        .subscribe-section button:hover {
            background: #ff5722;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .about-hero {
                padding: 80px 15px 60px 15px;
            }
            .about-hero h2 {
                font-size: 28px;
            }
            .about-hero p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Smart Recipe Hub</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="recipe.php">Recipes</a>
        <a class="active" href="about.php">About</a>
    </nav>
</header>

<!-- HERO -->
<section class="about-hero">
    <h2>About Smart Recipe Hub</h2>
    <p>Your ultimate destination to discover delicious recipes, learn cooking tips, and explore culinary inspirations from around the world.</p>
</section>

<!-- INFO CARDS -->
<section class="about-cards">
    <div class="about-card">
        <h3>Our Mission</h3>
        <p>To make cooking accessible and fun for everyone. We provide easy-to-follow recipes, creative meal ideas, and helpful cooking tips that anyone can try at home.</p>
    </div>
    <div class="about-card">
        <h3>What We Offer</h3>
        <p>Recipes for every meal, detailed instructions, nutritional info, and recommendations based on your preferences. From snacks to desserts, we have it all!</p>
    </div>
    <div class="about-card">
        <h3>Our Vision</h3>
        <p>To inspire a global community of food lovers who enjoy cooking, experimenting, and sharing their culinary creations.</p>
    </div>
</section>

<!-- SUBSCRIBE FORM -->
<section class="subscribe-section">
    <h3>Subscribe to Get the Latest Updates</h3>
    <p>Enter your details below to receive new recipes and cooking tips directly to your inbox.</p>
    <form method="POST">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <button type="submit">Subscribe</button>
    </form>
</section>

<footer>
    <p>Smart Recipe Hub © 2025</p>
</footer>

</body>
</html>
