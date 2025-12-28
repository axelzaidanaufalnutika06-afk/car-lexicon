<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['pass']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | Car Lexicon</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link rel="icon" href="logocars.png" />
  </head>
  <body class="bg-secondary-subtle">
    <div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
        <div class="card border-0 shadow rounded-5">
            <div class="card-body">
            <div class="text-center mb-3">
                <i class="bi bi-person-circle h1 display-4"></i>
                <p>Car Lexicon</p>
                <hr />
            </div>
            <form action="" method="post">
                <input
                type="text"
                name="user"
                class="form-control my-4 py-2 rounded-4"
                placeholder="Username"
                />
                <input
                type="password"
                name="pass"
                class="form-control my-4 py-2 rounded-4"
                placeholder="Password"
                />
                <div class="text-center my-3 d-grid">
                <button class="btn btn-danger rounded-4">Login</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div> 
    <?php
    // set variable username dan password dummy
    $username = "admin";
    $password = "123456"; // Mengikuti data di gambar, bukan 969696

    // check apakah ada request dengan method POST yang dilakukan
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Cek Login
        if($_POST['user'] == $username && $_POST['pass'] == $password){
            // KONDISI BENAR (SUCCESS)
            // Menggunakan alert-success untuk latar belakang hijau muda
            $alert_class = "alert-success"; 
            $text_class = "text-success"; // Untuk teks "Username dan Password Benar"
            $message = "Username dan Password Benar";
        } else {
            // KONDISI SALAH (DANGER)
            // Menggunakan alert-danger untuk latar belakang merah muda
            $alert_class = "alert-danger"; 
            $text_class = "text-danger"; // Untuk teks "Username dan Password Salah"
            $message = "Username dan Password Salah";
        }
        
        // Tampilkan Output
        echo '<div class="container mt-4">';
        echo '  <div class="row justify-content-center">';
        echo '    <div class="col-12 col-sm-8 col-md-6">';
        
        // Penggunaan Alert dengan kelas Bootstrap: alert-success, shadow, dan rounded-4
        echo '      <div class="alert ' . $alert_class . ' shadow-lg text-center rounded-4" role="alert">';
        
        // Tampilkan inputan user
        echo '        user : ' . htmlspecialchars($_POST['user']) . '<br>';
        echo '        pass : ' . htmlspecialchars($_POST['pass']) . '<br>';
        
        // Tampilkan pesan status dengan kelas text-success/danger
        echo '        <span class="fw-bold ' . $text_class . '">' . $message . '</span>';
        
        echo '      </div>'; // Penutup Alert
        echo '    </div>'; // Penutup Col
        echo '  </div>'; // Penutup Row
        echo '</div>'; // Penutup Container
    }
?>
  </body>
</html>
<?php
}
?>