<?php
    session_start();
    

    require('config.php');
    if(!isset($_SESSION['login'])){
        header("location:login.php");
    }

    if(isset($_COOKIE['login'])){
        if($_COOKIE['login'] == 'true'){
            $_SESSION['id '] = true;
        }
    }
    
    if (!isset($_COOKIE['color'])){
        $BGcolor = '#63b9db';
        $TextC = 'text-black';
    }else{
        if($_COOKIE['color'] == '#63b9db'){
            $BGcolor = $_COOKIE['color'];
            $TextC= 'text-black';
        }elseif($_COOKIE['color'] =='#6c757d'){
            $BGcolor = $_COOKIE['color'];
            $TextC='text-white';
        }
    }

    $id = $_SESSION['id'];

    $query = "SELECT * FROM bookings WHERE user_id='$id'";
    $select = mysqli_query($koneksi,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rafly Yogaswara 1202190061 SI4301</title>
    <!-- style css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color:<?=$BGcolor?>;">
        <div class="container">
            <a class="navbar-brand <?=$TextC?>" href="index.php"><strong>Xenon</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
                <a href="bookings.php">
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='<?=$Color?>' class='bi bi-cart-fill' viewBox='0 0 16 16'>
                        <path d='M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                    </svg></a>
                <ul class="navbar-nav ">
                    <div class='dropdown <?=$TextC?>'>
                        Keranjang
                        <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>    
                        </a>

                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                            <li><a class='dropdown-item' href='profile.php?users=<?=$_SESSION['id']?>'>Profile</a></li>
                            <li><a class='dropdown-item' href='config.php?logout=yes'>Logout</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <?php if (isset($_SESSION['delete'])){?>
        <div class="alert alert-success alert-dismissible fade show fade in" role="alert">
            <strong><?= $_SESSION['delete'];?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    <?php } ?>
    <?php
        unset($_SESSION['delete']);
    ?>

    <div class="container" >
        <?php if(mysqli_num_rows($select) >= 1){?>
            <table class="table table-striped css-serial" style="background:white;margin-top:50px;">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Tempat</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tanggal Perjalanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $noUrut = 1;
                        $harga = 0;
                        while ($data = mysqli_fetch_assoc($select)){
                            $harga++;                            
                            $TotalHarga[$harga] = $data['harga'];
                    ?>
                        <tr>
                            <td><?=$noUrut?></td>
                            <td><?=$data['nama_tempat']?></td>
                            <td><?=$data['lokasi']?></td>
                            <td><?=$data['tanggal']?></td>
                            <td>Rp <?=number_format($data['harga'], 0, ",", ".")?></td>
                            <td><a name='delete' class="btn btn-danger" href="config.php?delete=<?=$data['id']?>" role="button">Hapus</a></td>
                        </tr>
                        <?php 
                            $noUrut++;
                        }?>
                        <tr>
                            <td>Total</td>
                            <td colspan="3"></td>
                            <td>Rp <?=number_format(array_sum($TotalHarga), 0, ",", ".")?></td>
                            <td></td>
                        </tr>
                </tbody>
            </table>
        <?php }else{?>
            <h1 class="text-center">THERE IS NO DATA</h1>                    
        <?php } ?>
    <footer class="footer" style="background-color:<?=$BGcolor?>;">
        <p class="text-center mt-3 <?=$TextC?>">&copy; Copyright <a href="#" data-bs-toggle="modal" data-bs-target="#identitas">RAFLY_1202190061</a></p>
    </footer>

    <div class="modal fade" id="identitas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Created By</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <pre>Nama    : Rafly Yogaswara</pre>
                    <pre>NIM     : 1202190061</pre>
                </div>
            </div>
        </div>
    </div>
</body>
</html>