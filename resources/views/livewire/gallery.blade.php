 <div class="ad-area-left">
          <div
            class="main-photo"
            style="background-image: url('{{$featureUrl}}')"
          ></div>

          <div class="secundary-photos">
            @foreach ($images as $img)
            @if ($img->url != null)
                 <div wire:click="featured('{{$img->url}}') "
                        class="main-photo"
                        style="background-image: url('{{$img->url}}')"></div>
            @endif

          @endforeach
          </div>
        </div>
