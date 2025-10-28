<form class="jotform-form" onsubmit="return typeof testSubmitFunction !== 'undefined' && testSubmitFunction();" action="https://submit.jotform.com/submit/<?php echo $jotform_id; ?>" method="post" name="form_<?php echo $jotform_id; ?>" id="<?php echo $jotform_id; ?>" accept-charset="utf-8" autocomplete="on"><input type="hidden" name="formID" value="<?php echo $jotform_id; ?>" /><input type="hidden" id="JWTContainer" value="" /><input type="hidden" id="cardinalOrderNumber" value="" /><input type="hidden" id="jsExecutionTracker" name="jsExecutionTracker" value="build-date-<?php echo $jotform_date; ?>" /><input type="hidden" id="submitSource" name="submitSource" value="unknown" /><input type="hidden" id="submitDate" name="submitDate" value="undefined" /><input type="hidden" id="buildDate" name="buildDate" value="<?php echo $jotform_date; ?>" /><input type="hidden" name="uploadServerUrl" value="https://upload.jotform.com/upload" /><input type="hidden" name="eventObserver" value="1" />
  <ul class="jotform-row">
    <li class="jotform-column">
	  <div class="form-label">
		<span class="text-id">Nama</span>
		<span class="text-en">Name</span>
		<span class="text-de">Name</span>
	    <b>*</b>
	  </div>
	  <div class="form-box">
        <input type="text" id="input_3" name="q3_name" data-type="input-textbox" class="form-field form-textbox validate[required]" 
		data-defaultvalue="" data-component="textbox" aria-labelledby="label_3" required="" value="" />
	  </div>
	</li>
  </ul>
  <ul class="jotform-row">
    <li class="jotform-column">
	  <div class="form-label">
		<span class="text-id">Email</span>
		<span class="text-en">Email</span>
		<span class="text-de">Email</span>
	    <b>*</b>
	  </div>
	  <div class="form-box">
  	    <input type="text" id="input_4" name="q4_email" data-type="input-textbox" class="form-field form-textbox validate[required, Email]" 
		data-defaultvalue="" data-component="textbox" aria-labelledby="label_4" required="" value="" />
	  </div>
	</li>
    <li class="jotform-column">
	  <div class="form-label">
		<span class="text-id">Telepon</span>
		<span class="text-en">Phone</span>
		<span class="text-de">Phone</span>
	    <b>*</b>
	  </div>
	  <div class="form-box">
	    <input type="text" id="input_5" name="q5_phone" data-type="input-textbox" class="form-field form-textbox validate[required]" 
		data-defaultvalue="" data-component="textbox" aria-labelledby="label_5" required="" value="" />
	  </div>
	</li>
  </ul>
  <ul class="jotform-row">
    <li class="jotform-column">
	  <div class="form-label">
		<span class="text-id">Pesan</span>
		<span class="text-en">Messages</span>
		<span class="text-de">Messages</span>
	    <b>*</b>
	  </div>
	  <div class="form-box">
  	    <textarea id="input_6" class="form-field form-textarea validate[required]" name="q6_messages" data-component="textarea" required="" aria-labelledby="label_6"></textarea>
	  </div>
	</li>
  </ul>
  <ul class="jotform-row">
    <li class="form-box jotform-column">
  	  <button id="input_2" type="submit" class="btn form-submit-button submit-button jf-form-buttons jsTest-submitField legacy-submit" data-component="button" data-content="">
		<span class="text-id">Kirim</span>
		<span class="text-en">Send</span>
		<span class="text-de">Send</span>
	  </button>
	</li>
  </ul>
  
  <input type="hidden" class="simple_spc" id="simple_spc" name="simple_spc" value="<?php echo $jotform_id; ?>" />
  <script type="text/javascript">
    var all_spc = document.querySelectorAll("form[id='".$jotform_id."'] .si" + "mple" + "_spc");
    for (var i = 0; i < all_spc.length; i++)
    {
      all_spc[i].value = "".$jotform_id."-".$jotform_id."";
    }
  </script>
</form>