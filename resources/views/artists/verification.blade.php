@include('artists.dashboard')

<div id="yoti"></div>

<!-- This script snippet will also be required in your HTML body -->
<script>
  window.Yoti.Share.init({
    elements: [
      {
        domId: "yoti",
        scenarioId: "81e4a257-5c8e-4023-a425-8c8d25009050",
        clientSdkId: "a134bb6d-b208-42b3-b777-9d1a627c3efd"
      }
    ]
  });
</script>

@include('artists.dashboard_footer')