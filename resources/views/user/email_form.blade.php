{!! Form::open(array('url'=> url('/email'), 'class'=>'form-horizontal')) !!}
<fieldset>

<!-- Form Name -->
<h2 class="text-left">ANY QUERIES?</h2>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Name">Name</label>  
  <div class="col-md-10">
  <input id="Name" name="name" placeholder="Your Name" class="form-control input-md" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Email">Email</label>  
  <div class="col-md-10">
  <input id="Email" name="email" placeholder="Your Email Address" class="form-control input-md" required type="email">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Subject">Subject</label>
  <div class="col-md-10">
    <select id="Subject" name="subject" class="form-control">
      <option value="Business Enquiry">Business Enquiry</option>
      <option value="General Question">General Questions</option>
      <option value="Feedback/Comments">Feedback/Comments</option>
      <option value="Employment Enquiry">Employment Enquiry</option>
      <option value="Other">Other</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Message">Message</label>
  <div class="col-md-10">                     
    <textarea class="form-control" id="Message" name="message">How can we help you?</textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Send">Send</label>
  <div class="col-md-4">
    <button id="Send" name="Send" class="btn btn-info">Send</button>
  </div>
</div>

</fieldset>
{!! Form::close() !!}
