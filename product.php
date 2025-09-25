<?php
session_start();

// Check login
if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit();
}

// Flag
$flag_path = "THM{PATH_TRAVERSAL_Veloura}";

// Product details
$products = [
    'Éclat' => ['img' => 'Éclat.png', 'desc' => 'Veloura Éclat is a luminous fragrance that captures the essence of radiant elegance. The top notes sparkle with vibrant citrus and juicy bergamot, awakening the senses with brightness and energy. At its heart, delicate white florals such as jasmine and lily-of-the-valley bloom softly, adding a refined, feminine charm. The base of creamy vanilla, golden amber, and a hint of musk lingers gently on the skin, leaving an unforgettable glow. Éclat is perfect for those who wish to shine with confidence, embodying warmth, sophistication, and pure radiance in every moment.'],
    'Amour' => ['img' => 'Amour.png', 'desc' => 'Veloura Amour is a fragrance designed for hearts in love. Opening with the lush scent of freshly plucked roses, softened by hints of peony and delicate jasmine, it evokes the intimacy of a tender embrace. Warm sandalwood, sensual musk, and a whisper of vanilla in the base wrap the wearer in a cocoon of romance, leaving a lingering impression of elegance and passion. This scent is timeless and evocative, perfect for romantic evenings, special occasions, or simply celebrating the beauty of love every day.'],
    'Nocturne' => ['img' => 'Nocturne.png', 'desc' => 'Veloura Nocturne is a bold and enigmatic fragrance, inspired by the allure of moonlit nights. Its opening notes of blackcurrant and dark berries are both juicy and mysterious, unfolding into a heart of night-blooming jasmine and velvety orchid. The base of deep patchouli, amber, and soft woods evokes the calm, intoxicating embrace of twilight. Nocturne is the perfect companion for evenings where mystery and seduction take center stage, leaving a lasting impression of elegance and intrigue.'],
    'Seraphine' => ['img' => 'Seraphine.png', 'desc' => 'Veloura Seraphine is an ethereal fragrance that whispers of angelic beauty. Gentle top notes of lily-of-the-valley and soft peony create a light, airy bloom that floats delicately over the senses. Heart notes of white rose and freesia add a touch of refinement, while a subtle base of creamy sandalwood and soft musk grounds the fragrance with warmth. Seraphine embodies purity, grace, and serenity, making it ideal for moments of quiet elegance and understated luxury.'],
    'Fleuris' => ['img' => 'Fleurispng.png', 'desc' => 'Veloura Fleuris is a celebration of springtime in full bloom. Its lively top notes of cherry blossom, freesia, and bergamot awaken the senses with a fresh, floral brightness. At the heart, magnolia, peony, and subtle hints of jasmine intertwine, evoking the lushness of a flourishing garden. The base of soft musk and warm amber provides depth, allowing the fragrance to linger elegantly on the skin. Fleuris is joyful, feminine, and vibrant, capturing the spirit of blooming flowers in a bottle.'],
    'Mystique' => ['img' => 'Mystique.png', 'desc' => 'Veloura Mystique is a fragrance of intrigue and allure. Opening with dark plum and blackcurrant, it immediately draws the senses into a world of depth and sensuality. The heart reveals velvety orchid and mysterious spices, creating a magnetic, enchanting aura. Its base of smoky incense, rich woods, and soft musk lingers seductively, leaving an unforgettable impression. Mystique is for those who embrace the unknown, carrying a sense of elegance, sophistication, and hidden charm wherever they go.'],
    'Enchanté' => ['img' => 'Enchanté.png', 'desc' => 'Veloura Enchanté evokes the magic and sophistication of a Parisian evening. Its top notes of delicate violet and soft iris shimmer with elegance, opening the way for a heart of creamy vanilla, white florals, and subtle heliotrope. Warm amber and a touch of musk in the base create a lingering, enchanting finish. Enchanté is refined and spellbinding, perfect for those who seek to leave a graceful, unforgettable impression, embodying the romance and artistry of French elegance.'],
    'Solenne' => ['img' => 'Solenne.png', 'desc' => 'Veloura Solenne is a fragrance that exudes poise, dignity, and refined sophistication. Crisp top notes of bergamot and green mandarin give way to a heart of elegant white florals and soft rose petals. The base features warm cedarwood, rich amber, and subtle leather undertones, creating a deep, lasting impression of understated luxury. Solenne is perfect for important occasions, professional settings, or evenings where sophistication and composure are paramount.'],
    'Aurielle' => ['img' => 'Aurielle.png', 'desc' => 'Veloura Aurielle shines with warmth, light, and golden luxury. Sparkling top notes of saffron, neroli, and bright citrus awaken the senses, while a heart of golden freesia and heliotrope adds floral depth. The base of vanilla, soft amber, and gentle woods radiates divine elegance, creating a luminous, uplifting fragrance. Aurielle is for those who want to feel radiant, confident, and effortlessly captivating, leaving a trail of luxury and light wherever they go.'],
    'Luminara' => ['img' => 'Luminara.png', 'desc' => 'Veloura Luminara is a sparkling, invigorating fragrance that feels like sunlight captured in a bottle. Top notes of zesty citrus, sparkling green apple, and fresh pear awaken the senses with vibrancy. The heart reveals white florals, lily, and delicate peony, balanced by a soft musk and amber base that lingers gracefully. Luminara evokes joy, freshness, and radiant energy, perfect for daytime wear or moments when you want to shine with natural brilliance.']
];

// Get image parameter
$image = $_GET['img'] ?? '';

if (!$image) die("No product selected");

// Trigger flag if path traversal is attempted
if (strpos($image, '..') !== false) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Path Traversal Flag</title>
        <link rel="stylesheet" href="style.css">
        <style>
            body { font-family: Arial, sans-serif; background-color: #fdf6e3; text-align: center; padding: 50px; }
            .flag { color: #fff; font-size: 24px; font-weight: bold; background-color: #d62828; padding: 20px; border-radius: 12px; display: inline-block; }
            h1 { color: #333; }
            a { display: block; margin-top: 20px; color: #555; text-decoration: none; font-size: 18px; }
            a:hover { color: #d62828; }
        </style>
    </head>
    <body>
        <h1>Path Traversal Challenge Triggered!</h1>
        <div class="flag">Flag: ' . $flag_path . '</div>
        <a href="main.php">Back to Gallery</a>
    </body>
    </html>';
    exit();
}

// Display product if valid
$product_found = false;
foreach ($products as $name => $info) {
    if ($info['img'] === $image) {
        $product_found = true;
        $product_name = $name;
        $product_desc = $info['desc'];
        break;
    }
}
if (!$product_found) die("Product not found");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product_name); ?> - Veloura Perfume</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="product-page">
    <h1><?php echo htmlspecialchars($product_name); ?></h1>
    <img src="images/<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($product_name); ?>" style="max-width:400px; display:block; margin:20px auto;">
    <p><?php echo $product_desc; ?></p>
    <a href="main.php">Back to Gallery</a>
</div>
</body>
</html>
