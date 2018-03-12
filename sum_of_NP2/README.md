# Sum of "not power of 2"

以下のサイトにある課題を解いた。

https://yukicoder.me/problems/no/638

- 作成にかかった時間：約30分

## 出力のサンプル

```
$ php sum_of_NP2.php 5
-1

$ php sum_of_NP2.php 11
5 6
```

## メモ

メインは与えられた数が2の累乗数であるかを判定する **is_pow_of_2** 関数の作成である。

再帰関数として実装した。
