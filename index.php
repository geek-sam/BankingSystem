<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank of Odisha | Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigation Bar -->
    <div class="container">
        <div class="navbar">
            <h1 class="logo">Bank of Odisha</h1>
            <nav>
                <ul id="menu">
                    <li><a class="active1" href="index.php">Home</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="customers.php">Customers</a></li>
                    <li><a href="transhistory.php">Transactions</a></li>
                </ul>
            </nav>
            <img src="https://img.icons8.com/ios-filled/50/000000/menu--v1.png" class="menu-icon" onclick="togglemenu()"/>
        </div>

        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img src="images/img-1.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="images/img-2.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="images/img-3.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="images/img-4.jpg" style="width:100%">
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
        </div>

        <!-- Activity Section -->
        <div class="activity">
            <div class="col">
                <img src="images/payment.svg" alt="Customers" class="photo">
                <br>
                <a href="customers.php"> <button class="btn">Customers</button> </a>
            </div>
            <div class="col">
                <img src="images/transhistory.png" alt="Transactions" class="photo p1">
                <br>
                <a href="transhistory.php"> <button class="btn">Transactions</button> </a>
            </div>
            <div class="col">
                <img src="images/loan.svg" alt="Loan" class="photo">
                <br>
                <a href=""> <button class="btn">Loans</button> </a>
            </div>
            <div class="col">
                <img src="images/services.png" alt="Transactions" class="photo p1">
                <br>
                <a href=""> <button class="btn">Services</button> </a>
            </div>
        </div>
    </div>

    <div class="imp">
        <h2>Recent Updates</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid doloremque facere quia molestiae magni delectus, voluptatum odit dolore iure? Animi nihil nesciunt ab quia nisi tempora, vel debitis doloremque eveniet vero, voluptate sint molestias!</p>
    </div>
    <footer>
        copyright &copy; Bank of Odisha
        <br>Made by Sambhav S.
    </footer>
    <script src="script.js"></script>
</body>
</html>