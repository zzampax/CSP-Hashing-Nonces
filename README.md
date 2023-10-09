# CSP-Hashing-Nonces
Example in which the CSP use hashes/nonces to check inline-scripts
All these examples were made in PHP, but the CSP is the same for all languages.

## Hashes
The chosen hashing method is SHA-256. The hash is generated using the following command:
```
base64_encode(hash('sha256', $script_content, true));
```
The hash is then added to the CSP content string:
```
$csp .= " 'sha256-$hash'";
```
That will later be appended to the CSP header in the HTML:
```
<meta http-equiv='Content-Security-Policy' content="...";>
```
### Adding custom inline scripts
If you add an inline script tag inside ```final.php```, you'll need to re-generate the hashes and add it to the CSP header.
The button ```Reload Hashes``` will redirect you to ```index.php```, and hashes will be generated automatically.

### XSS testing
By default, non-hashed inline scripts are blocked. using the provided input in ```index.php```, an injected inline script will be added to the ```final.php``` page with the inserted command.

## Nonces
The nonce is generated using the following command:
```
$nonce = base64_encode(openssl_random_pseudo_bytes(32));
```
The nonce is then added to the CSP header in the HTML:
```
<meta http-equiv='Content-Security-Policy' content="default-src 'self'; script-src 'self' 'nonce-$try'";>
```
The nonce is also added to the script tag:
```
<script nonce="$nonce">
```
### Additional considerations
The hashing example has been implemented with a POST request (to make the link less bloated), while the nonce, being in this case only one, is passed through a GET request. 
Obviously, *DO NOT* pass such values like this while building complete applications.
