<?php 
# Силка на файли css,js
$baseLink = "..";
$page_name = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html> 
<html lang="ua">
<head>
  <meta charset="UTF-8">
  <?php include_once("PageParts/header_title.php"); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="author" content="Dmitry Korzunov">
  <meta name="author" content="Igor Davidenko">
  <base href="html">
  <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" type="text/css">
  <link rel="stylesheet" media="all" href="{{ asset('css/icons.css') }}" type="text/css">
  <link rel="stylesheet" media="all" href="{{ asset('css/waves.css') }}" type="text/css">
  <link rel="stylesheet" media="screen" href="{{ asset ('masterslider/style/masterslider.css') }}"  type="text/css">
  <link rel="stylesheet" media="all" href="{{ asset ('css/normalise.css') }}" type="text/css">
  <link rel="stylesheet" media="all" href="{{ asset ('css/home_page_style.css') }}" type="text/css" >
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="{{ asset ('img/icon.ico') }}">
  <script src="{{ asset ('js/modernizr.custom.js') }}"></script>
  <script src="{{ asset ('js/detectizr.min.js') }}"></script>
</head>
<body>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="modal-content text-center">
        <h4>Увійти</h4>
        <form method="post">
          <input type="email" class="form-control" placeholder="Email or Login" required>
          <input type="password" class="form-control" placeholder="Password" required>
          <div class="form-group">
            <button type="submit" class="btn login-btn btn-default waves-effect waves-light">Увійти на свій аккаунт<i class="icon-head"></i></button>
            <a href="<?php echo $baseLink;?>/pages/registration.php">Зареєструватися</a>
          </div>
        </form><!-- <form> -->
      </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
  </div><!-- .modal.fade -->

  <header class="navbar home-navbar">

    <!-- Toolbar -->
    <div class="topbar">
      <div class="container">
        <a href="<?php echo $baseLink;?>/home.php" class="site-logo">
          <img src="<?php echo $baseLink;?>/img/logo.png">
        </a><!-- .site-logo -->
        <!-- Mobile Menu Toggle -->
        <div class="nav-toggle"><span></span></div>

        <div class="toolbar">
         <a href="#" class="btn btn-sm btn-default btn-icon-right waves-effect waves-light" data-toggle="modal" data-target="#loginModal">Увійти<i class="icon-head"></i></a>
         <div class="search-btn">
          <i class="icon-search"></i>
          <form method="post" class="search-box">
           <input type="text" class="form-control input-sm" placeholder="Пошук">
           <button type="submit"><i class="icon-search"></i></button>
         </form>
       </div><!-- .search-btn -->
     </div><!-- .toolbar -->
   </div><!-- .container -->
 </div><!-- .topbar -->

 <div class="container-fluid">
   <nav class="main-navigation <?php if ($page_name == "home.php" or $page_name == "registration.php") { echo "home-nav"; } ?>">
    <ul class="menu">
      <li class="<?php if($page_name == "home.php" or $page_name == "about.php") { echo "current-menu-item"; } ?> menu-item-has-children">
      <a class="menu_name">Про АУТС</a>
        <ul class="sub-menu"> 
         <li><a href="<?php echo $baseLink;?>/pages/about.php?page=department_info">Про кафедру</a></li>
         <li><a href="<?php echo $baseLink;?>/pages/about.php?page=history">Історія кафедри</a></li>
         <li><a href="/">Педагогічний склад</a></li>
         <li><a href="/">Допоміжний персонал</a></li>
         <li><a href="<?php echo $baseLink;?>/pages/about.php?page=studLife">Студентське життя</a></li>
         <li><a href="<?php echo $baseLink;?>/pages/about.php?page=diplomWorks">Дипломні роботи</a></li>
         <li><a href="<?php echo $baseLink;?>/pages/about.php?page=employment">Працевлаштування</a></li>
         <li><a href="<?php echo $baseLink;?>/pages/about.php?page=practice">Практика</a></li>              
       </ul>
     </li>
     <li class="<?php if($page_name == "incoming.php") { echo "current-menu-item"; } ?> menu-item-has-children">
      <a class="menu_name">Вступнику</a>
      <ul class="sub-menu">
        <li><a href="<?php echo $baseLink;?>/pages/incoming.php?page=1kurs">Вступ на 1 курс</a></li>
        <li><a href="<?php echo $baseLink;?>/pages/incoming.php?page=5kurs">Вступ на 5 курс (магістратура)</a></li>
        <li><a href="<?php echo $baseLink;?>/pages/incoming.php?page=offDoc">Офіційні документи</a></li>
        <li><a href="<?php echo $baseLink;?>/pages/incoming.php?page=learnToActs">Навчання на АУТС</a></li>
        <li><a href="<?php echo $baseLink;?>/pages/incoming.php?page=actualInfo">Актуальна інформація для вступника 2017</a></li>
        <li><a href="<?php echo $baseLink;?>/pages/incoming.php?page=contacts">Як нас знайти</a></li>
      </ul>
    </li>
    <li class = "<?php if($page_name == "forStudents.php") { echo "current-menu-item"; } ?>">
      <a href="<?php echo $baseLink;?>/pages/forStudents.php">Студентам</a>
    </li>
    <li class = "<?php if($page_name == "aspirantura.php") { echo "current-menu-item"; } ?>">
      <a href="<?php echo $baseLink;?>/pages/aspirantura.php">Аспірантам</a>
    </li>
    <li class="<?php if($page_name == "development.php") { echo "current-menu-item"; } ?>">
      <a href="<?php echo $baseLink;?>/pages/development.php">Розробки</a>
    </li>
    <li class="<?php if($page_name == "science.php") { echo "current-menu-item"; } ?>">
      <a href="<?php echo $baseLink;?>/pages/science.php">Наука</a>
    </li>
    <li class="<?php if($page_name == "sport.php") { echo "current-menu-item"; } ?>">
      <a href="<?php echo $baseLink;?>/pages/sport.php">Спорт</a>
    </li>
  </ul><!-- .menu -->
</nav><!-- .main-navigation -->
</div><!-- .container --> 
</header>