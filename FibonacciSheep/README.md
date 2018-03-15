# フィボナッチ羊

以下のサイトにある課題を解いた。

https://yukicoder.me/problems/no/320

- 作成にかかった時間：約1時間

## 出力のサンプル

```
$ php FibonacciSheep.php 7 9
2

$ php FibonacciSheep.php 5 5
0

$ php FibonacciSheep.php 5 6
-1
```

## メモ

フィボナッチ数列で羊を数えていくのだが、その内の何回かを誤った計算で出してしまう、という設定である。

何回目で誤ったのかのパターンを生成する必要があるので、今回もTwoOperationsクラスを継承して作成した。

しかし次の入力では、数値が大きすぎるためPHPメモリーエラーを起こしてしまった。

これを回避できないか考えていきたい。

```
$ php FibonacciSheep.php 67 17308070087783
PHP Fatal error:  Allowed memory size of 134217728 bytes exhausted (tried to allocate 72 bytes)
```


