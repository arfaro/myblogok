<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Administrator</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">adm</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class=active><a class="nav-link" href="{{route('home')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Post</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('post.index')}}">List Post</a></li>
                    <li><a class="nav-link" href="{{route('post.del')}}">Post Deleted</a></li>
                </ul>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-paste"></i> <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('category.index')}}">List Category</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tag"></i> <span>Tag</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('tag.index')}}">List Tag</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>User</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('user.index')}}">List User</a></li>
                </ul>
            </li>
    </aside>
</div>