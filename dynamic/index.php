<?php

$products = require __DIR__ . '/products.php';
$sort = $_GET['sort'] ?? 'default';

if ($sort === 'price') {
    usort($products, static fn (array $a, array $b): int => $a['price'] <=> $b['price']);
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Katalog produk kreatif mahasiswa.">
  <title>Katalog Karya Mahasiswa | Dinamis</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="site-header">
    <a class="brand" href="?sort=default" aria-label="Kreasi Kampus - kembali ke produk">
      <span class="brand-mark" aria-hidden="true">K</span>
      <span>KREASI KAMPUS</span>
    </a>
    <nav aria-label="Navigasi utama">
      <a href="#produk">Produk</a>
      <a href="#proses">Proses</a>
    </nav>
  </header>

  <main>
    <section class="hero" aria-labelledby="hero-title">
      <div class="hero-copy">
        <p class="eyebrow">KARYA MAHASISWA</p>
        <h1 id="hero-title">Katalog Produk Kreatif</h1>
        <p class="hero-lead">Karya sederhana dengan cerita yang dekat, dibuat dengan teliti, dan siap menemani aktivitas sehari-hari.</p>
        <a class="button" href="#produk">Lihat produk <span aria-hidden="true">&#8594;</span></a>
      </div>
      <figure class="hero-media">
        <img src="assets/hero-original.jpg" width="1200" height="800" alt="Produk kreatif mahasiswa di atas meja">
        <figcaption>Eksplorasi ide dari ruang kelas ke kehidupan sehari-hari.</figcaption>
      </figure>
    </section>

    <section id="produk" class="section" aria-labelledby="produk-title">
      <div class="section-heading">
        <div>
          <p class="eyebrow">PILIHAN MINGGU INI</p>
          <h2 id="produk-title">Produk Pilihan</h2>
        </div>
        <div class="toolbar" aria-label="Urutkan produk">
          <span>Urutkan:</span>
          <a class="<?= $sort === 'default' ? 'is-active' : '' ?>" href="?sort=default">Urutan awal</a>
          <a class="<?= $sort === 'price' ? 'is-active' : '' ?>" href="?sort=price">Harga termurah</a>
        </div>
      </div>

      <div class="grid">
        <?php foreach ($products as $index => $product): ?>
          <article class="card">
            <div class="card-media">
              <img src="assets/<?= e($product['image']) ?>" width="720" height="480" alt="<?= e($product['alt']) ?>" loading="lazy">
            </div>
            <div class="card-content">
              <p class="card-index"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?> / <?= e(strtoupper($product['category'])) ?></p>
              <h3><?= e($product['name']) ?></h3>
              <p class="card-description"><?= e($product['description']) ?></p>
              <p class="price">Rp<?= number_format($product['price'], 0, ',', '.') ?></p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="proses" class="process" aria-labelledby="proses-title">
      <div>
        <p class="eyebrow">WORKFLOW</p>
        <h2 id="proses-title">Dibuat, dirapikan, diuji.</h2>
      </div>
      <p>Halaman dinamis memisahkan data produk dari markup kartu. Harga dan urutan dapat berubah melalui data PHP dan parameter URL.</p>
    </section>
  </main>

  <footer>
    <span>Praktik Desain Web INF60268</span>
    <span>Versi dinamis</span>
  </footer>
</body>
</html>
