<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>About Veloura</title>
<style>
    /* =========================
       General Body
    ========================= */
    body {
        font-family: 'Playfair Display', serif;
        background: linear-gradient(to bottom, #FAF8F6, #F7D6D0); /* soft blush gradient */
        color: #333333;
        margin: 0;
        padding: 0;
    }

    /* =========================
       Header
    ========================= */
    header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 20px;
        background: linear-gradient(to right, #F7D6D0, #FAF8F6);
        border-bottom: 2px solid #D4AF37;
    }

    nav a {
        margin: 0 15px;
        text-decoration: none;
        font-weight: bold;
        color: #6C1B3B;
        transition: color 0.3s;
    }

    nav a:hover {
        color: #D4AF37;
    }

    /* =========================
       Content Area
    ========================= */
    .content {
        padding: 40px 20px;
        max-width: 1000px;
        margin: auto;
        background-color: #FDF9F6;
        border: 2px solid #D4AF37;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
    }

    h1 {
        color: #6C1B3B;
        font-size: 2.5rem;
        margin-bottom: 20px;
        text-align: center;
    }

    h2 {
        color: #6C1B3B;
        margin-top: 30px;
        font-size: 1.6rem;
        border-left: 4px solid #D4AF37;
        padding-left: 10px;
    }

    p {
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 20px;
        text-align: justify;
    }

    .highlight {
        color: #D4AF37;
        font-weight: bold;
    }

    /* =========================
       Gallery Grid
    ========================= */
    .gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 40px;
    }

    .product-card {
        background-color: #F7D6D0;
        border: 2px solid #D4AF37;
        border-radius: 12px;
        padding: 15px;
        width: 200px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .product-card img {
        width: 150px;
        border-radius: 8px;
        border: 1px solid #D4AF37;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(212, 175, 55, 0.5);
    }

    .product-desc {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        color: #333333;
        margin-top: 10px;
        font-size: 1rem;
    }
</style>
</head>
<body>
<header>
    <nav>
        <a href="main.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="cart.php">Cart</a>
    </nav>
</header>

<div class="content">
    <h1>About Veloura</h1>

    <h2>About Us – The Story of Veloura</h2>
    <p>Welcome to <span class="highlight">Veloura</span>, a luxury perfume house where timeless elegance meets modern artistry. Inspired by the smoothness of velvet and the radiant glow of an aura, Veloura was founded with a single vision – to create fragrances that are not just scents, but unforgettable experiences.</p>

    <h2>✨ Founder & Vision</h2>
    <p>Veloura was established in 2025 by <span class="highlight">Sanduni Tharaka</span>, a passionate creator with a love for beauty, elegance, and fine craftsmanship. The brand was born from the belief that perfume is more than fragrance – it is a reflection of identity, mood, and soul.</p>

    <h2>🌸 Our Journey</h2>
    <p>From our very first creation, Veloura has aimed to craft perfumes that tell stories. Each fragrance is carefully designed with rare botanicals, luminous florals, and warm woods to capture emotions ranging from radiant joy to mysterious allure. Every bottle represents a world of sophistication, inviting wearers to express themselves with grace and confidence.</p>

    <h2>🏆 Recognition & Awards</h2>
    <p>Though a young brand, Veloura is already making waves in the fragrance industry. Our early collections have been praised for their quality, elegance, and artistry. Veloura’s vision is to earn global recognition for excellence in luxury perfumery and sustainable craftsmanship.</p>

    <h2>💎 Our Promise</h2>
    <p>At Veloura, we are committed to elegance, quality, and authenticity. Every perfume is designed to be long-lasting, eco-conscious, and crafted with love. We believe in empowering our customers to embrace their aura and shine in their truest form.</p>

    <h2>🌍 Looking Ahead</h2>
    <p>Veloura dreams of becoming a global name in luxury perfumery – expanding collections, collaborating with artists, and building a community that celebrates beauty, individuality, and timeless sophistication.</p>

    <h2>Our Signature Collection</h2>
    <div class="gallery">
        <div class="product-card">
            <img src="images/Éclat.png" alt="Veloura Éclat">
            <div class="product-desc">Veloura Éclat</div>
        </div>
        <div class="product-card">
            <img src="images/Amour.png" alt="Veloura Amour">
            <div class="product-desc">Veloura Amour</div>
        </div>
        <div class="product-card">
            <img src="images/Nocturne.png" alt="Veloura Nocturne">
            <div class="product-desc">Veloura Nocturne</div>
        </div>
        <div class="product-card">
            <img src="images/Seraphine.png" alt="Veloura Seraphine">
            <div class="product-desc">Veloura Seraphine</div>
        </div>
        <div class="product-card">
            <img src="images/Fleuris.png" alt="Veloura Fleuris">
            <div class="product-desc">Veloura Fleuris</div>
        </div>
        <div class="product-card">
            <img src="images/Mystique.png" alt="Veloura Mystique">
            <div class="product-desc">Veloura Mystique</div>
        </div>
        <div class="product-card">
            <img src="images/Enchanté.png" alt="Veloura Enchanté">
            <div class="product-desc">Veloura Enchanté</div>
        </div>
    </div>
</div>
</body>
</html>
