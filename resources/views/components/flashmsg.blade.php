@if (session()->has('message'))
    <div x-data="{show : true}" x-init="setTimeout(() => show = false, 1500)" x-show="show"><p>{{ session('message'); }}</p></div>
@endif