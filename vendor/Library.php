<?php
include_once("Database.php");
$Database = new Database;
// session_start();
$result = $Database->fetchChat($_SESSION["user_info"]["userId"]);
$datalinks = "";
while ($row = mysqli_fetch_assoc($result)) {
  $datalinks .= '<li>
                  <a style="height: 35px;">
                    <button type="button" class="ChatID" value="'.$row["chatId"].'">
                      <span class="links_name questiontext">'.$row["chatName"].'</span>
                    </button>
                  </a>
                </li>';
}

class Library
{
  public function Header($title)
  {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <title>
        <?php echo $title; ?>
      </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" type="image/png" href="assets/images/logo.png"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.min.css" rel="stylesheet">
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" type="text/css" href="assets/css/Style.css">
      <link rel="stylesheet" type="text/css" href="assets/css/SideBar.css">
    </head>
    <body>
      <?php
  }

  public function Sidebar()
  {
    global $datalinks;
    global $Database;
    $result = $Database->fetchChat($_SESSION["user_info"]["userId"]);
    $row = mysqli_fetch_assoc($result);
    $NewChat = "";
    if (mysqli_num_rows($result) < 1)
    {
      $NewChat = 1;
    } else {
      $NewChat = $row["chatId"]+1;
    }
    ?>
      <div class="sidebar open">
        <div class="logo-details">
          <div class="logo_name">AazanChatAI</div>
          <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
          <li>
            <a>
              <i class='bx bxs-edit'></i>
              <button type="button" id="newChat" value="<?php echo $NewChat; ?>">
                <span class="links_name">New Chat</span>
              </button>
            </a>
            <span class="tooltip">New Chat</span>
          </li>
          <div id="liHistory">
            <?php echo $datalinks;?>
          </div>
        </ul>
        <div class="logo-details">
          <div class="logo_name">AazanChatAI</div>
          <i class='bx bx-menu' id="btn"></i>
        </div>
      </div>
    <?php
  }

  public function Footer()
  {
    ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.all.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="assets/js/Custom.js"></script>
      <script src="assets/js/sidebar.js"></script>
    </body>

    </html>
    <?php
  }
}




?>