<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: Screen.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="loan.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Loan</title>
</head>
<body>

    <div class="container">
 <?php
        include 'config.php';
        if (isset($_POST["submit"])) {
           $name = $_POST["fullname"];
             $phone = $_POST["phone"];
           $email = $_POST["email"];
           $address= $_POST["address"];
           $income = $_POST["income"];
           $loantype = $_POST["loantype"];
             $amount = $_POST["amount"];
           
          $errors = array();



            if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO loan (name, phone, email,address,income,loantype,amount) VALUES ( ?, ?, ?, ?, ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ssssiii",$name,  $phone, $email,  $address,  $income,  $loantype, $amount);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Your loan application is successfully approved.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
           
        <div class="formbox">
            <h1> Loan Appliciation</h1>
            <form action="Loan.php" method="POST">
                <div class="input-group">
                    <div class="input-field">
                       <input type="text" name="name" placeholder="Full Name">
                    </div>
                    <div class="input-field">
                       <input type="phone"  name="phone" placeholder="Phone Number">
                    </div>
                    <div class="input-field">
                       <input type="email" name="email" placeholder="Email Id">
                    </div>
                    <div class="input-field">
                       <input type="text" name="address" placeholder="Address">
                    </div>
                    <div class="input-field">
                       <input type="number"  name="income" placeholder="your Annual Income">
                    </div>
                    <div class="input-field">
                       <input type="text" name="loantype" placeholder="Loan Type">
                    </div>
                    <div class="input-field">
                       <input type="number" name="amount" placeholder="Enter amount for Loan">
                    </div>
                </div> 
                    <div class="btn-field">
                        <button type="submit">Apply for Loan</button>
                    </div>

             </form>
        </div>    
    </div>
    

    
</body>
</html>