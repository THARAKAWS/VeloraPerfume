<?php
session_start();

// Login credentials
$users = [
    'peter' => 'parker'
];

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['user'] = $username;
    } else {
        die("Invalid credentials");
    }
}

if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit();
}

// Flags
$flag_xss = "THM{XSS_Veloura_Flag123}";
$flag_sqli = "THM{SQLI_Veloura}";

// Products
$products = [
    'Éclat' => ['img' => 'Éclat.png', 'desc' => 'Luminous fragrance capturing radiant elegance.'],
    'Amour' => ['img' => 'Amour.png', 'desc' => 'Timeless romantic scent, evoking love and intimacy.'],
    'Nocturne' => ['img' => 'Nocturne.png', 'desc' => 'Bold, mysterious fragrance inspired by moonlit nights.'],
    'Seraphine' => ['img' => 'Seraphine.png', 'desc' => 'Ethereal scent with angelic, soft floral notes.'],
    'Fleuris' => ['img' => 'Fleurispng.png', 'desc' => 'Joyful fragrance celebrating blooming flowers.'],
    'Mystique' => ['img' => 'Mystique.png', 'desc' => 'Enchanting, deep, and magnetic scent.'],
    'Enchanté' => ['img' => 'Enchanté.png', 'desc' => 'Refined, French elegance captured in perfume.'],
    'Solenne' => ['img' => 'Solenne.png', 'desc' => 'Sophisticated and solemn, perfect for special occasions.'],
    'Aurielle' => ['img' => 'Aurielle.png', 'desc' => 'Golden aura fragrance, radiant and divine.'],
    'Luminara' => ['img' => 'Luminara.png', 'desc' => 'Glowing, bright, and fresh perfume for daytime wear.']
];

// GET parameters
$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Veloura Perfume Gallery</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header with Logo, Brand, and Navigation -->
<header>
    <div class="header-left">
        <div class="logo">
            <img src="images/logo1.png" alt="Veloura Logo">
        </div>
        <div class="brand-text">
            <h1 class="brand-name">Veloura</h1>
            <span class="brand-tagline">Radiance, Elegance, Aura</span>
        </div>
    </div>

    <nav>
        <a href="main.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="cart.php">Cart</a>
    </nav>
</header>

<h2 class="welcome">Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>

<div class="brand-description">
    <strong>Veloura – Where Elegance Meets Aura</strong><br>
    Veloura is a luxury perfume brand that embodies sophistication, femininity, and timeless elegance. Inspired by the softness of velvet and the glow of an aura, each fragrance tells a unique story of beauty and emotion. From radiant florals to mysterious nocturnal blends, Veloura captures moments of romance, enchantment, and allure. Every bottle is crafted with care, combining rare botanicals, exotic woods, and luminous notes that linger delicately on the skin. Veloura is more than fragrance—it is an experience of passion, refinement, and grace, inviting everyone to wear their aura and shine with confidence.
</div>

<!-- XSS Search -->
<h2>Search Perfumes</h2>
<form method="GET" class="left-align-form">
    <input type="text" name="search" placeholder="Search perfumes...">
    <button type="submit">Search</button>
</form>
<?php
if ($search) {
    echo "<p>Results for: $search</p>";
    echo "<p class='flag'>Flag: $flag_xss</p>";
}
?>

<!-- Product Gallery -->
<h2>Perfume Gallery</h2>
<div class="gallery">
<?php foreach ($products as $name => $info): ?>
    <div class="product-card">
        <img src="images/<?php echo $info['img']; ?>" alt="<?php echo $name; ?>">
        <p class="product-desc"><?php echo $info['desc']; ?></p>
        <a href="product.php?img=<?php echo urlencode($info['img']); ?>">View Image</a>
    </div>
<?php endforeach; ?>
</div>

<!-- SQLi Filter -->
<h2>Filter by Category</h2>
<form method="GET" class="left-align-form">
    <input type="text" name="category" placeholder="Enter category">
    <button type="submit">Filter</button>
</form>
<?php
$unreleased = ['Secret Perfume'];
if ($category) {
    if ($category === "' OR 1=1--") {
        echo "<ul>";
        foreach ($unreleased as $p) {
            echo "<li>$p</li>";
        }
        echo "</ul>";
        echo "<p class='flag'>Flag: $flag_sqli</p>";
    } else {
        echo "<p>No products found</p>";
    }
}
?>
</body>
</html>
