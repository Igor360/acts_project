 <ul class="nav nav-sidebar"> 
        <li {{ $page == "home"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/admin/"><i class="fa fa-home"></i> @lang('admin.sidebar_main')</a></li>
        <li {{ $page == "Add"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/admin/add/"><i class="fa fa-plus"></i> @lang('admin.sidebar_add_user')</a></li>
        <li {{ $page == "articles"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/admin/articles/"><i class="fa fa-newspaper-o"></i>
        @lang('admin.sidebar_article')</a></li>
        <li {{ $page == "addarticles"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/admin/articles/add/"><i class="fa fa-pencil-square-o"></i> @lang('admin.sidebar_add_article')</a></li>
    </ul>  