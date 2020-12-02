@include('layouts.header')

<div class="container mt-5">
<h2>Playlist</h2>

<ol>
@foreach($listname as $val)
<li>{{$val->playlistname}}</li>
@endforeach

</ol>
</div>


@include('layouts.footer')