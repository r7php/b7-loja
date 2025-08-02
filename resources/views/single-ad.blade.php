<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Open+Sans:ital@0;1&family=Oswald:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/assets/style.css" />
    <link rel="stylesheet" href="/assets/adPageStyle.css" />
    <title>B7Store</title>
  </head>

  <body>
   <x-base.header/>
    <main>
      <div class="ad-area">
        @livewire('gallery', ['images' => $ad->images])

        <div class="ad-area-right">
          <div class="categories-state">{{$ad->state->name}} / {{$ad->category->name}}</div>
          <div class="ad-page-title" ><label id="titulo">{{$ad->title}}</label></div>
          <div class="ad-page-date">Publicado em {{date('d/m/Y', strtotime($ad->created_at))}}</div>
          <div class="ad-page-price" ><label id="priceProduct">R$ {{number_format($ad->price,2,',','.')}}</label></div>
          <div class="contact">
            <img src="/assets/icons/wppIcon.png" />
            <div class="contact-text">Negociável</div>
          </div>
          <div class="negociable">*Esse valor poderá ser negociado.</div>
          <div class="ad-page-text">
           {{$ad->description}}
          </div>
          <button class="get-touch" id="checkout-button">Comprar agora</button>
          <div class="views">
            <img src="/assets/icons/eyeGrayIcon.png" />
            <div class="views-text">235 pessoas visualizaram este anúncio</div>
          </div>
        </div>
      </div>
      <div class="ads">
        <div class="ads-title">Anúncios relacionados</div>
        <div class="ads-area">
        @foreach ($adsAll as $d)

        <a href="{{route('ad.show',$d->slug) }}">
          <div class="ad-item">
            <div
              class="ad-image"
              style="background-image: url({{$d->images->first()->url}})"
            ></div>
            <div class="ad-title">{{$d->title}}</div>
            <div class="ad-price">{{$d->title}}</div>
          </div>
        </a>
        </a>


        @endforeach
        </div>
      </div>
    </main>
   <x-base.footer/>
  </body>
</html>
  <script>
    document.getElementById('checkout-button').addEventListener('click', async () => {
       let priceProduct = document.getElementById("priceProduct").textContent.trim().replace('R$', '');;
       let numero = parseFloat(priceProduct.replace(/\./g, '').replace(',', '.'));
       let valorFinal = Math.round(numero * 100);
       let nomeProduto = document.getElementById("titulo").textContent.trim();

        const response = await fetch("{{ route('checkout.session') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body:JSON.stringify({
                valorVal:valorFinal,
                nomePro:nomeProduto
            })
        });

        const data = await response.json();
        console.log(data);
        if (data.url) {
            window.location.href = data.url;
        } else {
            alert("Erro ao criar sessão de pagamento");
        }
    });
</script>
