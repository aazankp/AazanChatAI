<?php

require_once "Database.php";

$Database = new Database();

session_start();

$AIKey = "";

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

    // $response = $Response['choices'][0]['message']['content'];

    // $arr = explode("```", $response);

    // $answer = json_encode($arr);

    // $Database->insertChatRoom($question, $answer);

    $fetchChats = $Database->fetchChatRoom();

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
        echo '</div>
        </div>';
    }

    // echo "Record Added";
}

else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "login")
{
    // print_r($_REQUEST);
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["pass"];
    $password = md5($pass);
    $result = $Database->fetchUser($email, $password);
    if ($result && mysqli_num_rows($result) > 0)
    {
        $user_info = ["email" => $email, "password" => $password];
        $_SESSION["user_info"] = $user_info;
        if ($_SESSION["user_info"]) 
        {
            echo "1";
            $encodedData = base64_encode(json_encode($user_info));
        }
        // $test = json_decode(base64_decode($encodedData), true);
        // $_SESSION[""]
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
    print_r($_REQUEST);
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