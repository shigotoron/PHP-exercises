<?php

$n = (int) trim(fgets(STDIN));
echo "以下に {$n} の分割を列挙します。\n";
$count = 0;
$summands = [];

function partitions($remain, $maxSummand) {
    global $count;
    global $summands;

    if ($remain == 0) {
        $count++;
        echo $count . ": " . implode(" + ", $summands) . "\n";
    } else {
        $summand = min($maxSummand, $remain);
        while ($summand > 0) {
            array_push($summands, $summand);
            partitions($remain - $summand, $summand);
            array_pop($summands);
            $summand--;
        }
    }
}

partitions($n, $n);
