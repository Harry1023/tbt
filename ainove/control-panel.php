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

<div class="block">
<h1 class="is-size-4 mt-2"><strong>Settings</strong></h1></div>

<div class="block">


<div class="columns">

<div class="column">
<div class="field">
  <p title="Label a single unit for your content"><strong>Organization Name</strong></p>
    <span class="is-size-7 has-text-grey">Enter Name for your Organization</span>
</div>
</div>


<div class="column is-one-third is-flex is-align-items-center">
    <input class="input" type="text" hx-get="../api/settings.php?configuration=organization_name" hx-trigger="load"   hx-swap="none"
  hx-on::after-request="this.placeholder = event.detail.xhr.responseText">
</div>



</div>





<div class="columns">

<div class="column">
<div class="field">
  <p title="Label a single unit for your content"><strong>Organization URL</strong></p>
    <span class="is-size-7 has-text-grey">Enter URL for your Organization</span>
</div>
</div>


<div class="column is-one-third is-flex is-align-items-center">
    <input class="input" type="text" hx-get="../api/settings.php?configuration=organization_url" hx-trigger="load"   hx-swap="none"
  hx-on::after-request="this.placeholder = event.detail.xhr.responseText">
</div>



</div>








<div class="columns">

<div class="column">
<div class="field">
  <p title="Label a single unit for your content"><strong>Timezone</strong></p>
    <span class="is-size-7 has-text-grey">Select Timezone for this application</span>
</div>
</div>


<div class="column is-one-third is-flex is-align-items-center is-justify-content-flex-end">



        <div class="dropdown">
  <div class="dropdown-trigger">
    <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
      <span hx-get="../api/settings.php?configuration=timezone" hx-trigger="load" >1</span>
      <span class="icon is-small">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </button>
  </div>
  <div class="dropdown-menu" id="dropdown-menu" role="menu">
    <div class="dropdown-content">
      <a class="dropdown-item"> Eastern Time (US & Canada) </a>
      <a class="dropdown-item"> Central Time (US & Canada) </a>
      <a class="dropdown-item is-active"> Pacific Time (US & Canada) </a>
      
      <hr class="dropdown-divider" />
    
      <a href="#" class="dropdown-item"> London (UK) </a>
        <a href="#" class="dropdown-item"> Paris (France) </a>
        <a href="#" class="dropdown-item"> Berlin (Germany) </a>
        <a href="#" class="dropdown-item"> Madrid (Spain) </a>
        <a href="#" class="dropdown-item"> Rome (Italy) </a>

      <hr class="dropdown-divider" />

        <a href="#" class="dropdown-item"> Karachi (Pakistan) </a>
        <a href="#" class="dropdown-item"> Delhi (India) </a>
        <a href="#" class="dropdown-item"> Bangkok (Thailand) </a>
        <a href="#" class="dropdown-item"> Seoul (South Korea) </a>
        <a href="#" class="dropdown-item"> Tokyo (Japan)</a>
        <a href="#" class="dropdown-item"> Sydney (Australia)</a>
        <a href="#" class="dropdown-item"> Singapore </a>
        <a href="#" class="dropdown-item"> China </a>

     <hr class="dropdown-divider" />

    <a href="#" class="dropdown-item"> Moscow (Russia) </a>



    </div>
  </div>
</div>




</div>
</div>



<div class="columns">

<div class="column">
<div class="field">
  <p title="Label a single unit for your content"><strong>Date Seperator</strong></p>
    <span class="is-size-7 has-text-grey">Select a Date Seperator</span>
</div>
</div>


<div class="column is-one-third is-flex is-align-items-center is-justify-content-flex-end">

        <div class="dropdown is-one-fifth">
  <div class="dropdown-trigger">
    <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
      <span hx-get="../api/settings.php?configuration=date_seperator" hx-trigger="load" >1</span>
      <span class="icon is-small">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </button>
  </div>
  <div class="dropdown-menu" id="dropdown-menu" role="menu">
    <div class="dropdown-content">
      <a class="dropdown-item"> - </a>
      <a class="dropdown-item"> / </a>
      <a class="dropdown-item"> . </a>
      <a class="dropdown-item"> , </a>

    </div>
  </div>
</div>


</div>




</div>
</div>











   <div class="divider"></div>

<div class="block">
<h1 class="is-size-5 mt-2"><strong>Course Settings</strong></h1>
</div>




<div class="columns">

<div class="column">
<div class="field">
  <p title="Label a single unit for your content"><strong>Review Mode</strong></p>
    <span class="is-size-7 has-text-grey">Enables members to access previous Units.</span>
</div>
</div>


<div class="column is-one-third is-flex is-align-items-center is-justify-content-flex-end">

<label class="switch is-rounded is-small">
            <input type="checkbox" value="1" hx-get="../api/settings.php?configuration=review_mode" hx-trigger="load" hx-on::after-request="this.checked = +event.detail.xhr.responseText">
            <span class="check"></span>
          </label>

</div>


</div>









<div class="columns">

<div class="column">
<div class="field">
  <p title="Label a single unit for your content"><strong>Unit Label</strong></p>
    <span class="is-size-7 has-text-grey">Unit Label is the Label of Individual Unit of Content</span>
</div>
</div>


<div class="column is-one-third is-flex is-align-items-center">
    <input class="input" type="text" hx-get="../api/settings.php?configuration=unit_label" hx-trigger="load"   hx-swap="none"
  hx-on::after-request="this.placeholder = event.detail.xhr.responseText">
</div>



</div>






<div class="columns">

<div class="column">
<div class="field">
  <p title="Label a single unit for your content"><strong>Number of Units</strong></p>
    <span class="is-size-7 has-text-grey">Enter maximum number of Units</span>
</div>
</div>


<div class="column is-one-third is-flex is-align-items-center">
    <input class="input" type="number" hx-get="../api/settings.php?configuration=max_units" hx-trigger="load"   hx-swap="none"
  hx-on::after-request="this.placeholder = event.detail.xhr.responseText">
</div>



</div>






   <div class="divider"></div>

<div class="block">
<h1 class="is-size-5 mt-2"><strong>CDN Settings</strong></h1>
</div>



<div class="columns">

<div class="column">
<div class="field">
  <p title="Label a single unit for your content"><strong>Review Mode</strong></p>
    <span class="is-size-7 has-text-grey">Enables members to access previous Units.</span>
</div>
</div>


<div class="column is-one-third is-flex is-align-items-center is-justify-content-flex-end">

<label class="switch is-rounded is-small">
            <input type="checkbox" value="1" hx-get="../api/settings.php?configuration=bunny_ready" hx-trigger="load" hx-on::after-request="this.checked = +event.detail.xhr.responseText">
            <span class="check"></span>
          </label>

</div>


</div>



<div class="columns">

<div class="column">
<div class="field">
  <p title="Label a single unit for your content"><strong>Bunny Access Key</strong></p>
    <span class="is-size-7 has-text-grey">Enter BunnyCDN Access Key</span>
</div>
</div>


<div class="column is-one-third is-flex is-align-items-center">
    <input class="input" type="text" placeholder="*************">
</div>



</div>





<div class="columns">

<div class="column">
<div class="field">
  <p title="Label a single unit for your content"><strong>Bunny Token</strong></p>
    <span class="is-size-7 has-text-grey">Enter BunnyCDN Token</span>
</div>
</div>


<div class="column is-one-third is-flex is-align-items-center">
    <input class="input" type="text" placeholder="**************">
</div>



</div>






<div class="columns">

<div class="column">
<div class="field">
  <p title="Label a single unit for your content"><strong>Bunny Pull Zone</strong></p>
    <span class="is-size-7 has-text-grey">Enter BunnyCDN Pull Zone</span>
</div>
</div>


<div class="column is-one-third is-flex is-align-items-center">
    <input class="input" type="text" hx-get="../api/settings.php?configuration=bunny_pullzone" hx-trigger="load"   hx-swap="none"
  hx-on::after-request="this.placeholder = event.detail.xhr.responseText">
</div>



</div>




</div>



</div>

<?php include "footer.php"; ?>
</body>
</html>