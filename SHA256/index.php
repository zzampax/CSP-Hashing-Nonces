<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hashing...</title>
</head>
<body>
    <form action="final.php" method="post">
        <?php
            $html = file_get_contents('final.php');
            $dom = new DOMDocument();
            $dom->loadHTML($html);
            $scripts = $dom->getElementsByTagName('script');
            $csp = "default-src 'self'; script-src 'self'";

            foreach($scripts as $script) {
                $script_content = $script->nodeValue;
                $hash = base64_encode(hash('sha256', $script_content, true));
                $csp .= " 'sha256-$hash'";
            }

            //$csp = urlencode($csp);
            echo "<input type='hidden' name='csp' value=\"$csp\">";
        ?>
        <input type="text" name="xss" placeholder="XSS Injector (no script tags)">
        <input type="submit" value="Submit">
    </form>
</body>
</html>