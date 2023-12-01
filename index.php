<?php
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
                                
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <form method="POST" id="QuestionForm">
                                <div class="input-group">
                                    <input type="text" name="question" id="Question" class="form-control" placeholder="Message ChatAI...">
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