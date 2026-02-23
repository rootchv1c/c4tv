<?php
// Klasördeki tüm json dosyalarını listele
$json_dosyalari = glob("*.json");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CanoFlix - Ultra Premium</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <nav class="navbar" id="navbar">
        <div class="nav-left">
            <h1 class="logo">CANOFLIX</h1>
            <div class="burger-menu">
                <i class="fas fa-bars" id="burger-btn"></i>
                <ul class="nav-links" id="nav-links">
                    <li><a href="#">Ana Sayfa</a></li>
                    <li><a href="#">Diziler</a></li>
                    <li><a href="#">Filmler</a></li>
                    <li><a href="#">Yeni ve Popüler</a></li>
                </ul>
            </div>
        </div>
        <div class="nav-right">
            <i class="fas fa-search"></i>
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/0b/Netflix-avatar.png" class="avatar">
        </div>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Dev Arşiv</h1>
            <p class="hero-desc">Milyonlarca içerik, ÜmitM0d ve CanoFlix kalitesiyle tek bir panelde.</p>
            <div class="hero-btns">
                <button class="btn-play"><i class="fas fa-play"></i> Oynat</button>
                <button class="btn-info"><i class="fas fa-info-circle"></i> Daha Fazla Bilgi</button>
            </div>
        </div>
        <div class="hero-fade"></div>
    </header>

    <main class="container">
        <?php foreach ($json_dosyalari as $dosya): 
            $veriler = json_decode(file_get_contents($dosya), true);
            if (!$veriler) continue;
            $kategori_adi = strtoupper(str_replace(['.json', '_'], ['', ' '], $dosya));
        ?>
            <div class="row">
                <h2 class="row-title"><?php echo $kategori_adi; ?></h2>
                <div class="row-posters">
                    <?php foreach (array_slice($veriler, 0, 40) as $film): ?>
                        <div class="poster-card" onclick="izle('<?php echo urlencode($film['link']); ?>', '<?php echo urlencode($film['baslik']); ?>')">
                            <div class="poster-img-wrapper">
                                <img src="https://via.placeholder.com/300x450/000000/FFFFFF?text=<?php echo urlencode($film['baslik']); ?>" alt="poster">
                                <div class="play-overlay"><i class="fas fa-play"></i></div>
                            </div>
                            <p class="poster-name"><?php echo $film['baslik']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </main>

    <script>
        // Sayfa kaydıkça navbar kararır
        window.onscroll = function() {
            var nav = document.getElementById('navbar');
            if (window.pageYOffset > 100) { nav.classList.add("nav-black"); } 
            else { nav.classList.remove("nav-black"); }
        };

        // Burger Menü Toggle
        document.getElementById('burger-btn').onclick = function() {
            document.getElementById('nav-links').classList.toggle('active');
        };

        function izle(url, title) {
            window.location.href = "izle.php?url=" + url + "&title=" + title;
        }
    </script>
</body>
</html>
