<?php
$products = [
    [
        "nama" => "Sneakers Casual White",
        "kategori" => "Casual",
        "harga" => 1200000,
        "stok" => 5
    ],
    [
        "nama" => "Running Shoes Speed",
        "kategori" => "Sports",
        "harga" => 850000,
        "stok" => 8
    ],
    [
        "nama" => "Sepatu Pantofel Hitam",
        "kategori" => "Formal",
        "harga" => 1100000,
        "stok" => 0
    ],
    [
        "nama" => "Canvas Slip On",
        "kategori" => "Casual",
        "harga" => 350000,
        "stok" => 10
    ],
    [
        "nama" => "Sepatu Gunung Outdoor",
        "kategori" => "Outdoor",
        "harga" => 1500000,
        "stok" => 2
    ],
    [
        "nama" => "Sandal Gunung Casual",
        "kategori" => "Sandal",
        "harga" => 250000,
        "stok" => 0
    ]
];

$total_produk = count($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Sepatu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <h1>Cia Store</h1>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#products">Katalog</a></li>
                <li><a href="#about">Tentang</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero" id="home">
        <div class="hero-content">
            <h2>Selamat Datang di Cia Store</h2>
            <p>Penyedia sepatu berkualitas dengan harga terjangkau untuk aktivitas harianmu.</p>
            <a href="#products" class="btn-hero">Lihat Produk</a>
        </div>
    </section>

    <main class="container" id="products">
        <div class="catalog-header">
            <h2>Katalog Sepatu</h2>
            <p class="total-info">Total Produk: <strong><?php echo $total_produk; ?></strong></p>
        </div>

        <div class="product-grid">
            <?php 
            foreach ($products as $product): 
                $harga_awal = $product['harga'];
                $is_diskon = false;
                $harga_akhir = $harga_awal;
                
                if ($harga_awal >= 1000000) {
                    $is_diskon = true;
                    $potongan = $harga_awal * 0.10;
                    $harga_akhir = $harga_awal - $potongan;
                }
            ?>
                <div class="product-card">
                    <?php if ($is_diskon): ?>
                        <span class="badge-diskon">Diskon 10%</span>
                    <?php endif; ?>

                    <span class="category"><?php echo $product['kategori']; ?></span>
                    <h3><?php echo $product['nama']; ?></h3>
                    
                    <div class="price-box">
                        <?php if ($is_diskon): ?>
                            <span class="price-old">Rp <?php echo number_format($harga_awal, 0, ',', '.'); ?></span>
                            <span class="price-new">Rp <?php echo number_format($harga_akhir, 0, ',', '.'); ?></span>
                        <?php else: ?>
                            <span class="price">Rp <?php echo number_format($harga_awal, 0, ',', '.'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="stock-info">
                        <span>Stok: <?php echo $product['stok']; ?></span>
                        <?php if ($product['stok'] > 0): ?>
                            <span class="status status-ready">Tersedia</span>
                        <?php else: ?>
                            <span class="status status-empty">Stok Habis</span>
                        <?php endif; ?>
                    </div>

                    <div class="card-action">
                        <?php if ($product['stok'] > 0): ?>
                            <button class="btn-buy">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="btn-disabled" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer id="about">
        <p>&copy; <?php echo date('Y'); ?> Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>