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

function login ($data){
    global $koneksi;

    $username = $data['username'];
    $password = $data['password'];

    $check = "SELECT * from admin where username ='$username'";
    $tampilcheck = mysqli_query($koneksi, $check);
    $tampil = mysqli_fetch_array($tampilcheck);

    
    if($username === $tampil['username']){
        if ($password === $tampil['password']){
            $_SESSION['id'] = $tampil['id'];
            $_SESSION['username'] = $tampil['username'];
            $_SESSION['passowrd'] = $tampil['password'];
            $_SESSION['masuk'] = 'Berhasil Login';

            $_SESSION['admin'] = true;
            
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
    $username = $data['username'];
    $password = mysqli_real_escape_string($koneksi,$data['password']);

    $check = "SELECT * from admin where id ='$id'";
    $tampil = mysqli_query($koneksi,$check);

    $data = mysqli_num_rows($tampil);

    if($data == 1){
        $query = "UPDATE admin SET username='$username',password='$password' WHERE id = '$id'";
        mysqli_query($koneksi,$query);

        $_SESSION['update'] = 'Berhasil update profile';

        header('location:profile.php');
        exit();
    
    }else{
        $_SESSION['ID'] = 'ID tidak temukan!';
        header('location:profile.php');
        exit();
    }
}

function edituser($data){
    global $koneksi;

    $id = $data['id'];
    $nama = $data['nama'];
    $email = $data['email'];
    $password = mysqli_real_escape_string($koneksi,$data['password']);

    $check = "SELECT * from admin where id ='$id'";
    $tampil = mysqli_query($koneksi,$check);

    $data = mysqli_num_rows($tampil);

    if($data >= 0){
        $query = "UPDATE users SET nama='$nama',email='$email',password='$password' WHERE id = '$id'";
        mysqli_query($koneksi,$query);

        $_SESSION['update'] = 'Berhasil update profile';

        header('location:edituser.php?edit='.$id.'');
        exit();
    
    }else{
        $_SESSION['ID'] = 'ID tidak temukan!';
        header('location:edituser.php');
        exit();
    }
}

function status($data){
    global $koneksi;

    $id = $data['id'];
    $status = $data['status'];
    $query = "UPDATE bookings SET status='$status' WHERE id = '$id'";
    mysqli_query($koneksi,$query);
    $_SESSION['Berhasil'] = 'Berhasil mengganti status!';
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
    // $_SESSION['logout'] = "Berhasil Logout";
    
    // header('location:login.php');
}
if (isset($_GET['delete'])){
    $id = $_GET["delete"];
    $query = "DELETE FROM users WHERE id ='$id'";
    mysqli_query($koneksi,$query);
    
    $_SESSION['delete'] = 'Berhasil dihapus!';
    header('Location: user.php');
}
?>