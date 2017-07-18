 <ul class="nav nav-sidebar"> 

        <li {{ $page == "home"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/user/"><i class="fa fa-home"></i> @lang('user.sidebar_main')</a></li>
        <li {{ $page == "user"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/user/changeuser/"><i class="fa fa-pencil"></i> @lang('user.sidebar_change_user_data')</a></li>
        <li {{ $page == "teacher"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/user/changeteacher/"><i class="fa fa-pencil-square-o"></i> @lang('user.sidebar_change_teacher_data')</a></li>
        <li {{ $page == "links"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/user/changelink/"><i class="fa fa-external-link"></i> @lang('user.sidebar_change_links')</a></li>
        <li {{ $page == "publications"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/user/changepublications/"><i class="fa fa-file-text-o"></i> @lang('user.sidebar_change_publications')</a></li>
        <li {{ $page == "conference"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/user/changeconference/"><i class="fa fa-list-alt"></i> @lang('user.sidebar_change_conference')</a></li>
        @if (isset($user))
        @if ($user->hasmasters)
        <li {{ $page == "master"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/user/masterdocs/"><i class="fa fa-file"></i> @lang('user.sidebar_change_master_works')</a></li>
        @endif
        @endif
        <!-- <li style=""><a class="btn-icon-left" href="/"><i class="fa fa-send-o"></i> Чат</a></li>-->
 </ul>  