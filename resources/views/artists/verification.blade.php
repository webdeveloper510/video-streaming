@include('artists.dashboard')

<div id="yoti"></div>

<!-- This script snippet will also be required in your HTML body -->
<script>
  window.Yoti.Share.init({
    elements: [
      {
        domId: "yoti",
        scenarioId: "05f89058-ef91-46eb-9732-0dc812442f09",
        clientSdkId: "3c6b5f75-5e38-44b3-b50d-33e8925adcae"
      }
    ]
  });
</script>

@include('artists.dashboard_footer')