<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $csp = $_POST['csp'];
        echo "<meta http-equiv='Content-Security-Policy' content=\"$csp\";>";
    ?>
    <title>CSP</title>
</head>
<body>
    <!-- first inline-script, not formatted -->
    <script>console.log("This the first SHA 256 Hash CSP try!");</script>

    <!-- second inline-script, formatted -->
    <script>
        let a = 10;
        for (let i = 0; i < 10; i++) {
            a += i;
        }

        console.log("This is the second SHA 256 Hash CSP try! " + a);
    </script>

    <!-- third inline-script, formatted -->
    <script>
        // Eval attacks are also blocked if 'unsafe-eval' is not specified
        eval("console.log('This is the third SHA 256 Hash CSP try!');")
    </script>

    <?php
        // fourth inline-script, formatted, used for testing XSS attacks
        echo "<script>" . $_POST['xss'] . "</script>";
    ?>

    <a href="index.php"><button>Reload Hashes</button></a>
</body>
</html>