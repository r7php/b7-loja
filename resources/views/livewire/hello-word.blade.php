<div>
   name:{{ $name }}<br>
   <input type="text" wire:model.live="name"/><br>
   <select>
   @foreach ($op as $as)

        <option value="{{ $as }}">{{ $as }}</option>


   @endforeach


   <select>
</div>
