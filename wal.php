<!DOCTYPE html>
<html>
<head>
    <title>My Cryptocurrency Wallet</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="wallet">
        <h1>My Cryptocurrency Wallet</h1>
        <p>Balance: $1000.00</p>
        <div class="transaction">
            <form action="process_transaction.php" method="post">
                <label for="amount">Amount:</label>
                <input type="text" name="amount" id="amount" required>
                <label for="address">Recipient Address:</label>
                <input type="text" name="address" id="address" required>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</body>
</html>