<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Akhir Calculator</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-lg border-0 rounded-lg w-100" style="max-width: 500px;">
            <div class="card-header bg-primary text-white text-center py-3">
                <h4 class="mb-0">Kalkulator Nilai Akhir</h4>
            </div>
            <div class="card-body p-4">
                <form action="" class="form-control border-0" name="form1" method="post">
                    <div class="mb-4">
                        <label id="nilai" for="nilai" class="form-label fw-bold">Nilai Akhir:</label>
                        <input type="text" name="nilai" id="nilai" class="form-control form-control-lg shadow-sm" placeholder="Masukkan nilai">
                    </div>
                    <input type="hidden" id="kirim" name="kirim" value="1" />
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Hitung</button>
                    </div>
                </form>

                <?php
                if(isset($_POST['kirim']) == "1"){
                    $nilai_akhir = $_POST['nilai'];
                    if($nilai_akhir >= 85){
                        $mutu = "A";
                        $bg_color = "success";
                    }else if($nilai_akhir>=75){
                        $mutu = "B";
                        $bg_color = "primary";
                    }else if($nilai_akhir>=55){
                        $mutu = "C";
                        $bg_color = "warning";
                    }else if($nilai_akhir>=40){
                        $mutu = "D";
                        $bg_color = "danger";
                    }else{
                        $mutu = "E";
                        $bg_color = "danger";
                    }
                    echo "<div class='alert alert-light shadow-sm mt-4 p-4 text-center'>";
                    echo "<div class='mb-2'>Nilai Akhir: <span class='fw-bold'>" . $nilai_akhir . "</span></div>";
                    echo "<div>Nilai Mutu: <span class='badge bg-" . $bg_color . " px-3 py-2 fs-6'>" . $mutu . "</span></div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>