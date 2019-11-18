<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "homestead";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sam=trim(strrev(chunk_split(strrev($model['NO_Sam']),2, ' ')));
$SN=$model['SN_Device'];
$samact=$model['activation_number'];
$samract=$model['reply_activation_number'];
$samad=$model['activation_date'];
$samrad=$model['activation_request_date'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://54.242.143.23/simk/rest/parse/sam",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 50,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sam_csn\"\r\n\r\n".$sam."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"terminal_sn\"\r\n\r\n".$SN."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"activation_number\"\r\n\r\n".$samact."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"reply_activation_number\"\r\n\r\n".$samract."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"activation_date\"\r\n\r\n".$samad."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"activation_request_date\"\r\n\r\n".$samrad."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"user_id\"\r\n\r\nbatara\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"password\"\r\n\r\nBATARA123456\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "Postman-Token: c04e9c3a-91e6-46c4-bdce-88117e1a1674",
    "adminsam: f99aecef3d12e02dcbb6260bbdd35189c89e6e73",
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo "Status". $response;

     echo "</br>DATA Terkirim</br>";
}
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die( "Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO request_log (sam_csn, activation_number, reply_activation_number, activation_date, activation_request_date)
VALUES ('$sam', '$samact', '$samract', '$samad', '$samrad')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
