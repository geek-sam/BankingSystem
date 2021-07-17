<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }

    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    { 
        echo '<script type="text/javascript">';
            echo ' alert("Sorry, Insufficient Balance")';  // showing an alert box.
            echo '</script>';
    }
    
    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
            echo "alert('Oops! Zero value cannot be transferred')";
            echo "</script>";
     }

    else {
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             
                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Completed');
                        window.location = 'transhistory.php';
                    </script>";  
                }
                $newbalance= 0;
                $amount =0;
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Transfer</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/transaction.css">
</head>
<body>
    <div class="container1">
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
            <img src="https://img.icons8.com/ios-filled/50/000000/menu--v1.png" class="menu-icon"
                onclick="togglemenu()" />
        </div>
        <h2 class="heading">Transfer Money</h2>
        <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
        <div class="banner">
            <form method="post" name="tcredit" class="tabletext"><br>
                <div>
                    <table class="table">
                        <tr style="color : black;">
                            <th>Si. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Total Balance</th>
                        </tr>
                        <tr style="color : red;">
                            <td>
                                <?php echo $rows['id'] ?>
                            </td>
                            <td>
                                <?php echo $rows['name'] ?>
                            </td>
                            <td>
                                <?php echo $rows['email'] ?>
                            </td>
                            <td>Rs.
                                <?php echo $rows['balance'] ?>/-
                            </td>
                        </tr>
                    </table>
                </div>
                <hr><br>

                <div class="row">
                    <div class="col-3">
                        <label><b>Transfer To:</b></label>
                        <select name="to" class="form-control" required>
                            <option value="" disabled selected>Select Account</option>
                            <?php
                            include 'config.php';
                            $sid=$_GET['id'];
                            $sql = "SELECT * FROM users where id!=$sid";
                            $result=mysqli_query($conn,$sql);
                            if(!$result)
                            {
                                echo "Error ".$sql."<br>".mysqli_error($conn);
                            }
                            while($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <option class="table" value="<?php echo $rows['id'];?>">

                                <?php echo $rows['name'] ;?> (Balance:
                                <?php echo $rows['balance'] ;?> )

                            </option>
                            <?php 
                            } 
                            ?>
                            <div>
                        </select>
                    </div>

                    <div class="col-3">
                        <label><b>Amount:</b></label>
                        <input type="number" class="form-control" name="amount" required>
                    </div>

                </div>

                <br><br>
                <div class="col-3">
                    <button class="btn2" name="submit" type="submit" id="myBtn">Transfer Amount</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        copyright &copy; Bank of Odisha
        <br>Made by Sambhav S.
    </footer>
    <script src="script.js"></script>
</body>

</html>