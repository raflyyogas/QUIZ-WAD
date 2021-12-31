<?php
    
if(!isset($_SESSION)){
    session_start();
}


$koneksi = mysqli_connect("localhost","root","","quiz2");

if(!$koneksi) {
    echo "<script>alert('Failed to connect to Database');</script>";
    die("Connection Die.". mysqli_connect_error());
    exit();
}

function regist($data){
    global $koneksi;

    $nama = $data['nama'];
    $email = $data['email'];
    $hp = $data['no_hp'];
    $password = mysqli_real_escape_string($koneksi,$data['password']);
    $confpw = mysqli_real_escape_string($koneksi,$data['confpw']);

    $check = "SELECT email from users where email ='$email'";
    $tampilcheck = mysqli_query($koneksi,$check);

    if(!mysqli_fetch_assoc($tampilcheck));{
        if($password === $confpw){

            $hash = password_hash($password,PASSWORD_BCRYPT);
            $query = "INSERT INTO users (nama, email,password,no_hp) VALUES ('$nama','$email','$hash','$hp')";
            mysqli_query($koneksi,$query);

            $_SESSION['BerhasilDaftar'] = 'Berhasil Daftar!';

            header('location:login.php');
            exit();
        }else{
            $_SESSION['TidakSama'] = 'Password Tidak Sama!';
            header("location:register.php");
            exit();

        }
    }
    $_SESSION['EmailTerdaftar'] = 'Gagal daftar';
    header('location:register.php');
    exit();
}

function login($data){
    global $koneksi;

    $email = $data['email'];
    $password = $data['password'];
    
    $check = "SELECT * from users where email ='$email'";
    $tampilcheck =mysqli_query($koneksi,$check);
    $tampil = mysqli_fetch_array($tampilcheck);

    if($email === $tampil['email']){
        if(isset($_POST['remember'])){
            setcookie('login','true',time()+1800);
        }
        if (password_verify($password, $tampil['password'])){
            $_SESSION['id'] = $tampil['id'];
            $_SESSION['nama'] = $tampil['nama'];
            $_SESSION['email'] = $tampil['email'];
            $_SESSION['passowrd'] = $tampil['passwod'];
            $_SESSION['no_hp'] = $tampil['no_hp'];
            $_SESSION['masuk'] = 'Berhasil Login';

            $_SESSION['login'] = true;
            
            header("location:index.php");
            exit();
        }else{
            $_SESSION['password'] = 'Password Salah!';
            header("location:login.php");
            exit();
        }
    }else{
        $_SESSION['gagal'] = 'Gagal Login!';

        header("location:login.php");
        exit();
    }

}

function profile($data){
    global $koneksi;

    $id = $data['id'];
    $nama = $data['nama'];
    $email = $data['email'];
    $hp = $data['no_hp'];
    $password = mysqli_real_escape_string($koneksi,$data['sandi']);
    $confpw = mysqli_real_escape_string($koneksi,$data['conf']);

    $check = "SELECT * from users where id ='$id'";
    $tampil = mysqli_query($koneksi,$check);

    $data = mysqli_num_rows($tampil);

    if($data == 1){
        if($password === $confpw){

            $hash = password_hash($password,PASSWORD_BCRYPT);
            $query = "UPDATE users SET nama='$nama',email='$email',password='$hash',no_hp='$hp' WHERE id = '$id'";
            mysqli_query($koneksi,$query);
            $_SESSION['update'] = 'Berhasil update profile';

            header('location:profile.php');
            exit();
        }else{
            $_SESSION['TidakSama'] = 'Password Tidak Sama!';
            header("location:profile.php");
            exit();
        }
    }
    $_SESSION['ID'] = 'ID tidak temukan!';
    header('location:profile.php');
    exit();
}

function bookings($data){
    global $koneksi;

    $id = $data['id'];
    $namaUser = $data['nama'];
    $namaAlat = $data['namaAlat'];
    $harga = $data['harga'];
    $tanggal = $data['tanggal'];
    $status = $data['status'];

    $query = "INSERT INTO bookings (id,user_id, namaUser, namaAlat, harga, tanggal, status) VALUES ('','$id','$namaUser','$namaAlat','$harga','$tanggal','$status')";
    $hasil = mysqli_query($koneksi,$query);
    $_SESSION['Berhasil'] = 'Berhasil memesan tiket!';
    header('location:index.php');
    exit();
}



if (isset($_GET['logout'])){
    
    session_start();
    session_unset();
    $_SESSION = [];
    session_destroy();

    setcookie('login','',time() - 3600);

    header("Location:login.php?alert=logout");
}

if (isset($_GET['delete'])){
    $id = $_GET["delete"];
    $query = "DELETE FROM bookings WHERE id ='$id'";
    mysqli_query($koneksi,$query);
    $_SESSION['delete'] = 'Berhasil dihapus!';
    header('Location: bookings.php');
}
?>