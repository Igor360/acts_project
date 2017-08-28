<!DOCTYPE html>
<html lang="ua">
<head>
  <meta charset="UTF-8">
  <?php  echo \App\Pages::GetTitle($page);?>
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
  @if ($page == "teachstaff" or $page == 'otherpersonal' or $page == 'about_teacher')
  <link rel="stylesheet" media="all" href="{{ asset ('css/teacher.css') }}">
  @endif
  <link rel="shortcut icon" href="{{ asset ('favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset ('favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset ('img/icon.ico') }}">
  <link rel="stylesheet" media="all" href="{{ asset ('css/animate.css') }}">
  <link rel="stylesheet" media="all" href="{{ asset ('css/csspin-balls.css') }}"  type="text/css">
  <script src="{{ asset ('js/modernizr.custom.js') }}"></script>
  <script src="{{ asset ('js/detectizr.min.js') }}"></script>
</head>
<body>



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
        <a href="/lang/en/" class="btn-default btn-sm" style="margin-right: 8px;">en</a>
        <a href="/lang/ua/" class="btn-default btn-sm">ua</a>
          @if (Auth::guest())
                          <a href="{{ route('login') }}" class="btn btn-sm btn-default btn-icon-left"><i class="fa fa-sign-in"></i>@lang('header.login')</a>
                        @else
                          <a href="/user/" class="btn btn-sm btn-default btn-icon-left"><i class="icon-head"></i> {{ Auth::user()->username }}</a>
                          <a href="{{ route('logout') }}" class="btn btn-sm btn-default btn-icon-left" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>@lang('header.logout')</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 {{ csrf_field() }}
                          </form>
                        @endif
         <div class="search-btn">
          <i class="icon-search"></i>
          <div class="search-box">
            <form action="{{ route('search_article') }}" method="GET">
           <input type="text" class="form-control input-sm" placeholder="@lang('header.search_input')" name = 'search_data'>
           <button type="submit"><i class="icon-search"></i></button>
           </form>
         </div>
       </div><!-- .search-btn -->
     </div><!-- .toolbar -->
   </div><!-- .container -->
 </div><!-- .topbar -->

 <div class="container-fluid">
   <nav class="main-navigation @if ($page == "home") home-nav @endif">
    <ul class="menu">
      <li class="menu-item-has-children  @if ($page == "home" or $page == "about" or $page == 'teachstaff') current-menu-item @endif">
      <a class="menu_name">@lang('header.about')</a>
        <ul class="sub-menu">
         <li><a href="/about/department/">@lang('header.aboutdepartment')</a></li>
         <li><a href="/about/history/">@lang('header.historydepartment')</a></li>
         <li><a href="/teachstaff/">@lang('header.teachstaff')</a></li>
         <li><a href="/otherpersonal/">@lang('header.otherpersonal')</a></li>
         <li><a href="/about/studlife/">@lang('header.studLife')</a></li>
         <li><a href="/about/diplom/">@lang('header.diplomworks')</a></li>
         <li><a href="/about/work/">@lang('header.work')</a></li>
         <li><a href="/about/practice/">@lang('header.practice')</a></li>
       </ul>
     </li>
     <li class="menu-item-has-children @if ($page == "incoming")  current-menu-item @endif">
      <a class="menu_name">@lang('header.incoming')</a>
      <ul class="sub-menu">
        <li><a href="/incoming/1kurs/">@lang('header.incoming_first_kurs')</a></li>
        <li><a href="/incoming/5kurs/">@lang('header.incoming_fifth_kurs')</a></li>
        <li><a href="/incoming/offDoc/">@lang('header.incoming_offDoc')</a></li>
        <li><a href="/incoming/studyACTS/">@lang('header.incoming_studyACTS')</a></li>
        <li><a href="/incoming/actual_info/">@lang('header.incoming_actual_info')</a></li>
        <li><a href="/incoming/contacts/">@lang('header.incoming_contacts')</a></li>
      </ul>
    </li>
    <li @if ($page == "students")  class = "current-menu-item" @endif>
      <a href="/forstudents/">@lang('header.forStudents')</a>
    </li>
    <li   @if ($page == "aspirantura")  class = "current-menu-item" @endif>
      <a href="/aspirantura/">@lang('header.aspirantura')</a>
    </li>
    <li @if ($page == "development")  class = "current-menu-item" @endif>
      <a href="/development/">@lang('header.development')</a>
    </li>
    <li @if ($page == "science")  class = "current-menu-item" @endif>
      <a href="/science/">@lang('header.science')</a>
    </li>
    <li @if ($page == "sport")  class = "current-menu-item" @endif>
      <a href="/sport/">@lang('header.sport')</a>
    </li>
  </ul><!-- .menu -->
</nav><!-- .main-navigation -->
</div><!-- .container -->
</header>
