<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Penilaian Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-mortarboard-fill"></i>
        <h4>Penilaian Mahasiswa</h4>
    </div>
    <div class="card-body p-4">
        <form action="proses.php" method="POST">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="23001" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" placeholder="Andi Pratama" required>
            </div>
            <div class="row">
                <div class="col-4 mb-3">
                    <label class="form-label">Nilai Tugas</label>
                    <input type="number" name="tugas" class="form-control" min="0" max="100" placeholder="0" required>
                </div>
                <div class="col-4 mb-3">
                    <label class="form-label">Nilai UTS</label>
                    <input type="number" name="uts" class="form-control" min="0" max="100" placeholder="0" required>
                </div>
                <div class="col-4 mb-3">
                    <label class="form-label">Nilai UAS</label>
                    <input type="number" name="uas" class="form-control" min="0" max="100" placeholder="0" required>
                </div>
            </div>
            <button type="submit" class="btn btn-gradient w-100">
                <i class="bi bi-send-fill"></i> Proses Nilai
            </button>
        </form>
    </div>
</div>
</body>
</html>