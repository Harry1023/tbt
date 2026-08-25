<!DOCTYPE html>
<head>
<?php include "head.php";
includeSnippet("<script src='https://cdnjs.cloudflare.com/ajax/libs/hls.js/0.5.14/hls.min.js' integrity='sha512-js37JxjD6gtmJ3N2Qzl9vQm4wcmTilFffk0nTSKzgr3p6aitg73LR205203wTzCCC/NZYO2TAxSa0Lr2VMLQvQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>");?>
</head>
<body>
<div class="columns">

<?php include "aside.php"; ?>

<div class="column" style="container-type: inline-size;">


<?php include "nav.php"; ?>


<div class="container is-fluid">

<h1 class="is-size-4 mt-2"><strong>Dashboard</strong></h1>
<div class="table-container" style=" width: 100cqw;
  max-width: 100cqw; height: 90vh;">
<table class="table">
  <thead>
    <tr>
      <th><abbr title="Database Registration">Id</abbr></th>
      <th>Full Name</th>
      <th><abbr title="Email Address">Email</abbr></th>
      <th>Phone</th>
      <th><abbr title="Unit Label" hx-get="../api/settings.php?configuration=unit_label" hx-trigger="load"></abbr></th>
        <th>Occupation</th>
      <th>Password</th>
      <th>Availability</th>
      <th>Street Address</th>
      <th>Last Logged IP</th>
    </tr>
  </thead>
  <tbody id="membersTable" hx-get="../api/users.php" hx-trigger="load"></tbody>
</table></div>

</div>



</div>

<?php include "footer.php"; ?>
</body>
</html>