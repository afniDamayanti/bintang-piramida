
<?php
$hasil = "";
$pesan = "";
$tinggi = "";

if (isset($_POST['submit'])) {

    $tinggi = trim($_POST['tinggi']);

    // Validasi input
    if (
        $tinggi === "" ||
        !ctype_digit($tinggi) ||
        (int)$tinggi < 1 ||
        (int)$tinggi > 20
    ) {
        $pesan = "Input tidak valid! Masukkan bilangan bulat 1 sampai 20.";
    } else {

        $tinggi = (int)$tinggi;

        // Perulangan bersarang untuk membuat segitiga
        for ($i = 1; $i <= $tinggi; $i++) {

            // Mengatur spasi sebelah kiri
            for ($j = 1; $j <= $tinggi - $i; $j++) {
                $hasil .= " ";
            }

            // Mengatur jumlah bintang
            for ($k = 1; $k <= (2 * $i - 1); $k++) {
                $hasil .= "*";
            }

            // Pindah baris
            $hasil .= "\n";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Program Segitiga Bintang</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h2>Program Segitiga Bintang</h2>

        <p>Masukkan tinggi segitiga antara 1 sampai 20</p>

        <form method="POST">

            <input
                type="number"
                name="tinggi"
                placeholder="Masukkan tinggi segitiga"
                min="1"
                max="20"
                step="1"
                value="<?= htmlspecialchars((string)$tinggi) ?>"
                required
            >

            <button type="submit" name="submit">
                Tampilkan Segitiga
            </button>

        </form>

        <?php if ($pesan != ""): ?>
            <div class="error">
                <?= htmlspecialchars($pesan) ?>
            </div>
        <?php endif; ?>

        <?php if ($hasil != ""): ?>

            <h3>Hasil Segitiga:</h3>

            <div class="hasil-wrapper">
                <pre class="hasil"><?= htmlspecialchars($hasil) ?></pre>
            </div>

        <?php endif; ?>

    </div>

</body>
</html>
