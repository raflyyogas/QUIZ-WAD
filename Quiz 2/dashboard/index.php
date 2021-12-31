<?php
    session_start();
    
    if(!isset($_SESSION['login'])){
        header("location:login.php");
        exit;
    }

    if(isset($_COOKIE['login'])){
        if($_COOKIE['login'] == 'true'){
            $_SESSION['login'] = true;
        }
    }

    if (!isset($_COOKIE['color'])){
        $BGcolor = '#63b9db';
        $TextC = 'text-black';
    }else{
        if($_COOKIE['color'] == '#63b9db'){
            $BGcolor = $_COOKIE['color'];
            $TextC = 'text-black';
            $Color = '#000000';
        }elseif($_COOKIE['color'] =='#6c757d'){
            $BGcolor = $_COOKIE['color'];
            $TextC ='text-white';
            $Color = '#ffffff';
        }
    }

    require('config.php');
    if(isset($_POST['submit'])){
        bookings($_POST);
    }


    $query = "select * from product";
    $cproduct = mysqli_query($koneksi,$query);

    $id = $_SESSION['id'];
    $user = "select * from users where id ='$id'";
    $connect = mysqli_query($koneksi,$user);
    $tampil = mysqli_fetch_assoc($connect);

    if(isset($_POST['KacaDental'])){
        bookings($_POST);
        exit;
    }elseif(isset($_POST['Sconde'])){
        bookings($_POST);
        exit;
    }elseif(isset($_POST['TangCabut'])){
        bookings($_POST);
        exit;
    }
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
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

        <!-- Javascript -->  
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        
        <?php if(isset($_SESSION['masuk'])) :?>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong><?=$_SESSION['masuk'];?></strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        <?php 
            unset($_SESSION['masuk']);
        endif; 
        ?>
        
        <?php if(isset($_SESSION['Berhasil'])) :?>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong><?=$_SESSION['Berhasil'];?></strong> Click <a href="bookings.php">here</a> to see the schedule
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        <?php 
            unset($_SESSION['Berhasil']);
        endif; 
        ?>
        
        <div class="container">
            <div class="card-group mt-3">
            <?php if(mysqli_num_rows($cproduct) == 0){?>
                <h1 class="text-center">THERE IS NO DATA</h1> 
            <?php }else{ ?>
                <?php 
                while ($product = mysqli_fetch_array($cproduct)){
                ?>
                    <div class="card" style="width: 5rem;">
                        <img src="../dashboard/gambar/<?= $product['gambar'];?>" class="card-img-top"  style="height: 400px;" alt="<?= $product['NamaAlat']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['NamaAlat']?></h5>
                            <p class="card-text"><?=$product['description']?></p>
                            <hr>
                            <strong>Rp <?=number_format($product['harga'], 0, ",", ".")?></strong>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary d-grid col-15 mx-auto" data-bs-toggle="modal" data-bs-target="#product<?= $product['id']?>">Pesan Product</a>
                        </div>
                    </div>
                    <div class="modal fade" id="product<?= $product['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="#" method="POST" style="width:100%">
                                    <div class="modal-body">
                                        <div class="mb-3" hidden>
                                            <label for="id" class="form-label">ID</label>
                                            <input type="text" name="id" class="form-control" id="id" value="<?=$_SESSION['id']?>">
                                        </div>
                                        <div class="mb-3" hidden>
                                            <label for="nama" class="form-label">Nama Users</label>
                                            <input type="text" name="nama" class="form-control" id="nama" value="<?=$tampil['nama']?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lokasi" class="form-label">Nama Alat</label>
                                            <input type="text" name="namaAlat" class="form-control" id="namaAlat" value="<?= $product['NamaAlat']?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal Pembelian</label>
                                            <input type="datetime-local" name="tanggal" class="form-control" id="tanggal" value="<?php echo date("Y-m-d\TH:i:s",time()); ?>" readonly>
                                        </div>
                                        <div class="mb-3" >
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="text" name="harga" class="form-control" id="harga" value="<?= $product['harga']?>" readonly>
                                        </div>
                                        <div class="mb-3" hidden>
                                            <label for="status" class="form-label">Status</label>
                                            <input type="text" name="status" class="form-control" id="status" value="Waiting for payment" readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="KacaDental">Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php 
                }
            } ?>
            </div>
        </div>
        
        <footer class="footer" style="background-color:<?=$BGcolor?>;">
            <p class="text-center mt-3 <?=$TextC?>">&copy; Copyright <a href="#" data-bs-toggle="modal" data-bs-target="#identitas">RAFLY_1202190061</a></p>
        </footer>

        <!-- FOOTER -->

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
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        
    </body>
</html>