# パンデジタル数

[パンデジタル数 - Wikipedia](https://ja.wikipedia.org/wiki/%E3%83%91%E3%83%B3%E3%83%87%E3%82%B8%E3%82%BF%E3%83%AB%E6%95%B0)

本来のパンデジタル数の定義とは異なるが、

「0からn-1までの数を組み合わせてできる数字」

を生成するプログラムである。

n = 10 とした場合に、10進法における10桁のパンデジタル数となる。


以下、出力した例である。

```
$ php sample.php 3 > pandigital_numbers_3.txt

$ php sample.php 4 > pandigital_numbers_4.txt
```

10進法における10桁のパンデジタル数は 10! (10の階乗) = 3628800 通り存在する。

```
$ time php sample.php 10 > pandigital_numbers_10.txt

real    2m46.099s
user    0m0.831s
sys     1m33.611s

$ wc -l pandigital_numbers_10.txt
3628800 pandigital_numbers_10.txt

# n = 9 の場合との比較
$ time php sample.php 9 > pandigital_numbers_9.txt

real    0m15.856s
user    0m0.088s
sys     0m8.841s
```
