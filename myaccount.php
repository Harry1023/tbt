<!DOCTYPE html>
<head>

<?php include "head.php"; ?>

</head>


<body>
<div class="modal is-active">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modify Account</p>
    </header>
    <section class="modal-card-body">
    <?php if(isset($_GET['success'])) {echo "<div class='notification'>Your updates were applied to the account.</div>";} else if(isset($_GET['fail'])) {echo "<div class='notification is-danger'>Your updates were not applied, try again!</div>";}; ?>
    
     
     
     <form method="post">
     <div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input class="input" name="fieldName" type="text" placeholder="e.g Alex Smith">
  </div>
</div>
 
<div class="columns">

<div class="column is-half">
 <div class="field">
  <label class="label">Phone No</label>
  <div class="control">
    <input class="input" name="fieldPhone" inputmode="numeric" type="phone" placeholder="+1 (641) 480 72921">
  </div>
</div> 
</div>

<div class="column is-half">
<fieldset disabled>
 <div class="field">
  <label class="label">Email Address</label>
  <div class="control">
    <input class="input" type="email" value="<?php echo $_SESSION['email']; ?>">
  </div>
</div> 
</fieldset>
</div>


</div>


<div class="field">
  <label class="label">Street Address</label>
  <div class="control">
    <input class="input" type="text" placeholder="Enter Street Address">
  </div>
</div>  
 
     
<div class="field">
  <label class="label">Password</label>
  <div class="control">
    <input class="input" minlength="8" name="fieldPass" type="password" placeholder="Enter a Strong Password">
  </div>
</div>     
  
     
     
     
     
    </section>
    <footer class="modal-card-foot">
      <div class="buttons">
        <button name="confirmButton" class="button is-success" type="submit">Save changes</button>
        <button class="button" type="reset">Cancel</button>
      </div>
    </footer></form>
  </div>
</div>



</body>
</html>