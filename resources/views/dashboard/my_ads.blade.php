<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/myAccountStyle.css" />
    <link rel="stylesheet" href="assets/myAdsStyle.css" />

    <title>B7Store - Meus anúncios</title>
  </head>

  <body>
     <x-base.header/>
    <main>
      <div class="my-ads-page">
        <div class="sidebar">
          <div class="sidebar-top">
            <a href="{{route('my_account')}}" class="config-myAds"
              ><img src="assets/icons/configIconGray.png" /> Configurações</a
            >
            <a href="/myAds.html" class="myAds-button"
              ><img src="assets/icons/layersIcon.png" /> Meus Anúncios</a
            >
          </div>
          <div class="sidebar-bottom">
            <a href="{{route('logout')}}"
              ><img src="assets/icons/logoutIcon.png" /> Sair</a
            >
          </div>
        </div>
        <div class="myAds-area">
          <h3 class="myAds-title">Meus Anúncios</h3>
          @if ($advertise->count()>0)
            <div class="myAds-ads-area">
            @foreach ($advertise as $adv)
                <x-basic-ads :adv="$adv" :edit="false"/>
            @endforeach
         </div>
          @else
            <div class="alert alert-danger">Sem anuncios publicados</div>
          @endif

        </div>
      </div>
    </main>
    <footer>
      <span>powered by B7Web</span>
      <span>B7Store</span>
    </footer>
  </body>
</html>
