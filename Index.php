<?php require("./Data/connection.php") ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
      minimum-scale="1000px"
    />
    <title>Data Import</title>
    <script
      src="https://code.jquery.com/jquery-3.6.3.js"
      integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./Css/index.css" />
    <script src="./Js/interact.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="nav-bar">
        <div class="toggle-bar">
          <span class="toggle">≡</span>
        </div>
        <div class="menu-contact">
          <div class="menu-bar">
            <a class="menu-interact" href="index.php"><p>HOME</p></a>
            <a class="menu-interact" href="?page=listimport"><p>YOUR IMPORT</p></a>
            <a class="menu-interact" href="?page=import"><p>IMPORT</p></a>
          </div>
          <div class="search-bar">
            <input class="search-input" type="text" placeholder="Search here" />
            <button type="submit" class="search-btn">
              <img src="./Image//search-icon.png" alt="Search icon" />
            </button>
          </div>
          <!-- <div class="user-info">
            
            <?php
              // if(isset($_SESSION['us']) && $_SESSION['us'] != ""){
              //   echo '<a href="?page=logout" class="user-name">Log Out | </a>';
              //   echo '<p class="user-name">' + $_SESSION['us'] + '</p>';
              //   echo '<img
              //     class="user-img"
              //     src="https://th.bing.com/th/id/R.55a3babf5b70191599eba42432ddf9b0?rik=PAQUk9EEB8mrLA&riu=http%3a%2f%2fi.huffpost.com%2fgen%2f927722%2fthumbs%2fo-WINTER-SCENES-facebook.jpg&ehk=rexZIu8QcR12%2fodDmaHyr7HUkp3pea3WDzAkRKtY3IE%3d&risl=&pid=ImgRaw&r=0"
              //     alt="logo"
              //   />';
              // }else{
              //   echo '<a href="?page=login" class="user-name">Log In</a>';
              // }
            ?>
            </div> -->
        </div>
      </div>
      <div class="page-import">
        <!-- page ... -->
        <?php
          if(isset($_GET['page'])){
            $page = $_GET['page'];
            // if($page == "login"){
            //   include_once("loginregis.php");
            // }
            if($page == "listimport"){
              include_once("listimport.php");
            }
            elseif($page == "import"){
              include_once("import.php");
            }
            elseif($page == "error"){
              include_once("error.php");
            }
            // elseif($page == "logout"){
            //   include_once("logout.php");
            // }
          }else{
            include_once("home.php");
          }
        
        ?>
      </div>
      <div class="footer">
        <p class="copyright">&copy;Copyright by Data Import 2023</p>
      </div>
    </div>
  </body>
</html>
