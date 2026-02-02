<?php if (isset($_GET['success'])): ?>
  <div class="notif-success content-center">
    <div class="notif-success-box">
      Submission successful
    </div>
  </div>
  <script>
	$(document).ready(function() {
      $(".notif-success").delay(3000).slideUp(500, function(){
        $(this).remove();
      });
	});
  </script>
<?php endif; ?>