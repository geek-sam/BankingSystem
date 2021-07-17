<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer | Money Transfer</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customer.css">
</head>
<body>
<?php
    include 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
?>
    <!-- Header -->
    <div class="con">
        <div class="navbar">
            <h1 class="logo">Bank of Odisha</h1>
            <nav>
                <ul id="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Services</a></li>
                    <li><a class="active1" href="customers.php">Customers</a></li>
                    <li><a href="transhistory.php">Transactions</a></li>
                </ul>
            </nav>
            <img src="https://img.icons8.com/ios-filled/50/000000/menu--v1.png" class="menu-icon" onclick="togglemenu()"/>
        </div>
    </div>
    
    <div class="content">
        <h2 class="heading">Customers</h2>
        <br>
            <div class="customer-table" style="overflow-x:auto;">
                <table class="center">
                    <thead>
                        <tr>
                        <th scope="col">S. no.</th>
                        <th scope="col">Name</th>                            
                        <th scope="col">E-Mail</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Send Money</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr style="color : black;">
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name']?></td>
                        <td><?php echo $rows['email']?></td>
                        <td>Rs. <?php echo $rows['balance']?> /-</td>
                        <td><a href="transaction.php?id= <?php echo $rows['id'] ;?>"> 
                        <button type="button" class="btn" style="background-color:#0e992a">Proceed</button></a></td> 
                    </tr>
                <?php
                    }
                ?>
                    </tbody>
                </table>
            </div>
    </div>
    <footer>
        copyright &copy; Bank of Odisha
        <br>Made by Sambhav S.
    </footer>
    <script src="script.js"></script>
</body>
</html>