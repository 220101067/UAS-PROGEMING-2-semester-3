<body>
    <div class="container">
        <h2 class="mt-5"><i class="bi bi-mortarboard"></i> Daftar Krs</h2>

        <div id="contentToLock">

            <div class="card shadow mb-3">
                <div class="card-header">

                    <a href="index.php?halaman=krs" class="btn btn-primary"> <i class="fas fa-book-reader"></i> KRS</a>
                    <a href="index.php?halaman=daftar_mk" class="btn btn"> <i class="bi bi-file-text"></i> Daftar krs</a>

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead style="background-color: #007bff; color: #fff;">
                            <tr>
                                <center>
                                    <h4>Semester : Ganjil</h4>
                                </center>
                                <th>kode mk</th>
                                <th>nama mk</th>
                                <th>semester</th>
                                <th>sks</th>
                                <th>kelas</th>
                                <th>aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            try {
                                $sql = $con->query("SELECT * FROM daftar_mk");
                                while ($row = $sql->fetch()) {

                                    // Validasi untuk menampilkan hanya data dengan semester ganjil
                                    if (intval($row['semester']) == 1) {
                                        echo "<tr>
                                    <td>{$row['kode_mk']}</td>
                                    <td>{$row['nama_mk']}</td>
                                    <td>{$row['semester']}</td>
                                    <td>{$row['sks']}</td>
                                    <td>{$row['kelas']}</td>
                                    <td>
                                        <a href='index.php?halaman=hapus_daftar_mk&id_mk={$row['id_mk']}' onclick='return confirm(\"Hapus Data?\")' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                                    </td>
                                </tr>";
                                    }
                                }
                            } catch (Exception $e) {
                                // Handle exceptions here, if needed
                                echo "Error: " . $e->getMessage();
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="card-header">
                <div class="card-body">

                    <table class="table table-striped">
                        <thead style="background-color: #007bff; color: #fff;">
                            <tr>
                                <center>
                                    <h4>Semester : Genap</h4>
                                </center>
                                <th>kode mk</th>
                                <th>nama mk</th>
                                <th>semester</th>
                                <th>sks</th>
                                <th>kelas</th>
                                <th>aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            try {
                                $sql = $con->query("SELECT * FROM daftar_mk");
                                while ($row = $sql->fetch()) {

                                    // Validasi untuk menampilkan hanya data dengan semester ganjil
                                    if (intval($row['semester']) == 2) {
                                        echo "<tr>
                                    <td>{$row['kode_mk']}</td>
                                    <td>{$row['nama_mk']}</td>
                                    <td>{$row['semester']}</td>
                                    <td>{$row['sks']}</td>
                                    <td>{$row['kelas']}</td>
                                    <td>
                                        <a href='index.php?halaman=hapus_daftar_mk&id_mk={$row['id_mk']}' onclick='return confirm(\"Hapus Data?\")' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                                    </td>
                                </tr>";
                                    }
                                }
                            } catch (Exception $e) {
                                // Handle exceptions here, if needed
                                echo "Error: " . $e->getMessage();
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-Gn5384xd4Eamn6MJSJNl+wnUmZUm5v0LQ5i/YzNekbY=" crossorigin="anonymous"></script>
    <!-- Include Bootstrap JS link here -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-mC9P5ZXTz5zT8rTIDShMK7K2tXY/R+aEhtA2QF5GqNInylf1RxQJ3dnb6vpf4G" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>