<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 100%;
            color: white;
            bottom: 0;
        }

        .carousel-caption h5 {
            font-size: 2.5em;
            letter-spacing: 2px;
        }

        .carousel-caption p {
            font-size: 1.5em;
            letter-spacing: 1px;
        }
        
        .text-black {
            color: black;
            font-weight: bold;
        }
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
           
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('img')}}/logo.png" alt="logo" width="100" height="30" class="d-inline-block align-text-top">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                              </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img')}}/furniture.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-block mt-5">
                    <h1 class="text-black">EXPLORE,</h1>
                    <h1 class="text-black">DREAM & CREATE</h1>
                    <p class="text-black">our services offer countless possibilities</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('img')}}/furniture.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-block">
                    <h1>Second slide label</h1>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('img')}}/furniture.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-block">
                    <h1>Third slide label</h1>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('img')}}/kayu.webp" class="img-fluid" alt="Your Image">
            </div>
            <div class="col-md-6">
                <h2>WE ARE THE HOME</h2>
                <h2>TECHNOLOGY EXPERTS</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni distinctio quod dignissimos fuga laborum molestias voluptatum praesentium quis, accusantium, dolorem nisi cumque illo nostrum consectetur optio libero deleniti eaque sint quae, vel eum obcaecati totam! Dolorem maxime voluptatibus sapiente doloremque deserunt vero magnam perferendis voluptatum nemo illo. In, et. Nemo doloribus, soluta voluptatum doloremque ex placeat architecto esse saepe maxime accusamus dicta, cum iusto? Nisi, quas voluptates aliquid commodi quibusdam beatae fugit laudantium placeat! Omnis, quibusdam incidunt corporis ullam sunt asperiores ratione deleniti magni fugiat id nisi facilis dignissimos. Ex nihil a excepturi facere laborum fugit necessitatibus itaque eaque sapiente.</p>
                <button type="button" class="btn btn-outline-success">Read More</button>
            </div>
        </div>
    </div>
   

    <script src="{{asset('img')}}/https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
