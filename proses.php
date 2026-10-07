<?php
// --- FUNCTION ---
function getGrade($n) {
    if ($n >= 85) return "A";
    if ($n >= 75) return "B";
    if ($n >= 65) return "C";
    if ($n >= 50) return "D";
    return "E";
}

// --- PROSES ---
if ($_SERVER["REQUEST_METHOD"] !== "POST") { header("Location: form.php"); exit; }

$nim   = htmlspecialchars(trim($_POST['nim']));
$nama  = htmlspecialchars(trim($_POST['nama']));
$tugas = (float)$_POST['tugas'];
$uts   = (float)$_POST['uts'];
$uas   = (float)$_POST['uas'];

// --- VALIDASI ---
$errors = [];
if (empty($nim)) $errors[] = "NIM tidak boleh kosong.";
if (empty($nama)) $errors[] = "Nama tidak boleh kosong.";
if ($tugas < 0 || $tugas > 100) $errors[] = "Nilai Tugas harus 0-100.";
if ($uts < 0 || $uts > 100) $errors[] = "Nilai UTS harus 0-100.";
if ($uas < 0 || $uas > 100) $errors[] = "Nilai UAS harus 0-100.";

// --- HITUNG ---
$nilaiAkhir = (0.3 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
$grade  = getGrade($nilaiAkhir);
$status = ($nilaiAkhir >= 50) ? "LULUS" : "TIDAK LULUS";
$warna  = ($status == "LULUS") ? "success" : "danger";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Penilaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php if (!empty($errors)): ?>
    <!-- Halaman Error -->
    <div class="error-box">
        <h4><i class="bi bi-exclamation-triangle-fill"></i> Terjadi Kesalahan</h4>
        <ul>
            <?php foreach ($errors as $e) echo "<li>$e</li>"; ?>
        </ul>
        <a href="form.php" class="btn btn-gradient w-100 mt-2">
            <i class="bi bi-arrow-left"></i> Kembali ke Form
        </a>
    </div>

<?php else: ?>
    <!-- Halaman Hasil -->
    <div class="card-custom">
        <div class="card-header-custom">
            <i class="bi bi-clipboard2-check-fill"></i>
            <h4>Hasil Penilaian</h4>
        </div>
        <div class="card-body p-4">
            
            <div class="mb-3">
                <div class="label-kecil">Nilai Akhir</div>
                <div class="nilai-besar"><?= number_format($nilaiAkhir, 2); ?></div>
            </div>

            <table class="table table-borderless">
                <tr><th width="40%">NIM</th><td>: <?= $nim; ?></td></tr>
                <tr><th>Nama</th><td>: <?= $nama; ?></td></tr>
                <tr><th>Grade</th><td>: <b><?= $grade; ?></b></td></tr>
                <tr><th>Status</th><td>: <span class="badge bg-<?= $warna; ?>"><?= $status; ?></span></td></tr>
            </table>

            <a href="form.php" class="btn btn-gradient w-100">
                <i class="bi bi-arrow-repeat"></i> Hitung Lagi
            </a>
        </div>
    </div>
<?php endif; ?>

</body>
</html>