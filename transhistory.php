<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customer.css">
</head>
<body>
    <div class="con">
        <div class="navbar">
            <h1 class="logo">Bank of Odisha</h1>
            <nav>
                <ul id="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="customers.php">Customers</a></li>
                    <li><a class="active1" href="transhistory.php">Transactions</a></li>
                </ul>
            </nav>
            <img src="https://img.icons8.com/ios-filled/50/000000/menu--v1.png" class="menu-icon"
                onclick="togglemenu()" />
        </div>

        <div class="content">
            <h2 class="heading">TRANSACTION HISTORY</h2>
            <br>
            <table class="center">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Amount</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                include 'config.php';
                $sql ="SELECT * FROM transaction";
                $query =mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_assoc($query))
                    {
            ?>
                    <tr>
                    <td><?php echo $rows['sno']; ?></td>
                    <td><?php echo $rows['sender']; ?></td>
                    <td><?php echo $rows['receiver']; ?></td>
                    <td>Rs. <?php echo $rows['balance']; ?> /-</td>
                    <td><?php echo $rows['datetime']; ?> </td>                
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