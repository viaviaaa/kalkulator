<?php

function tambah($a, $b) {
    return $a + $b;
}

function kurang($a, $b) {
    return $a - $b;
}

function kali($a, $b) {
    return $a * $b;
}

function bagi($a, $b) {
    if ($b == 0) {
        return "Error: Tidak bisa membagi dengan nol!";
    }
    return $a / $b;
}


$hasil = 0;
$angka1 = 0;
$angka2 = 0;
$operasi = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operasi = $_POST['operasi'];

    
    switch ($operasi) {
        case 'tambah': $hasil = tambah($angka1, $angka2); break;
        case 'kurang': $hasil = kurang($angka1, $angka2); break;
        case 'kali':   $hasil = kali($angka1, $angka2);   break;
        case 'bagi':   $hasil = bagi($angka1, $angka2);   break;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator PHP - PPLG</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; padding-top: 50px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 300px; }
        input, select, button { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #2ecc71; color: white; border: none; cursor: pointer; }
        .hasil { background: #e8f8f5; border: 1px solid #2ecc71; padding: 10px; text-align: center; font-weight: bold; }
    </style>
</head>
<body>

<div class="card">
    <h3>Kalkulator Sederhana</h3>
    <form method="post">
        <input type="number" name="angka1" value="<?php echo $angka1; ?>" placeholder="Angka Pertama" required>
        
        <select name="operasi">
            <option value="tambah" <?php if($operasi=='tambah') echo 'selected'; ?>>Tambah (+)</option>
            <option value="kurang" <?php if($operasi=='kurang') echo 'selected'; ?>>Kurang (-)</option>
            <option value="kali" <?php if($operasi=='kali') echo 'selected'; ?>>Kali (x)</option>
            <option value="bagi" <?php if($operasi=='bagi') echo 'selected'; ?>>Bagi (/)</option>
        </select>

        <input type="number" name="angka2" value="<?php echo $angka2; ?>" placeholder="Angka Kedua" required>
        
        <button type="submit">Hitung</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="hasil">
            Hasil: <?php echo $hasil; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
