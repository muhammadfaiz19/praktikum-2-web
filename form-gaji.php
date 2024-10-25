<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Gaji Karyawan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .card {
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border: none;
            border-radius: 15px;
        }
        .result-box {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0">Kalkulator Gaji Karyawan</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="post">
                            <div class="mb-3">
                                <label for="masaKerja" class="form-label">Masa Kerja</label>
                                <select class="form-select" name="masaKerja" id="masaKerja" required>
                                    <option value="">Pilih Masa Kerja</option>
                                    <option value="10"> >10 tahun</option>
                                    <option value="7"> >7 tahun</option>
                                    <option value="5"> >5 tahun</option>
                                    <option value="1"> >1 tahun</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Pernikahan</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="menikah" value="menikah" required>
                                        <label class="form-check-label" for="menikah">Menikah</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="duda" value="duda" required>
                                        <label class="form-check-label" for="duda">Duda</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="janda" value="janda" required>
                                        <label class="form-check-label" for="janda">Janda</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="single" value="single" required>
                                        <label class="form-check-label" for="single">Single</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="jumlahAnak" class="form-label">Jumlah Anak (dibawah 18 tahun)</label>
                                <input type="number" class="form-control" name="jumlahAnak" id="jumlahAnak" min="0" value="0" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4">Hitung Gaji</button>
                            </div>
                        </form>

                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Mendapatkan gaji pokok berdasarkan masa kerja
                            $masaKerja = $_POST['masaKerja'];
                            $gajiPokok = 0;
                            
                            // Menggunakan if-else untuk menentukan gaji pokok
                            if ($masaKerja > "10") {
                                $gajiPokok = 8000000;
                            } else if ($masaKerja > "7") {
                                $gajiPokok = 5000000;
                            } else if ($masaKerja > "5") {
                                $gajiPokok = 3000000;
                            } else if ($masaKerja > "1") {
                                $gajiPokok = 2000000;
                            }

                            // Hitung tunjangan istri
                            $tunjanganIstri = 0;
                            if ($_POST['status'] == 'menikah') {
                                $tunjanganIstri = $gajiPokok * 0.1;
                            }

                            // Hitung tunjangan anak
                            $jumlahAnak = (int)$_POST['jumlahAnak'];
                            $tunjanganAnak = $gajiPokok * 0.05 * $jumlahAnak;

                            // Hitung total penghasilan
                            $totalPenghasilan = $gajiPokok + $tunjanganIstri + $tunjanganAnak;
                            ?>

                            <div class="result-box mt-4">
                                <h5 class="text-center mb-3">Hasil Perhitungan</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Gaji Pokok</strong></td>
                                            <td class="text-end">Rp <?php echo number_format($gajiPokok, 0, ',', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tunjangan Istri</strong></td>
                                            <td class="text-end">Rp <?php echo number_format($tunjanganIstri, 0, ',', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tunjangan Anak</strong></td>
                                            <td class="text-end">Rp <?php echo number_format($tunjanganAnak, 0, ',', '.'); ?></td>
                                        </tr>
                                        <tr class="table-primary">
                                            <td><strong>Total Penghasilan</strong></td>
                                            <td class="text-end"><strong>Rp <?php echo number_format($totalPenghasilan, 0, ',', '.'); ?></strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>