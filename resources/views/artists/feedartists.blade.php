@include('artists.dashboard')

<div id="content-row">

<div class="form-group">
  
  <div class="col-sm-12">
    <textarea class="form-control" id="code_preview0" name="" style="height: 300px;"></textarea>
  </div>
</div>
</div>
<?php //$content_row++; ?>
</div>
<!-- Page - Content End -->
</div>

<script type="text/javascript">
$(document).ready(function() {
$('#code_preview0').summernote({height: 300});
});
</script>
<script>
var content_row = 1;

function addContent() {
  html = '<div id="content-row">';
  html += '<div class="form-group">';
 
  html += '<div class="col-sm-12">';
  html += '<textarea class="form-control" id="code_preview' + content_row + '" name="page_code[' + content_row + '][code]" style="height: 300px;"></textarea>';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  $('#content-row').append(html);
  $('#code_preview' + content_row).summernote({height: 300});

  content_row++;
}
</script>
<style>
.note-editor {
  margin-bottom: 5rem !important;
}
</style>
@include('artists.dashboard_footer')