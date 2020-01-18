<center><br><br><br><br><br><br><br><br><br>
<?php 

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

//Get IP Address / Hostname
//$ip = gethostbyaddr($_SERVER['REMOTE_HOST']);
$ip = get_client_ip();

echo '<div class="panel-heading">
        <h1 style="color:#0970F9"><p style="font-size:200%"><strong>'.'Your IP Address is: '.$ip.'</strong></h1></p></div>';
?>
</center>


