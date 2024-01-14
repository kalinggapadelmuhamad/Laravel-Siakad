<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Backend Siakad</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item  {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item  {{ $type_menu === 'users' ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link"><i
                        class="fas fa-user-group"></i><span>Users</span></a>
            </li>
            <li class="nav-item  {{ $type_menu === 'subjects' ? 'active' : '' }}">
                <a href="{{ route('subject.index') }}" class="nav-link"><i
                        class="fas fa-user-group"></i><span>Subjects</span></a>
            </li>
            <li class="nav-item  {{ $type_menu === 'schedules' ? 'active' : '' }}">
                <a href="{{ route('schedule.index') }}" class="nav-link"><i
                        class="fas fa-user-group"></i><span>Schedules</span></a>
            </li>
        </ul>
    </aside>
</div>
