<?php  
require_once("header_title.php");
?>
<!DOCTYPE html> 
<html lang="ua">
<head>
  <meta charset="UTF-8">
  <?php  echo GetTitle($page);?>
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
  <link rel="shortcut icon" href="{{ asset ('favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset ('favicon.ico') }}" type="image/x-icon">
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
            <a href="pages/registration.php">Зареєструватися</a>
          </div>
        </form><!-- <form> -->
      </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
  </div><!-- .modal.fade -->

  <header class="navbar home-navbar">

    <!-- Toolbar -->
    <div class="topbar">
      <div class="container">
        <a href="/" class="site-logo">
          <img src="{{ asset ('img/logo.png') }}">
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
   <nav class="main-navigation @if ($page == "home") home-nav @endif">
    <ul class="menu">
      <li class="menu-item-has-children  @if ($page == "home" or $page == "about") current-menu-item @endif">
      <a class="menu_name">Про АУТС</a>
        <ul class="sub-menu"> 
         <li><a href="/about/department/">Про кафедру</a></li>
         <li><a href="/about/history/">Історія кафедри</a></li>
         <li><a href="/">Педагогічний склад</a></li>
         <li><a href="/">Допоміжний персонал</a></li>
         <li><a href="/about/studlife/">Студентське життя</a></li>
         <li><a href="/about/diplom/">Дипломні роботи</a></li>
         <li><a href="/about/work/">Працевлаштування</a></li>
         <li><a href="/about/practice/">Практика</a></li>              
       </ul>
     </li>
     <li class="menu-item-has-children @if ($page == "incoming")  current-menu-item @endif">
      <a class="menu_name">Вступнику</a>
      <ul class="sub-menu">
        <li><a href="/incoming/1kurs/">Вступ на 1 курс</a></li>
        <li><a href="/incoming/5kurs/">Вступ на 5 курс (магістратура)</a></li>
        <li><a href="/incoming/offDoc/">Офіційні документи</a></li>
        <li><a href="/incoming/studyACTS/">Навчання на АУТС</a></li>
        <li><a href="/incoming/actual_info/">Актуальна інформація для вступника 2017</a></li>
        <li><a href="/incoming/contacts/">Як нас знайти</a></li>
      </ul>
    </li>
    <li @if ($page == "students")  class = "current-menu-item" @endif>
      <a href="/forstudents/">Студентам</a>
    </li>
    <li   @if ($page == "aspirantura")  class = "current-menu-item" @endif>
      <a href="/aspirantura/">Аспірантам</a>
    </li>
    <li @if ($page == "development")  class = "current-menu-item" @endif>
      <a href="/development/">Розробки</a>
    </li>
    <li @if ($page == "science")  class = "current-menu-item" @endif>
      <a href="/science/">Наука</a>
    </li>
    <li @if ($page == "sport")  class = "current-menu-item" @endif>
      <a href="/sport/">Спорт</a>
    </li>
  </ul><!-- .menu -->
</nav><!-- .main-navigation -->
</div><!-- .container --> 
</header>

    