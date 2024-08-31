<?php
// This API is currently in pre-alpha and under active development.
// Expect bugs and limited functionality. Use at your own risk.

// Function to get the user's IP address
function getIP(array $args) : array
{
    try {
        $ip = ipCheck();
        return [
            'statusCode' => 200,
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode(['ip' => $ip])
        ];
    } catch (Exception $e) {
        return [
            'statusCode' => 500,
            'body' => json_encode(['error' => $e->getMessage()])
        ];
    }
}

?>
