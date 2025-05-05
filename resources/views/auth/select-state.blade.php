<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/loginSignUpStyle.css" />

    <title>B7Store - estado</title>
  </head>

  <body>

    <a href="index.html" class="back-button">← Voltar</a>
    <div class="login-page">
        <form method="POST" action="{{ route('select-states') }}">
            @csrf

      <div class="login-area">
        <h3 class="login-title">B7Store</h3>

            {{-- @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>


            @endif --}}
          <div class="name-area">
            <div class="name-label">estado</div>
              <select >
             @foreach ($state as $states )
                <option value="{{$states->id}}">{{$states->name}}</option>
             @endforeach
              </select>
          </div>



          <button class="login-button">Selecionar</button>


      </div>

    </div>
    </form>
   <x-base.footer/>
  </body>
</html>
