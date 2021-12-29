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

    if(isset($_POST['RajaAmpat'])){
        jadwal($_POST);
        exit;
    }elseif(isset($_POST['Bromo'])){
        jadwal($_POST);
        exit;
    }elseif(isset($_POST['TanahLot'])){
        jadwal($_POST);
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
            <div class="p-5 rounded-3 bg-success">
                <div class="container mx-auto bg-success">
                    <p class="text-center" style="font-size: 50px;"><strong>XENON DENTAL</strong></p>
                </div>
            </div>
            <div class="card-group">
                <div class="card" style="width: 18rem;">
                    <img src="img/RajaAmpat.jpg" class="card-img-top" alt="Raja Ampat">
                    <div class="card-body">
                        <h5 class="card-title">Raja Ampat, Papua</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <hr>
                        <strong>Rp. 7.000.000</strong>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary d-grid col-15 mx-auto" data-bs-toggle="modal" data-bs-target="#RajaAmpat">Pesan Tiket</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="img/Bromo.jpg" class="card-img-top" alt="Gunung Bromo" style="width:auto">
                    <div class="card-body">
                        <h5 class="card-title">Gunung Bromo, Malang</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <hr>
                        <strong>Rp. 2.000.000</strong>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary d-grid col-15 mx-auto" data-bs-toggle="modal" data-bs-target="#Bromo">Pesan Tiket</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="img/tanahlot.jpg" class="card-img-top" alt="Tanah Lot">
                    <div class="card-body">
                        <h5 class="card-title">Tanah Lot, Bali</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <hr>
                        <strong>Rp. 5.000.000</strong>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary d-grid col-15 mx-auto" data-bs-toggle="modal" data-bs-target="#TanahLot">Pesan Tiket</a>
                    </div>
                </div>
            </div>
        </div>
        
        <footer class="footer" style="background-color:<?=$BGcolor?>;">
            <p class="text-center mt-3 <?=$TextC?>">&copy; Copyright <a href="#" data-bs-toggle="modal" data-bs-target="#identitas">RAFLY_1202190061</a></p>
        </footer>

        <!-- Modal For Raja Ampat  -->
        <!-- Modal -->
        <div class="modal fade" id="RajaAmpat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="#" method="POST" style="width:100%">
                        <div class="modal-body">
                            
                            <div class="mb-3" hidden>
                                <label for="id" class="form-label">ID</label>
                                <input type="text" name="id" class="form-control" id="id" value="<?=$_SESSION['id']?>">
                            </div>
                            <div class="mb-3" hidden>
                                <label for="lokasi" class="form-label">Nama Tempat</label>
                                <input type="text" name="nama" class="form-control" id="lokasi" value="Raja Ampat">
                            </div>
                            <div class="mb-3" hidden>
                                <label for="id" class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" id="lokasi" value="Papua">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Perjalanan</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal">
                            </div>
                            <div class="mb-3" hidden>
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" value="7000000">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="RajaAmpat">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal For Bromo -->
        <div class="modal fade" id="Bromo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="#" method="POST" style="width:100%">
                        <div class="modal-body">
                            
                            <div class="mb-3" hidden>
                                <label for="id" class="form-label">ID</label>
                                <input type="text" name="id" class="form-control" id="id" value="<?=$_SESSION['id']?>">
                            </div>
                            <div class="mb-3" hidden>
                                <label for="lokasi" class="form-label">Nama Tempat</label>
                                <input type="text" name="nama" class="form-control" id="lokasi" value="Gunung Bromo">
                            </div>
                            <div class="mb-3" hidden>
                                <label for="id" class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" id="lokasi" value="Malang">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Perjalanan</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal">
                            </div>
                            <div class="mb-3" hidden>
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" value="2000000">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="Bromo">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal For Tanah Lot -->
        <div class="modal fade" id="TanahLot" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="#" method="POST" style="width:100%">
                        <div class="modal-body">
                            
                            <div class="mb-3" hidden>
                                <label for="id" class="form-label">ID</label>
                                <input type="text" name="id" class="form-control" id="id" value="<?=$_SESSION['id']?>">
                            </div>
                            <div class="mb-3" hidden>
                                <label for="lokasi" class="form-label">Nama Tempat</label>
                                <input type="text" name="nama" class="form-control" id="lokasi" value="Tanah Lot">
                            </div>
                            <div class="mb-3" hidden>
                                <label for="id" class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" id="lokasi" value="Bali">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Perjalanan</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal">
                            </div>
                            <div class="mb-3" hidden>
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" value="5000000">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="TanahLot">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
        
    </body>
</html>