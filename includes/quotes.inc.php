<?php
try {
    $api_url = file_get_contents("https://zenquotes.io/api/random");
    $result  = json_decode($api_url, true);
    
    print_r('<sup><i class="fas fa-quote-left"></i></sup> ' . $result[0]["q"] . ' <sub><i class="fas fa-quote-right"></i></sub><br>');
    print_r('<b><i class="fas fa-user"></i> ' . $result[0]["a"] . '</b>');
} catch (Exception $e) {
    print_r();
}