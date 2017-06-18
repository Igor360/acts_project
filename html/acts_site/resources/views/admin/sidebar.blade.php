 <ul class="nav nav-sidebar"> 

        <li {{ $page == "home"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/admin/"><i class="fa fa-home"></i> Головна</a></li>
        <li {{ $page == "Add"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/admin/add/"><i class="fa fa-plus"></i>Додати користувача</a></li>
        <li {{ $page == "articles"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/admin/articles/"><i class="fa fa-newspaper-o"></i>
        Статті</a></li>
        <li {{ $page == "addarticles"? 'class = sidebar-select' : "" }}><a class="btn-icon-left" href="/admin/articles/add/"><i class="fa fa-pencil-square-o"></i> Додати статтю</a></li>
    </ul>  