<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        $try = $_GET['nonce'];
        echo "<meta http-equiv='Content-Security-Policy' content=\"default-src 'self'; script-src 'self' 'nonce-$try'\";>";
    ?>
    <title>CSP</title>
</head>
<body>
    <script>
        alert("Hello World!");
    </script>

    <?php
        $nonce = $_GET['nonce'];
        echo "<script nonce=$nonce>console.log('Hello World with nonce!');</script>";
    ?>

    <a href="index.php"><button>New Nonce</button></a>
</body>
</html>