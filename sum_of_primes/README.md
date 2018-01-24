# Summation of primes

以下のサイトにある課題を解いた。

[https://projecteuler.net/problem=10](https://projecteuler.net/problem=10)

- 作成にかかった時間：約5分

「200万以下の素数の総和を求めよ」という問題である。

## 結果

コード自体はすぐに書けたのだが…。

実行してみると結果が中々返ってこない。
計算にかなり時間がかかっているようだ。

試しにもっと小さい数字から1桁ずつ増やしていって、それぞれ結果が返ってくるまでの時間を計ってみた。

```
$ time echo 10 | php sum_of_primes.php
17

real    0m0.014s
user    0m0.010s
sys     0m0.002s

$ time echo 200 | php sum_of_primes.php
4227

real    0m0.014s
user    0m0.008s
sys     0m0.004s

$ time echo 2000 | php sum_of_primes.php
277050

real    0m0.016s
user    0m0.013s
sys     0m0.002s

$ time echo 20000 | php sum_of_primes.php
21171191

real    0m0.107s
user    0m0.099s
sys     0m0.006s

$ time echo 200000 | php sum_of_primes.php
1709600813

real    0m5.519s
user    0m5.506s
sys     0m0.004s

$ time echo 2000000 | php sum_of_primes.php
142913828922

real    7m10.633s
user    7m9.914s
sys     0m0.046s

```

1桁小さい20万では5秒程度で済んだが、問題の200万では7分もかかった…！

どうしてこんなに計算時間に隔たりが出てしまったのか、また計算時間をもっと短縮できないか。

簡単な問題だと思いきや、いざ実行してみると思わぬ結果に出会ってしまった。考える余地が色々ありそうだ。
