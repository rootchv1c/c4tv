<?php
$url = $_GET['url'] ?? '';
$title = $_GET['title'] ?? 'Film İzle';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?php echo urldecode($title); ?> - CanoFlix Player</title>
    <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <style>
        body { background: #000; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .video-wrapper { width: 90%; max-width: 1100px; position: relative; border: 2px solid #333; box-shadow: 0 0 50px rgba(0,0,0,1); }
        .back-btn { position: absolute; top: -50px; left: 0; color: #fff; text-decoration: none; font-size: 1.2rem; }
    </style>
</head>
<body>

<div class="video-wrapper">
    <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Geri Dön</a>
    
    <?php if (strpos($url, '.m3u8') !== false): ?>
        <video id="player" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="1000" height="560">
            <source src="<?php echo $url; ?>" type="application/x-mpegURL">
        </video>
    <?php else: ?>
        <iframe src="<?php echo $url; ?>" width="100%" height="560" frameborder="0" allowfullscreen></iframe>
    <?php endif; ?>
</div>

<script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
</body>
</html>
