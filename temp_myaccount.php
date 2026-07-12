<!DOCTYPE html>
<head>

<?php include "head.php"; ?>

</head>


<body>


<div class="columns">

<?php include "aside.php"; ?>

<div class="column">


<?php include "nav.php"; ?>


<br>
<div class="container is-fluid">


<div class="columns">
<div class="column is-half is-align-content-center" style="">

<div class="box">
  <div class="tag">Profile</div>
<div class="is-flex mt-2">
<figure class="image is-48x48 is-left">
  <img class="is-rounded" src="https://bulma.io/assets/images/placeholders/128x128.png" />
</figure>
<div class="is-right ml-4">
 
<p><strong>Muhammad Harris</strong></p>
<small>sensorsoffline@gmail.com</small></div>

</div>


<br>
<div class="table-container">
  <table class="table is-fullwidth">
    <tr><td><small>Phone</small></td><td><small>+923161075498</small></td></tr>
    <tr><td><small>Occupation</small></td><td><small>Commercial Director</small></td></tr>
    <tr><td><small>Address</small></td><td><small>House R143, Block A, Bagh E Malir, Karachi</small></td></tr>
    <tr><td><small>Password</small></td><td><small><div class="tag">Last Updated 23/04/2026</div></small></td></tr>

  </table>
</div>
</div>

</div>

<div class="column">




  
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
  
     
     
<div class="field">
  <label class="label">Occupation</label>
  <div class="control">
    <input class="input" type="text" placeholder="e.g IT Support">
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


</div>



</div> <!-- Single Column End --->
</div>



</body>
</html>