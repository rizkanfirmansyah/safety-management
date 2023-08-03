<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="{{asset('assets/img/dirgantara.png')}}" style="filter: brightness(1) grayscale(1) invert();" alt="" />
        </div>
        <span class="logo_name">SAFETY <a href="" class="warna">MANAGEMENT</a> </span>
    </div>
    <div class="menu-items">
        <ul class="nav-link">
            <li>
                <a href="/dashboard">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a>
            </li>
            @if (Auth()->user()->role_id == 1 || Auth()->user()->role_id == 2  )
            <li>
                <a href="/safeties">
                    <i class="uil uil-file-edit-alt logo"></i>
                    <span class="link-name">Def Safety</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->role_id != 2)
            <li>
                <a href="/reporter">
                    <i class="uil uil-file-edit-alt logo"></i>
                    <span class="link-name">Reporter</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->role_id === 1)
                <li>
                    <a href="/users">
                        <i class="uil uil-user"></i>
                        <span class="link-name">Otoritas User</span>
                    </a>
                </li>
                <li>
                    <a href="/roles">
                        <i class="uil uil-chat-bubble-user"></i>
                        <span class="link-name">Role</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="/organitations">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Organisasi</span>
                </a>
            </li>
        </ul>

        <ul class="logout-mod">
            <li>
                <a href="/logout">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout!</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
