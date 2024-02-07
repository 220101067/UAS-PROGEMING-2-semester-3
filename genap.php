<body>
    <div class="container">
        <div class="card shadow mb-3">
            <div class="card-body">

                <center>
                    <h2 class="mt-5"> <i class="fas fa-book-reader"></i> KRS</h2>


                </center>
                <center>

                    <div class="card w-75">
                        <div class="card-body">
                            <div class="card-header ">
                                <center>
                                    <h4> Semester Genap</h4>
                                </center>
                            </div>

                            <body align="center">

                                <table class="table table-bordered" style="width: 100%;" align="center">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Semester</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        try {
                                            $sql = $con->prepare("SELECT mahasiswa.nama, mahasiswa.nim, semester.semester, semester.tgl_tahun
                                FROM mahasiswa
                                JOIN semester ON mahasiswa.id_mahasiswa = semester.id_mahasiswa
                                WHERE mahasiswa.status = 'Aktif' AND semester.status = 'Aktif'");

                                            $sql->execute();

                                            while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<tr>
                                    <td>{$data['nama']}</td>
                                    <td>{$data['nim']}</td>
                                    <td>{$data['semester']}</td>
                                    <td>{$data['tgl_tahun']}</td>
                                </tr>";
                                            }
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </body>

                        </div>
                    </div>
                </center>

                </html>


                <div id="contentToLock">
                    <div class="row mt-4 mb-2">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <small class="text-danger">
                                        <h6>Silakan Mengambil KRS Semseter Genap </h6>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="container mt-1">
                            <div class="container mt-1">
                                <a href="index.php?halaman=genap" class="btn btn"><i class="fas fa-book-reader"></i> KRS</a>
                                <a href="index.php?halaman=daftar_mk" class="btn btn-primary"> <i class="bi bi-file-text"></i> Daftar krs</a>
                            </div>
                            <center>
                                <form id="semesterForm">
                                    <select id="semester" name="semester" onchange="redirectToPage()">
                                        <option value="ganjil">2024/2025 Genap</option>
                                        <option value="genap">2023/2024 Ganjil</option>
                                    </select>
                                </form>
                            </center>


                        </div>


                        <div class="card-body">
                            <table class="table table-striped">
                                <thead style="background-color: #007bff; color: #fff;">
                                    <tr>
                                        <th>No</th>
                                        <th>kode mk</th>
                                        <th>nama mk</th>
                                        <th>semester</th>
                                        <th>sks</th>
                                        <th>kelas</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1; // Initialize $no before the loop

                                    try {
                                        $sql = $con->query("SELECT * FROM mata_kulia");
                                        while ($row = $sql->fetch()) {
                                            $id_mk2 = isset($row['id_mk']) ? $row['id_mk'] : '';
                                            $cekPengambilanQuery = $con->prepare("SELECT COUNT(*) as total FROM daftar_mk WHERE kode_mk = ? AND id_mk = ?");
                                            $cekPengambilanQuery->execute([$row['kode_mk'], $id_mk2]);
                                            $result = $cekPengambilanQuery->fetch(PDO::FETCH_ASSOC);

                                            // Validasi untuk menampilkan hanya data dengan semester angka 2
                                            if ($result['total'] == 0 && intval($row['semester']) == 2) {
                                                // Tambahkan validasi untuk semester angka 4
                                                if (intval($row['semester']) == 2) {
                                                    echo "<tr>
                                                    <td>{$no}</td>
                                                    <td>{$row['kode_mk']}</td>
                                                    <td>{$row['nama_mk']}</td>
                                                    <td>{$row['semester']}</td>
                                                    <td>{$row['sks']}</td>
                                                    <td>{$row['kelas']}</td>
                                                    <td>
                                                        <form method='POST' action='index.php?halaman=genap'>
                                                            <input type='hidden' name='id' value='{$row['id']}' />
                                                            <input type='hidden' name='kode_mk' value='{$row['kode_mk']}' />
                                                            <input type='hidden' name='nama_mk' value='{$row['nama_mk']}' />
                                                            <input type='hidden' name='semester' value='{$row['semester']}' />
                                                            <input type='hidden' name='sks' value='{$row['sks']}' />
                                                            <input type='hidden' name='kelas' value='{$row['kelas']}' />
                                                            <button type='submit' class='btn btn-success aksi-button'>ambil</button>
                                                        </form>
                                                    </td>
                                                </tr>";
                                                    $no++;
                                                }
                                            }
                                        }
                                    } catch (Exception $e) {
                                        // Handle exceptions here, if needed
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function redirectToPage() {
            var selectedSemester = document.getElementById("semester").value;
            if (selectedSemester === "ganjil") {
                window.location.href = "index.php?halaman=genap";
            } else if (selectedSemester === "genap") {
                window.location.href = "index.php?halaman=krs";
            }
        }
    </script>

</body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil data yang dikirim melalui POST
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $semester = $_POST['semester'];
    $sks = $_POST['sks'];
    $kelas = $_POST['kelas'];

    try {
        // Periksa apakah kode_mk sudah ada di tabel daftar_mk
        $cekKodeMKQuery = $con->prepare("SELECT COUNT(*) as total FROM daftar_mk WHERE kode_mk = ?");
        $cekKodeMKQuery->execute([$kode_mk]);
        $result = $cekKodeMKQuery->fetch(PDO::FETCH_ASSOC);

        if ($result['total'] > 0) {
            // Respon jika kode_mk sudah ada
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'matakuliah suda di ambil silakan mengambil matakuliah selanjutnya ?',
                text: 'Terjadi kesalahan!',
                showConfirmButton: false,
                timer: 3000
            }).then(function() {
                window.location.href = 'index.php?halaman=genap';
            });
        </script>";
        } else {
            // Lanjutkan dengan penyimpanan ke tabel daftar_mk
            $insertQuery = $con->prepare("INSERT INTO daftar_mk (kode_mk, nama_mk, semester, sks, kelas) VALUES (?, ?, ?, ?, ?)");
            $insertQuery->execute([$kode_mk, $nama_mk, $semester, $sks, $kelas]);

            // Respon berhasil
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Matakuliah berhasil ditambahkan!',
                text: 'Silakan melanjutkan proses pengambilan matakuliah.',
                showConfirmButton: false,
                timer: 3000
            }).then(function() {
                window.location.href = 'index.php?halaman=genap';
            });
        </script>";
        }
    } catch (Exception $e) {
        // Respon jika terjadi kesalahan
        echo 'error: ' . $e->getMessage(); // Menampilkan pesan kesalahan
    }
}
?>