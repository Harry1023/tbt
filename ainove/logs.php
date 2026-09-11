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


<div class="container is-fluid" hx-get="../api/content.php?view_content" hx-trigger="load" hx-on::after-swap="initVideos()">

<h1 class="is-size-4 mt-2"><strong>Logs</strong></h1>





</div>



</div>


<script>


  function initVideos() {
setTimeout(() => {

  console.log(document.querySelectorAll('.bunny-video').length);
  const video = document.getElementById('video');
document.querySelectorAll('.bunny-video').forEach(video => {
    const guid = video.dataset.videoGuid; // Bunny Video ID
    const phpID = video.dataset.videoId; // System Registered Video ID
// For Debugging: console.log(guid); console.log(phpID);
    const hls = new Hls();
  hls.loadSource(guid);
   hls.attachMedia(video);
runActivesense(phpID);
});


 }, 100);
  }

</script>

<?php include "footer.php"; ?>
</body>
</html>