<?php
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
    ?>
      <div class="sidebar open">
        <div class="logo-details">
          <div class="logo_name">AazanChatAI</div>
          <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
          <li>
            <a href="#" id="newChat">
              <i class='bx bxs-edit'></i>
              <span class="links_name">New Chat</span>
            </a>
            <span class="tooltip">New Chat</span>
          </li>
        </ul>
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
    </body>

    </html>
    <?php
  }
}




?>