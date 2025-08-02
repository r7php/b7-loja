<style>
    .my-ad-item {
        position: relative;
    }

    .pill {
        padding: 5px 10px;
        background-color: teal;
        color: white;
        border-radius: 5px;
    }

    .my-ad-pill {
        position: absolute;
        top: 5px;
        right: 5px;
        font-size: 10px;
    }
</style>

<div class="my-ad-item">

   @if (request()->url() == url('/home') and $adv->id == Auth::user()->id)

             <span class="pill my-ad-pill">Meu anúncio</span>


    @endif

    <div class="ad-image-area">
        @if (request()->url()== url('/my_ads') )
            <div class="ad-buttons">
                <a href="{{route('delete',['id'=>$adv->id])}}" class="ad-button">
                    <img src="assets/icons/deleteIcon.png" alt="Deletar" />
                </a>
                <div class="ad-button">
                    <img src="assets/icons/editIcon.png" alt="Editar" />
                </div>
            </div>
        @endif

        <div
            class="ad-image"
            style="background-image: url('{{ $adv->images[0]->url ?? 'https://www.shutterstock.com/image-vector/img-vector-icon-design-on-260nw-2164648583.jpg' }}');"
        ></div>
    </div>
     <a href="{{route('ad.show',['slug'=>$adv->slug])  }}">
    <div class="ad-title">{{ $adv->title }}</div>
    <div class="ad-price">{{ number_format($adv->price, 2, ',', '.') }}</div>
     </a>
</div>
