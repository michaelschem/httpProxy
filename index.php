<?PHP

function curl_download($post, $get, $cookies, $url) {
    // is cURL installed yet?
    if (!function_exists('curl_init')) {
        die('Sorry cURL is not installed!');
    }

    // OK cool - then let's create a new cURL resource handle
    $ch = curl_init();;

    // Now set some options (most are optional)
    // Set URL to download
    curl_setopt($ch, CURLOPT_URL, $url . "?" . $get);

    // Set a referer
    curl_setopt($ch, CURLOPT_REFERER, $url);

    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");

    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    //Cookies
    curl_setopt($ch, CURLOPT_COOKIE, $cookies);

    // Set request method to POST
    curl_setopt($ch, CURLOPT_POST, 1);

    // Set query data here with CURLOPT_POSTFIELDS
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    // Download the given URL, and return output
    $output = curl_exec($ch);

    // Close the cURL resource, and free system resources
    curl_close($ch);

    $html = str_get_html($output);

    return $html;

    if (!$html) {
        echo"Didn't work";
    }

}

echo curl_download($_POST,$_GET,$_COOKIES,"www.google.com");

echo error_get_last();
?>
