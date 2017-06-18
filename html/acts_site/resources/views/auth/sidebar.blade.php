 <ul class="nav nav-sidebar"> 

        <li {{ $page == "home"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/home/"><i class="fa fa-home"></i> Головна</a></li>
        <li {{ $page == "user"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/home/changeuser/"><i class="fa fa-pencil"></i> Змінити дані користувача</a></li>
        <li {{ $page == "teacher"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/home/changeteacher/"><i class="fa fa-pencil-square-o"></i> Змінити анкету</a></li>
        <li {{ $page == "links"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/home/changelink/"><i class="fa fa-external-link"></i> Змінити посилання</a></li>
        <li {{ $page == "publications"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/home/changepublications/"><i class="fa fa-file-text-o"></i> Змінити публікації</a></li>
        <li {{ $page == "conference"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/home/changeconference/"><i class="fa fa-list-alt"></i> Змінити конференції</a></li>
        @if (isset($user))
        @if ($user->hasmasters)
        <li {{ $page == "master"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/home/masterdocs/"><i class="fa fa-file"></i> Етюди магістрiв</a></li>
        @endif
        @endif
        <!-- <li style=""><a class="btn-icon-left" href="/"><i class="fa fa-send-o"></i> Чат</a></li>-->
    </ul>  