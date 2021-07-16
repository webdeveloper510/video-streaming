@include('layout.cdn')
<header>
   <div class="text-center">
      <a href="{{/}}"><img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand"></a>
      
      <h1 class="text-white mt-2">Onboarding </h1>
   </div>
</header>
<div id="yoti"></div>

<!-- This script snippet will also be required in your HTML body -->
<script>
  window.Yoti.Share.init({
    elements: [
      {
        domId: "yoti",
        scenarioId: "90cea372-70dc-4cbe-b7d8-07bebda19fed",
        clientSdkId: "1acff0c8-7717-4515-9b84-c3ebad3ea382"
      }
    ]
  });
</script>    
       <style>
         body{
           background:#fca7b3;
         }
                 header {
   background: #7b0000;
   padding: 11px;
   }
   </style>
@include('artists.dashboard_footer')