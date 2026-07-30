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
  <img class="is-rounded" src="<?php echo $_SESSION['pfp']; ?>" />
</figure>
<div class="is-right ml-4">
 
<p><strong><?php echo $_SESSION['name']; ?></strong></p>
<small><?php echo $_SESSION['email']; ?></small></div>

</div>


<br>
<div class="table-container">
  <table class="table is-fullwidth">
    <tbody hx-get="api/users.php?id=<?php echo $_SESSION['id']; ?>" hx-trigger="load, every 2s" hx-swap="innerHTML"></tbody>
  </table>
</div>
</div>

</div>

<div class="column">




  
     <form hx-post="api/users.php" hx-swap="beforebegin">
     <div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input class="input" name="name" type="text" placeholder="<?php echo $_SESSION['name']; ?>">
  </div>
</div>
 
<div class="columns">

<div class="column is-half">
 <div class="field">
  <label class="label">Phone No</label>
  <div class="control">
    <input class="input" name="phone" inputmode="numeric" type="phone" placeholder="+1 (641) 480 72921">
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
    <input class="input" name="address" type="text" placeholder="Enter Street Address">
  </div>
</div>  
 
     
<div class="field">
  <label class="label">Change Password</label>
  <div class="control">
    <input class="input" minlength="8" name="password" type="password" placeholder="Enter a Strong Password">
  </div>
</div>     
  
     
     
<div class="field">
  <label class="label">Occupation</label>
  <div class="control">
    <input class="input" name="occupation" type="text" placeholder="e.g IT Support">
  </div>
</div>


    </section>
    <footer class="modal-card-foot">
      <div class="buttons">
        <button name="update_user" class="button is-success" type="submit">Save changes</button>
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