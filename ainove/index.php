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
      <th><abbr title="Played">Email</abbr></th>
      <th>Phone</th>
      <th><abbr title="Drawn" hx-get="../api/settings.php?configuration=unit_label" hx-trigger="load"></abbr></th>
      <th><abbr title="Lost">L</abbr></th>
      <th><abbr title="Goals for">GF</abbr></th>
      <th><abbr title="Goals against">GA</abbr></th>
      <th><abbr title="Goal difference">GD</abbr></th>
      <th><abbr title="Points">Pts</abbr></th>
      <th>Qualification or relegation</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th><abbr title="Position">Pos</abbr></th>
      <th>Team</th>
      <th><abbr title="Played">Pld</abbr></th>
      <th><abbr title="Won">W</abbr></th>
      <th><abbr title="Drawn">D</abbr></th>
      <th><abbr title="Lost">L</abbr></th>
      <th><abbr title="Goals for">GF</abbr></th>
      <th><abbr title="Goals against">GA</abbr></th>
      <th><abbr title="Goal difference">GD</abbr></th>
      <th><abbr title="Points">Pts</abbr></th>
      <th>Qualification or relegation</th>
    </tr>
  </tfoot>
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
      <td>12</td>
      <td>3</td>
      <td>68</td>
      <td>36</td>
      <td>+32</td>
      <td>81</td>
      <td>
        Qualification for the
        <a
          href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Champions_League#Group_stage"
          title="2016–17 UEFA Champions League"
          >Champions League group stage</a
        >
      </td>
    </tr>
    <tr>
      <th>2</th>
      <td>
        <a
          href="https://en.wikipedia.org/wiki/Arsenal_F.C."
          title="Arsenal F.C."
          >Arsenal</a
        >
      </td>
      <td>38</td>
      <td>20</td>
      <td>11</td>
      <td>7</td>
      <td>65</td>
      <td>36</td>
      <td>+29</td>
      <td>71</td>
      <td>
        Qualification for the
        <a
          href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Champions_League#Group_stage"
          title="2016–17 UEFA Champions League"
          >Champions League group stage</a
        >
      </td>
    </tr>
  </tbody>
</table>

</div>



</div>

</body>
</html>