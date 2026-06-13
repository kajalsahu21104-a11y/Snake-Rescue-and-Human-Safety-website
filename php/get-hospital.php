<?php

$db = new mysqli("localhost", "root", "", "snake_rescue");

$sqlCode = "SELECT * FROM hospitals";
$res = $db->query($sqlCode);

if ($res->num_rows > 0) {
    $alldata = [];

    while ($data = $res->fetch_assoc()) {
        // Directly encode binary image data
        $data['image'] = base64_encode($data['image']);

        $alldata[] = $data;
    }

    http_response_code(200);
    $msg = ["isdataFound" => true, "data" => $alldata];
    echo json_encode($msg);
} else {
    http_response_code(404);
    $msg = ["isdataFound" => false, "msg" => "Data Not Found !!"];
    echo json_encode($msg);
}

?>
