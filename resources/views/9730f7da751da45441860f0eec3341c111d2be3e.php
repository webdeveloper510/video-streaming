<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/verification.blade.php ENDPATH**/ ?>