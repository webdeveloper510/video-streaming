@include('artists.dashboard')

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

@include('artists.dashboard_footer')