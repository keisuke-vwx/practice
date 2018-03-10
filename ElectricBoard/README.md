# Addition and Multiplication

以下のサイトにある課題を解いた。

[https://abc076.contest.atcoder.jp/tasks/abc076_b](https://abc076.contest.atcoder.jp/tasks/abc076_b)

- 作成にかかった時間：約50分

## 出力のサンプル

```
# cat sample_01.txt | php ElectricBoard.php
10

# cat sample_02.txt | php ElectricBoard.php
76
```

## メモ

今回もビットを用いて2種類ある操作の組み合わせパターンを全て試し、条件を満たすものを選ぶという問題だった。
頻出パターンなので汎用化してもいいかもしれない。


## TwoOperationsクラスの継承

(2018/03/10 追記)

**ElectricBoard2.php**


既述のメモにも書いたが、この頻出パターンを汎用化したTwoOperationsクラス

```
/practice/util/TwoOperations/TwoOperations.php
```

を継承して、改めて作成したプログラムが　ElectricBoard2.php　である。

コード量がグッと短く、シンプルになった。
