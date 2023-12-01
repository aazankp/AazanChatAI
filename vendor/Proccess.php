<?php

require_once "Database.php";

$Database = new Database();

$AIKey = "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";

if (isset($_REQUEST["Question"])) {
    $question = $_REQUEST["Question"];
    
    $Curl = curl_init("https://api.openai.com/v1/chat/completions");

    $Header = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $AIKey,
    ];

    $Param = json_encode([
        "model" => "gpt-3.5-turbo",
        "messages" => [[
                "role" => "user",
                "content" => $question,
            ]],
    ]);

    $Response = json_decode(CURL ("POST", $Curl, $Param, $Header), true);

    $response = $Response['choices'][0]['message']['content'];

    $arr = explode("```", $response);

    $answer = implode(",", $arr);

    // $Database->insertChatRoom($question, $answer);

    $fetchChats = $Database->fetchChatRoom();
    while ($row = mysqli_fetch_assoc($fetchChats)) {
        // print_r($row);
        // echo '<p style="overflow-wrap: break-word;" id="questiontext">'.$row["question"].'</p>';
        $test = explode(",", $row["answer"]);
        print_r($test);
    }

    // echo "Record Added";
}

function CURL ($Method, $Curl, $Param, $Header) {
    if ($Method != "GET") {
        curl_setopt($Curl, CURLOPT_POST, true);
    }
    if ($Param != "" || $Param != NULL)
        curl_setopt($Curl, CURLOPT_POSTFIELDS, $Param);
    curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);
    if ($Header != "" || $Header != NULL)
        curl_setopt($Curl, CURLOPT_HTTPHEADER, $Header);
    $Response = curl_exec($Curl);
    curl_close($Curl);
    return $Response;
}


?>