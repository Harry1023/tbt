<!DOCTYPE html>
<head>

<?php include "head.php"; ?>

</head>
<body>


<div class="container is-max-tablet px-5">

<div class="columns is-centered">

<div class="column">
<figure class="image is-128x128">
  <img class="is-rounded" src="https://bulma.io/assets/images/placeholders/128x128.png" />
</figure>
</div>

</div>

<form method="post">

<div class="field">
  <label class="label">Email</label>
  <div class="control">
    <input class="input" type="email" placeholder="Your Email Address" required>
  </div>
</div>


<div class="field">
  <label class="label">Password</label>
  <div class="control">
    <input class="input" type="password" placeholder="Enter Password" required>
  </div>
  <p class="help">Default Password for New Accounts is Root</p>
</div>



<div class="control">
  <button class="button is-primary">Login</button>
</div>
</form>

</div>

</body>
</html>