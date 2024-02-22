<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Your API endpoint
    $url = 'https://order.drcash.sh/v1/order';
    
    // Data to be sent in the request
    $data = [
        'stream_code' => 'iu244',
        'client' => [
            'name' => $name,
            'phone' => $phone,
        ],
        'sub1' => 'test',
    ];

    // Headers for the request
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer NWJLZGEWOWETNTGZMS00MZK4LWFIZJUTNJVMOTG0NJQXOTI3',
    ];

    // Initialize curl resource
    $ch = curl_init($url);

    // Set curl options
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Execute curl and get response
    $response = curl_exec($ch);

    // Close curl resource
    curl_close($ch);

    // Handle response
    if ($response) {
        header("Location: thank_you.php");
        exit();
    } else {
        header("Location: error.php");
        exit();
    }
} else {
    header("Location: index.html");
    exit();
}
?>
