# CellAutomaton110

以下のサイトにある課題を解いた。

https://yukicoder.me/problems/no/663

- 作成にかかった時間：約2時間

## 出力のサンプル


```
$ cat sample_01.txt | php solve.php
2

$ cat sample_02.txt | php solve.php
2

$ cat sample_03.txt | php solve.php
3
```

## メモ

まず最初にルールに従うセルオートマトンクラスCellAutomaton110を作成。

そして今回のために新しく作ったBitSeqListクラスを用いて、1段目のすべてのパターン(※)を生成する。

(※指定の長さを持った0と1の数字だけでなる数列の組み合わせ)

そのすべてのパターンでセルオートマトンを実行させ、指定した2段目の数列に一致した回数を数え上げるという解法にした。
