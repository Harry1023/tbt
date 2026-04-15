<!DOCTYPE html>
<head>

<?php include "head.php"; ?>

</head>
<body>

<section class="hero is-fullheight">
  <div class="hero-body">
<div class="container is-max-tablet px-5">


<div class="block">
<div class="is-flex is-justify-content-center">
<figure class="image is-128x128">
  <img class="is-rounded" src="https://bulma.io/assets/images/placeholders/128x128.png" />
</figure>
</div>
</div>


<form hx-post="api/core/auth.php" hx-target="#errorAdd" hx-swap="innerHTML">

<div class="field">
  <label class="label">Email</label>
  <div class="control">
    <input class="input" type="email" name="email" placeholder="Your Email Address" required>
  </div>
</div>


<div class="field">
  <label class="label">Password</label>
  <div class="control">
    <input class="input" type="password" name="password" placeholder="Enter Password" required>
  </div>
  <p class="help">Default Password for New Accounts is <strong>Root<strong></p>
</div>

<div id="errorAdd"></div>

<div class="control mt-4">
  <button type="submit" class="button is-primary is-rounded">Login</button>
<a class="button is-ghost is-small mt-1">Forgot Password?</a>

</div>
</form>

</div>
</div>

</section>
</body>
</html>