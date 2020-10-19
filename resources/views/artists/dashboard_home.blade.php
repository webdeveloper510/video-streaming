@include('artists.dashboard')

<section class="background1">
<div>
           @if(session('success'))
        <div class="alert alert-success">
        {{session('success')}}
        </div>
        @endif
      </div>



</section>


@include('artists.dashboard_footer')