<div class="">
  <form class="form-horizontal" id="maincontactform">


  <div class="row">
    <div class="col-md-12">
      <h4><strong>Please note: all our apartments operate a 3 night minimum stay.</strong></h4>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <!-- Text input-->

      <div class="control-group">               
        <div class="controls">                  
          <input type="text" class="form-control" id="contactname" name="contactname" placeholder="your name *">
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
       <div class="controls">                  
          <input type="text" class="form-control" id="contactemail" name="contactemail" placeholder="your email *">
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">               
        <div class="controls">                  
          <input type="text" class="form-control" id="contactnumber" name="contactnumber" placeholder="your phone number *">
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">               
        <div class="controls">                  
          <input type="text" class="form-control" id="contactdestination" name="contactdestination" placeholder="destination *">
        </div>
      </div>

      

    </div>

    <div class="col-md-6">
      <!-- Text input-->
      <div class="control-group">               
        <div class="controls" id="contact-arrival">                  
          <input type="text" value="" class="form-control" id="contactarrival" name="contactarrival" placeholder="arrival date *">
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group" id="contact-departure">               
        <div class="controls">                  
          <input type="text" value="" class="form-control" id="contactleaving" name="contactleaving" placeholder="departure *">
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">                
        <div class="controls">
          <input type="text" class="form-control" id="contactnoofguests" name="contactnoofguests" placeholder="no of guests *">
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">               
        <div class="controls">
          <input type="text" class="form-control" id="contactnoofnights" name="contactnoofnights" placeholder="no of nights">
        </div>
      </div>

     

      <!-- this is a hidden field that you wont see on the form but is very important in the 
      next section when we talk about load time. this is the basis of our anti-spam method -->
      <input type="hidden" id="contacthidden" name="loadtime" value="" />

    </div>
  </div>

  <div class="row">
    <div class="col-md-12">

      <!-- Button -->
      <div class="control-group">                
        <div class="controls">
          <input id="maincontact" class="btn btn-primary" value="submit" name="submit">
        </div>
      </div>

    </div>
  </div>

</form>
<div class="row success">
  <div class="col-md-12">
    <h4><strong>Thank you, your form has been submitted and one of our reservations team will be in touch with you shortly.</strong></h4>
  </div>
</div>
<div style="display:none;" class="row error">
  <div class="col-md-12">
    <p>Ooops, please ensure that you fill out all the required fields. Thanks</p>
  </div>
</div>

</div>
