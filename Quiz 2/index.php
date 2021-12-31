<?php
    session_start();

    require('dashboard/config.php');
    if (!isset($_COOKIE['color'])){
        $BGcolor = '#63b9db';
        $TextC = 'text-black';
    }else{
        if($_COOKIE['color'] == '#63b9db'){
            $BGcolor = $_COOKIE['color'];
            $TextC= 'text-black';
        }elseif($_COOKIE['color'] =='#121212'){
            $BGcolor = $_COOKIE['color'];
            $TextC='text-white';
        }
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
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top" role="navigation" style="background-color:<?=$BGcolor?>;">
        <div class="container">
            <a class="navbar-brand <?=$TextC?> text-center" href="index.php"><strong>Xenon</strong></a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav text-center">
                    <li class="nav-item">
                        <a class="nav-link <?=$TextC?>" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$TextC?>" href="#alat">Alat </a>
                    </li><li class="nav-item">
                        <a class="nav-link <?=$TextC?>" href="#form">Contact</a>
                    </li>
                </div>
            </div>
            
            <button type="button" class="btn btn-outline-light <?=$TextC?>" data-bs-toggle="modal" data-bs-target="#myModal">
                <i class="bi bi-person-circle"></i> Login 
            </button>
        </div>
    </nav>

    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login">Login Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <a href="/QUIZ-WAD/Quiz 2/dashboard/" class="btn btn-primary" >User</a>
                    <a href="/QUIZ-WAD/Quiz 2/dashboard/admin/" class="btn btn-primary" >Admin</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <section class="jumbotron jumbotron-fluid bg-secondary pt-4" id="home">
        <div class="container">
            <div class="text-center">
                <img src="img/logo.jpg" alt="logo Xenan" class="rounded-circle img-thumbnail mt-5"/>
                <h1 class="display-4 text-white">Xenon Dental</h1>
                <h4 class="text-white">Kebutuhan Dental</h4>
                <hr class="rounded-3" style="height:5px;border-width:0;color:white"/>
            </div>
            <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab iste corporis rerum autem totam repudiandae unde, aliquid voluptate incidunt similique voluptates expedita in adipisci, dolor suscipit voluptas omnis deleniti eius qui commodi modi sapiente animi quae? Reprehenderit eaque commodi maiores maxime ex recusandae accusantium impedit. Architecto accusamus nulla nemo et labore saepe! Eum quod neque atque possimus explicabo ipsam eius commodi itaque alias delectus ut aliquam exercitationem, magnam animi hic unde eos! Inventore, repellendus minus! Ad et eius natus voluptates quis in? Dolor ullam adipisci, labore illum numquam tempore officiis dignissimos quas quia sit vitae cum pariatur voluptate quaerat molestias!</p>
            <div class="text-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/ZE-TtFhZlDw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,160L20,181.3C40,203,80,245,120,245.3C160,245,200,203,240,186.7C280,171,320,181,360,192C400,203,440,213,480,202.7C520,192,560,160,600,122.7C640,85,680,43,720,48C760,53,800,107,840,133.3C880,160,920,160,960,170.7C1000,181,1040,203,1080,186.7C1120,171,1160,117,1200,85.3C1240,53,1280,43,1320,42.7C1360,43,1400,53,1420,58.7L1440,64L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z"></path></svg>
    </section>

    <section class="jumbotron jumbotron-fluid" id="alat">
        <div class="container">
            <h1 class="text-center mb-3">Alat Gigi</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 p-3">
                <div class="col">
                    <div class="card h-100">
                        <img src="https://www.alatkesehatan.id/wp-content/uploads/2016/11/kaca-dental.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title text-center">Kaca Dental</h5>
                            <p class="card-text">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta eius blanditiis, sed nemo similique praesentium fugit quis eligendi earum, consequatur aspernatur velit nostrum recusandae provident.
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href ="dashboard/index.php" class="btn btn-default bg-primary text-white">BUY</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://www.alatkesehatan.id/wp-content/uploads/2016/10/sonde-lurus.jpg" class="card-img-top" alt="..."/>
                        <div class="card-body">
                            <h5 class="card-title text-center">Sconde</h5>
                            <p class="card-text">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta eius blanditiis, sed nemo similique praesentium fugit quis eligendi earum, consequatur aspernatur velit nostrum recusandae provident.
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href ="dashboard/index.php" class="btn btn-default bg-primary text-white">BUY</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://www.alatkesehatan.id/wp-content/uploads/2017/02/GM-TGGGCH2.jpg" class="card-img-top" alt="..."/>
                        <div class="card-body">
                            <h5 class="card-title text-center">Tang Cabut Gigi Anak</h5>
                            <p class="card-text">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta eius blanditiis, sed nemo similique praesentium fugit quis eligendi earum, consequatur aspernatur velit nostrum recusandae provident.
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href ="/dashboard/index.php" class="btn btn-default bg-primary text-white">BUY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#6c757d" fill-opacity="1" d="M0,64L12,74.7C24,85,48,107,72,106.7C96,107,120,85,144,101.3C168,117,192,171,216,186.7C240,203,264,181,288,170.7C312,160,336,160,360,149.3C384,139,408,117,432,112C456,107,480,117,504,106.7C528,96,552,64,576,48C600,32,624,32,648,58.7C672,85,696,139,720,170.7C744,203,768,213,792,208C816,203,840,181,864,149.3C888,117,912,75,936,90.7C960,107,984,181,1008,181.3C1032,181,1056,107,1080,74.7C1104,43,1128,53,1152,58.7C1176,64,1200,64,1224,69.3C1248,75,1272,85,1296,101.3C1320,117,1344,139,1368,144C1392,149,1416,139,1428,133.3L1440,128L1440,320L1428,320C1416,320,1392,320,1368,320C1344,320,1320,320,1296,320C1272,320,1248,320,1224,320C1200,320,1176,320,1152,320C1128,320,1104,320,1080,320C1056,320,1032,320,1008,320C984,320,960,320,936,320C912,320,888,320,864,320C840,320,816,320,792,320C768,320,744,320,720,320C696,320,672,320,648,320C624,320,600,320,576,320C552,320,528,320,504,320C480,320,456,320,432,320C408,320,384,320,360,320C336,320,312,320,288,320C264,320,240,320,216,320C192,320,168,320,144,320C120,320,96,320,72,320C48,320,24,320,12,320L0,320Z"></path></svg>
    </section>

    <section class="jumbotron jumbotron-fluid bg-secondary" id="form">
        <div class="container">
            <h1 class="text-white text-center mb-5">Contact Form</h1>
            <div class="row">
                <div class="col">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your Full Name" size="5" required />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" size="20" required />
                        </div>
                        <div class="mb-3">
                            <label for="Pesan" class="form-label text-white">Pesan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" size="20"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
                <div class="col">
                    <div class="responsive-map" style="width: 100%">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3202709067436!2d107.62886901473411!3d-6.971490770199846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adaf2f99a3%3A0xaefd20f00bdb096d!2sTelkom%20University%20Convention%20Hall!5e0!3m2!1sen!2sid!4v1635361879862!5m2!1sen!2sid"
                            width="100%"
                            height="450"
                            frameborder="0"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="<?=$BGcolor?>" fill-opacity="1" d="M0,160L48,154.7C96,149,192,139,288,122.7C384,107,480,85,576,90.7C672,96,768,128,864,149.3C960,171,1056,181,1152,186.7C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
        
    <footer class="p-3" style="background-color:<?=$BGcolor?>;">
        <p class="text-center text-black">&copy; Copyright <a class="text-black" href="#" data-bs-toggle="modal" data-bs-target="#identitas">RAFLY_1202190061</a></p>
    </footer>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-arrow-up-circle"></i></button>

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

    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>
</html>