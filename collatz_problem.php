<?php

/**
 * コラッツ予想の計算を行うプログラムです。
 * 
 * 標準入力から入力された正の整数からスタートして、
 * その数が奇数であれば 3 倍して 1 を足し、
 * その数が偶数であれば 2 で割る
 * という操作を 1 になるまで繰り返します。
 */

$count = 0;
echo "正の整数をひとつ入力してください：";
$n = (int) trim(fgets(STDIN));

$history = [];

while ($n > 1) {
    if ($n % 2 == 1) {
        $n = 3 * $n + 1;
    } else {
        $n /= 2;
    }

    $count++;

    $history[] = "{$count} 回目の操作後の値：{$n}";
}

echo "{$count} 回の操作で 1 になりました。\n\n";
echo implode("\n", $history);
