<?php
session_start();
require_once 'koneksi/koneksi.php';


?>

<!DOCTYPE html>
<html>

<head>
    <title>Aneka-Perpus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 
   
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-5 d-none d-lg-block ">
                            <img style="width: 480px; height: 420px; padding-left: 30px;" src="assets/gambar/login.png">
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5 mt-4 p-4">
                            <h2 class="text-center mb-2">Login</h2>
                            <h4 class="text-center mb-2"> <i class="bi bi-mortarboard"></i> KRS MAHASISWAH</h4>
                            <form action="" method="POST" class="p-3">
                                <div class="form-group">
                                    <label for="nim">Masukan Nim</label>
                                    <input type="text" class="form-control" id="nim" name="nim" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="pass" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="login" class="btn text-light btn-block" style="background-color: #8E81FF">Login</button>

                                <br> <a href="#">lupa password?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to toggle password visibility -->
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleButton = document.querySelector(".input-group-append button");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = "password";
                toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
    </script>
    <!-- alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
// cek login
if (isset($_POST['login'])) {
    $nim = htmlspecialchars($_POST['nim']);
    $password = htmlspecialchars($_POST['pass']);

    if (empty($nim) || empty($password)) {
        echo "<script>
                alert('Data tidak boleh kosong!');
                window.location.href = 'login.php';
              </script>";
    } else {
        //cek username
        $stmt = $con->prepare("SELECT * FROM mahasiswa WHERE nim = :nim");
        $stmt->bindParam(':nim', $nim);
        $stmt->execute();

        $jml = $stmt->rowCount();

        if ($jml > 0) {
            $nim_info = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if the user's level is active
            if ($nim_info['status'] == 'aktif') {
                // Check password
                if ($nim_info && password_verify($password, $nim_info['password'])) {
                    // Password correct, set session
                    $_SESSION['level'] = $nim_info['level'];
                    $_SESSION['nim'] = $nim_info['nim'];

                    if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'nim') {
                        echo "<script>
                                Swal.fire({
                                    title: 'Login sukses!',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(function() {
                                    window.location.href = 'index.php?halaman=krs';
                                });
                              </script>";
                        exit;
                    }
                } else {
                    echo "<script>
                            alert('Username atau password salah');
                            window.location.href = 'login.php';
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Akun Anda tidak aktif. Silakan hubungi administrator.');
                        window.location.href = 'login.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Username tidak ditemukan');
                    window.location.href = 'login.php';
                  </script>";
        }
    }
}
?>
