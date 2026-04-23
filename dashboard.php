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



<div class="is-full-width">
 
<div class="box">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <img class="" src="https://bulma.io/assets/images/placeholders/128x128.png" alt="Image" />
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <p>
          <strong>Chapter 1 - All PDF Notes</strong> <br><small>@thebullstrading</small>
        </p>
      </div>
    

<span class="tag button">Download</span>



    </div>
  </article>
</div>




<video id="video" controls></video>

<div class="has-background-black box"></div>
<?php var_dump(function_exists('curl_init')); ?>




<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://video.bunnycdn.com/library/463283/videos/4fad1488-3577-4676-88d7-b05aa617c858",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "AccessKey: e07608c9-6542-411a-95332721699e-e051-41ce"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>


</div>



</div> <!-- Single Column End --->
</div>


</body>


<script>
const video = document.getElementById('video');
const src = "https://test-streams.mux.dev/x36xhzz/url_6/193039199_mp4_h264_aac_hq_7.m3u8";

if (Hls.isSupported()) {
  const hls = new Hls();
  hls.loadSource(src);
  hls.attachMedia(video);
} else {
  video.src = src; // Safari
}


// var lastTime;
// video.addEventListener("loadedmetadata", () => {
//   console.log("Duration:", video.duration);
// });

// video.addEventListener("timeupdate", () => {
//   console.log(video.currentTime);

//   lastTime = video.currentTime;
// });

// video.addEventListener("seeking", () => {
//   const current = video.currentTime;

//   if (current > lastTime) {
//     console.log("Skipped forward");
//   } else {
//     console.log("Skipped backward (rewatch)");
//   }
// });














let segmentStart = null;
let lastTime = 0;
let duration = 0;
let sendInterval = 10; // seconds


video.addEventListener("loadedmetadata", () => {
duration = video.duration;
});

// start tracking when play starts
video.addEventListener("play", () => {
  segmentStart = video.currentTime;
});

// track progress
video.addEventListener("timeupdate", () => {
  const current = video.currentTime;

  // detect forward skip
  if (current > lastTime + 2) {
    sendSegment(segmentStart, lastTime);
    segmentStart = current;
  }

  lastTime = current;

  // send every X seconds
  if (segmentStart !== null && current - segmentStart >= sendInterval) {
    sendSegment(segmentStart, current);
    segmentStart = current;
  }
});

// pause → send remaining segment
video.addEventListener("pause", () => {
  if (segmentStart !== null) {
    sendSegment(segmentStart, video.currentTime);
    segmentStart = null;
  }
});

// seeking → handle skip/rewatch
video.addEventListener("seeking", () => {
  if (segmentStart !== null) {
    sendSegment(segmentStart, lastTime);
  }
  segmentStart = video.currentTime;
});

function sendSegment(start, end) {
  if (end - start < 1) return; // ignore tiny segments

   fetch("api/activesense/track_progress.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
      video_id: 1,
      duration: duration,
      start: start,
      end: end
    })
  });

  console.log("Sent segment:", start, end);
}

</script>
</html>