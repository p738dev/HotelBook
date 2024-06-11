<header class="top-header top-header-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-2 pr-0">
                <div class="language-list">
                    <select class="language-list-item">
                        <option>English</option>
                        <option>العربيّة</option>
                        <option>Deutsch</option>
                        <option>Português</option>
                        <option>简体中文</option>
                    </select>	
                </div>
            </div>

            <div class="col-lg-9 col-md-10">
                <div class="header-right">
                    <ul>
                        @auth
                        <li>
                            <i class='bx bxs-user-pin'></i>
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li>
                            <i class='bx bxs-user-rectangle'></i>
                            <a href="{{ route('user.logout') }}">Logout</a>
                        </li>
                        @else
                        <li>
                            <i class='bx bxs-user-pin'></i>
                            <a href="{{ route('login') }}">Log in</a>
                        </li>
                        <li>
                            <i class='bx bxs-user-rectangle'></i>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>