<?php

?>
<form action="" method="POST">
	<!-- Name input -->
  <label class="form-label" for="name">Name</label>
  <input name="name" class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
	
	<hr>
	<br>
	<label class="form-label" for="emailAddress">Email Address</label>
	<input name="email" class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required, email" />
	
	<hr>
	<br>
	<label class="form-label" for="message">Message</label>
	<textarea name="description" class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>

	<hr>
	<br>
	<!-- Form submit button -->
	<div class="d-grid">
		<button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">send</button>
	</div>

</form>