<?php

$n = (int) trim(fgets(STDIN));
echo "以下に {$n} の分割を列挙します。\n";
$count = 0;
$summands = [];

function partitions($remain, $currentSummand) {
    global $count;
    global $summands;

    if ($remain == 0) {
        $count++;
        echo $count . ": " . implode(" + ", $summands) . "\n";
    } else {
        $nextSummand = min($currentSummand, $remain);
        while ($nextSummand > 0) {
            array_push($summands, $nextSummand);
            partitions($remain - $nextSummand, $nextSummand);
            array_pop($summands);
            $nextSummand--;
        }
    }
}

partitions($n, $n);
