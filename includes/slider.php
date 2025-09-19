<?php
$coversDir = __DIR__ . '/../assets/covers';
$coverImages = [];

if (is_dir($coversDir)) {
    $files = scandir($coversDir);
    foreach ($files as $file) {
        if (preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $file)) {
            $coverImages[] = $file;
        }
    }
}
?>

<?php if (!empty($coverImages)): ?>
    <div class="slider-container">
        <div class="slider-track" id="sliderTrack">
            <?php foreach ($coverImages as $img): ?>
                <div class="slide">
                    <img src="assets/covers/<?php echo htmlspecialchars($img); ?>" alt="">
                </div>
            <?php endforeach; ?>
            <?php foreach ($coverImages as $img): ?>
                <div class="slide">
                    <img src="assets/covers/<?php echo htmlspecialchars($img); ?>" alt="">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const track = document.getElementById("sliderTrack");
            let pos = 0;
            const speed = 1;
            let running = true;

            function animate() {
                if (running) {
                    pos -= speed;
                    if (Math.abs(pos) >= track.scrollWidth / 2) {
                        pos = 0;
                    }
                    track.style.transform = `translateX(${pos}px)`;
                }
                requestAnimationFrame(animate);
            }

            document.addEventListener("visibilitychange", function () {
                running = !document.hidden;
            });

            animate();
        });
    </script>
<?php endif; ?>