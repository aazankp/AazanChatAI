<?php
date_default_timezone_set('Asia/Karachi');
session_start();
require_once "Database.php";

$Database = new Database();

$email = $_SESSION["user_info"]["email"];
$password = $_SESSION["user_info"]["password"];
$UserId = $_SESSION["user_info"]["userId"];

$user = $Database->fetchUser($email, $password);
$user = mysqli_fetch_assoc($user);


$AIKey = "";

if (isset($_REQUEST["Question"])) {
    $question = $_REQUEST["Question"];
    $NewchatId = $_COOKIE["chatId"];
    
    $result = $Database->fetchChat($UserId);
    $row = mysqli_fetch_assoc($result);

    $chatId = "";

    if (mysqli_num_rows($result) < 1)
    {
        $chatId = "1";
        $AddedBy = $UserId;
        $Database->insertChat($question, $AddedBy);
    } else {
        $chatId = $row["chatId"];
        $AddedBy = $row["addedBy"];
        if ($row["chatId"] != $NewchatId)
        {
            $Database->insertChat($question, $AddedBy);
        }
    }
    
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

    // print_r($Response);
    // die;

    // $response = $Response['choices'][0]['message']['content'];

    // $arr = explode("```", $response);

    // $answer = json_encode($arr);
    // $answer = "Good JOB!";

    // $Database->insertChatRoom($chatId, $question, $answer);

    $fetchChats = $Database->fetchChatRoom($chatId);

    fetch_Chats ($fetchChats);

    // echo "Record Added";
}

else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "login")
{
    // print_r($_REQUEST);
    // die;
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["pass"];
    $password = md5($pass);
    $result = $Database->fetchUser($email, $password);
    $row = mysqli_fetch_assoc($result);
    if ($result && mysqli_num_rows($result) > 0)
    {
        
        $user_info = ["userId" => $row["id"], "email" => $row["email"], "password" => $row["password"]];
        $encodedData = base64_encode(json_encode($user_info));
        setcookie("AICookie", $encodedData, time() + 86400, "/");
        $_SESSION["user_info"] = $user_info;
        if ($_SESSION["user_info"]) 
        {
            echo "1";
        }
    } else {
        echo "error";
    }
}

else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "signup")
{
    $fullName = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["password"];
    $cnf_pass = $_REQUEST["confirm_password"];

    $Dir = "../assets/profiles";
    $img_name = $Dir."/".rand(0000, 9999) . "_" . $_FILES["profile"]['name'];
    $img_tmp_name = $_FILES["profile"]['tmp_name'];

    if ($fullName != "" && $email != "" && $pass != "" && $cnf_pass != "" && $_FILES["profile"]['name'] != "")
    {
        if ($pass == $cnf_pass)
        {
            $password = md5($pass);
            if (!is_dir($Dir)) mkdir($Dir);
            move_uploaded_file($img_tmp_name, $img_name);
            $result = $Database->insertUsers($img_name, $fullName, $email, $password);
            if ($result == 1) {
                echo "1";
            } else {
                echo "0";
            }
        } else{
            echo "error";
        }
    } else {
        echo "pic";
    }
}

else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "newChat")
{
    $addedBy = $user["id"];
    $NewChatId = $_REQUEST["NewChatId"];
    setcookie("chatId", $NewChatId, time() + 86400, "/");

    echo '<div class="logofront">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 d-flex justify-content-center">
                <img src="assets/images/logo.png" style="width: 75px; height: 70px; border-radius: 50%;">
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3"></div>
            <div class="col-md-6 d-flex justify-content-center">
                <span class="fw-bold h5">How can I help you today?</span>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>';

}

else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "chatFetch")
{
    // print_r($_REQUEST);
    $fetchChats = $Database->fetchChatRoom($_REQUEST["chatId"]);
    fetch_Chats ($fetchChats);

}

else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "liHistory")
{
    $result = $Database->fetchChat($_SESSION["user_info"]["userId"]);
    $LastChat = null;
    $datalinks = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $datalinks .= '<li>
                <a style="height: 35px;">
                    <button type="button" class="ChatID" value="'.$row["chatId"].'">
                    <span class="links_name questiontext">'.$row["chatName"].'</span>
                    </button>
                </a>
            </li>';
        if(mysqli_num_rows($result) == $row["chatId"]) $LastChat = $row["chatId"];
    }

    $NewChat = "";
    if (mysqli_num_rows($result) < 1)
    {
        $NewChat = 1;
    } else {
        $NewChat = $LastChat+1;
    }

    echo json_encode(["newChatId" => $NewChat,"liCode" => $datalinks ]);

}

function fetch_Chats ($fetchChats)
{
    if (mysqli_num_rows($fetchChats) > 0) {
        while ($row = mysqli_fetch_assoc($fetchChats)) {
            $test = json_decode($row["answer"],true);
            foreach ($test as $key => $value) {
                    $ques = '<div id="profile">
                        <div class="row g-0">
                            <div class="col-md-1">
                                <img src="" class="img-fluid" style="width: 40px; border-radius: 50%; height: 28px;">
                            </div>
                            <div class="col-md-11">
                                <span class="card-title h6" style="line-height: 1.1;">You</span> <br>
                                <p style="overflow-wrap: break-word;" class="mt-2">'.$row["question"].'</p>
                            </div>
                        </div>
                    </div>';
                if ($key == 0) {
                    echo $ques;
                    echo '<div class="row g-0 mt-4">
                            <div class="col-md-1">
                                <img src="assets/images/logo.png" class="img-fluid" style="width: 40px; border-radius: 50%; height: 28px;">
                            </div>
                            <div class="col-md-11 mb-4">
                                <span class="card-title h6" style="line-height: 1.1;">ChatAI</span> <br>
                                <p style="overflow-wrap: break-word;" class="mt-2 mb-4">'.$value.'</p>';
                }
                if ($key == 1) {
                    echo '<pre style="background: black; color: white; padding: 15px; border-radius: 10px;">'.$value.'</pre>';
                }
                if ($key == 2) {
                    echo '<p style="overflow-wrap: break-word;">'.$value.'</p>';
                }
            }
            echo '<div class="row" style="height: 80px;"></div>
                </div>
            </div>';
        }  
    }
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