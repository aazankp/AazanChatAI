<?php
session_start();
if (!isset($_SESSION["user_info"])) {
    if (!isset($_SESSION['user_info']) || $_SESSION['user_info'] == "") {
        header("location: login/index.php");
    }
} else{
    if (!isset($_COOKIE['AICookie']) || $_COOKIE['AICookie'] == null) {
        header("location: login/index.php");
    }
}
// if ((!isset($_SESSION["user_info"]) || $_SESSION["user_info"] == "") || (!isset($_COOKIE["AiCookie"])) || $_COOKIE["AiCookie"] == null) echo "ok";
require_once "vendor/Library.php";

$objLibrary = new Library();

$objLibrary->Header("ChatAI");
$objLibrary->Sidebar();
?>

<section id="section">
    <div id="Body_Content">
        <div class="text fw-bold">ChatAI <small>3.5</small></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-md-6 col-md-3">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div id="mainContent">
                                <div class="logofront">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row input-row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <form method="POST" id="QuestionForm">
                                <div class="input-group">
                                    <input type="text" name="question" id="Question" class="form-control" placeholder="Message ChatAI..." style="height: 57px;">
                                    <div class="input-group-text">
                                        <button type="submit" id="submit" name="sub" style="border: none; background: none;"><i class="bi bi-send"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php


$objLibrary->Footer();


?>