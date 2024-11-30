<?php
if (!is_dir('logs')) {
    mkdir('logs', 0777, true);
}

function getUserInfo() {
    $userInfo = [
        "IP Address" => $_SERVER['REMOTE_ADDR'],
        "Browser" => $_SERVER['HTTP_USER_AGENT'],
        "Device Type" => (preg_match('/mobile/i', $_SERVER['HTTP_USER_AGENT']) ? "Mobile" : "Desktop"),
        "Request Time" => date("Y-m-d H:i:s"),
    ];

    $infoString = "Accessed on: {$userInfo['Request Time']}\n";
    $infoString .= "IP Address: {$userInfo['IP Address']}\n";
    $infoString .= "Browser: {$userInfo['Browser']}\n";
    $infoString .= "Device Type: {$userInfo['Device Type']}\n\n";

    file_put_contents("logs/user_logs.txt", $infoString, FILE_APPEND);
}

getUserInfo();
?>
