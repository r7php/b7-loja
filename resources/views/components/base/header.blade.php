<header>
    <div class="header-area">
      <a href="" class="header-area-left">B7Store</a>
      <div class="header-area-right">
        @if (Auth::check())
        <a href="myAccount.html" style="color:black" class="my-account-mobile">
            <img src="assets/icons/userIcon.png" alt="Ícone do usuário" />
            Minha Conta - {{Auth::user()->name}}
          </a>
        @else

        <a href="{{route('login')}}" class="my-account-mobile">
            <img src="assets/icons/userIcon.png" alt="Ícone do usuário" />
           <p style="color: black"> login</p>
          </a>

        @endif
        <a href="" class="announce-now">Anunciar agora →</a>
        <img class="menu-icon" src="assets/icons/menuIcon.png" alt="Menu" />
        <div class="menu-mobile">

          <a class="my-account-mobile" href="/index.html"
            ><img src="assets/icons/logoutIcon.png" /> Sair</a
          >
        </div>
      </div>
    </div>
  </header>
