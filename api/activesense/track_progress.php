<?php
include __DIR__ . "/../core/functions.php";

session_start();
$data = json_decode(file_get_contents("php://input"), true);

$userId = $_SESSION['email']; // from auth
$videoId = $data['video_id'];
$newStart = (float)$data['start'];
$newEnd = (float)$data['end'];
$existingRanges = [];

// fetch existing ranges from DB
$sql = mysqli_prepare(con, "SELECT watched_ranges FROM video_logs WHERE email = ? AND video_id = ?");
mysqli_stmt_bind_param($sql, "si", $userId, $videoId);
mysqli_stmt_execute($sql);
$res = mysqli_stmt_get_result($sql);
if($row = mysqli_fetch_assoc($res)) {
  $existingRanges = json_decode($row['watched_ranges'], true) ?? [];
}
  $updatedRanges = mergeRanges($existingRanges, $newStart, $newEnd);
  $newRecordStmt = mysqli_prepare(con, "INSERT INTO video_logs (email, video_id, watched_ranges) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE watched_ranges = ?");
  mysqli_stmt_bind_param($newRecordStmt, "siss", $userId, $videoId, $updatedRanges, $updatedRanges);
  mysqli_stmt_execute($newRecordStmt);


function mergeRanges($existingRanges, $newStart, $newEnd) {

// Take Existing Range and Add New Range to it
$existingRanges[] = [$newStart, $newEnd];


// Sort Them By Starting Time (Usort Modifies Array it's applied to)
usort($existingRanges, function($a, $b) {
    return $a[0] <=> $b[0];
});


// Array to hold MERGED STUFF
$merged = [];


// Now Check Individual Range within the Existing Ranges
foreach($existingRanges as $singleExistingRange) {
  
// Merged Array is empty so first iteration should just add whatever value is given
  if(empty($merged)) {
    $merged[] = $singleExistingRange;
    continue;
  }

  // Now take the last value added to MERGED[]
  $lastValueMerged = $merged[count($merged) - 1];
  
  // Check Overlap in our Current Array vs the Last Array added to MERGED[]
  if($singleExistingRange[0] <= $lastValueMerged[1]) {
    $merged[count($merged) - 1][1] = max($singleExistingRange[1], $merged[count($merged) - 1][1]);
  }

  // If No Overlap Just Add The Array to MERGED[]
  else {$merged[] = $singleExistingRange;}

  }

  // Fuck the MERGED[]
  return json_encode($merged);
}

?>