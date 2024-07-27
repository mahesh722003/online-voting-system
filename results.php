<?php
$votes = file('votes.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$results = array();

foreach ($votes as $vote) {
    list($username, $candidate) = explode(',', $vote);
    if (!isset($results[$candidate])) {
        $results[$candidate] = 0;
    }
    $results[$candidate]++;
}

echo json_encode($results);
?>
