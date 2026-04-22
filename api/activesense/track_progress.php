<?php

$data = json_decode(file_get_contents("php://input"), true);

$userId = 1; // from auth
$videoId = $data['video_id'];
$newStart = (float)$data['start'];
$newEnd = (float)$data['end'];

// fetch existing ranges from DB
$stmt = $pdo->prepare("SELECT watched_ranges FROM video_progress WHERE user_id = ? AND video_id = ?");
$stmt->execute([$userId, $videoId]);
$row = $stmt->fetch();

$ranges = $row ? json_decode($row['watched_ranges'], true) : [];

// merge
$updated = mergeRanges($ranges, $newStart, $newEnd);

// save back
$json = json_encode($updated);

$stmt = $pdo->prepare("
  INSERT INTO video_progress (user_id, video_id, watched_ranges)
  VALUES (?, ?, ?)
  ON DUPLICATE KEY UPDATE watched_ranges = ?
");

$stmt->execute([$userId, $videoId, $json, $json]);

?>