<?php
session_start();
$_SESSION["firstname"] = $_POST["firstname"];
$_SESSION["age"] = $_POST["age"];
$_SESSION["gender"] = $_POST["gender"];
$features = [];

for ($i = 1; $i <= 14; $i++) {
    $question_key = "question_" . $i;
    if (isset($_POST[$question_key])) {
        $feature_value = (int) $_POST[$question_key];
        $features[] = $feature_value;
    }
}

$json_data = json_encode(["features" => $features]);
$server_url = "http://127.0.0.1:5000/predict";

$ch = curl_init($server_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);
$result_url = "result.php?predicted_class=" . urlencode($response);
header("Location: $result_url");
exit();
?>
