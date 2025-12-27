<?php

/**
 * 標準入力から得た整数の分割すべてを列挙する PHP のプログラムです。
 */

echo "0 以上の整数をひとつ入力してください：";

$n = (int) trim(fgets(STDIN));

$count = 0;
$summands = [];
$partitions = [];

function partitions($remain, $currentSummand) {
    global $count;
    global $summands;
    global $partitions;

    if ($remain == 0) {
        $count++;
        $partitions[$count] = $summands;
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

echo "{$n} の分割は全部で " . count($partitions) . " 個あります。以下にそれらを列挙します。\n";

foreach ($partitions as $key => $partition) {
    echo $key . ": " . implode(" + ", $partition) . "\n";
}
