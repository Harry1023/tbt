<!DOCTYPE html>
<head>
<?php include "head.php";
includeSnippet("<script src='https://cdnjs.cloudflare.com/ajax/libs/hls.js/0.5.14/hls.min.js' integrity='sha512-js37JxjD6gtmJ3N2Qzl9vQm4wcmTilFffk0nTSKzgr3p6aitg73LR205203wTzCCC/NZYO2TAxSa0Lr2VMLQvQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>");?>
</head>
<body>
<div class="columns">

<?php include "aside.php"; ?>

<div class="column">


<?php include "nav.php"; ?>


<div class="container is-fluid">

<h1 class="is-size-4 mt-2"><strong>Dashboard</strong></h1>

<table class="table">
  <thead>
    <tr>
      <th><abbr title="Position">Pos</abbr></th>
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
  <tbody>
    <tr>
      <th>1</th>
      <td>
        <a
          href="https://en.wikipedia.org/wiki/Leicester_City_F.C."
          title="Leicester City F.C."
          >Leicester City</a
        >
        <strong>(C)</strong>
      </td>
      <td>38</td>
      <td>23</td>
      
      
      <td>

      <div class="dropdown">
  <div class="dropdown-trigger">
    <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
      <span>1</span>
      <span class="icon is-small">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </button>
  </div>
  <div class="dropdown-menu" id="dropdown-menu" role="menu">
    <div class="dropdown-content">
      <a class="dropdown-item"> Dropdown item </a>
      <a class="dropdown-item"> Other dropdown item </a>
      <a class="dropdown-item is-active"> Active dropdown item </a>
      <hr class="dropdown-divider" />
      <a href="#" class="dropdown-item"> With a divider </a>
    </div>
  </div>
</div>


      </td>
      
      
      
      <td>3</td>
      <td>68</td>
      <td>36</td>
      <td>House No. R143, Block A, Bagh E Malir, Karachi</td>
      <td>
       192.168.0.1
      </td>
    </tr>

  </tbody>
</table>

</div>



</div>

<?php include "footer.php"; ?>
</body>
</html>