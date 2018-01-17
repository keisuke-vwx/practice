# z in FizzBuzzString

以下のサイトにある課題を解いた。

[https://yukicoder.me/problems/no/24](https://yukicoder.me/problems/no/24)

- 初回作成にかかった時間：約30分

## 出力のサンプル

ついでに文字列も一緒に表示させた。

```
# echo 15 | php fizz_buzz_string.php
16
12Fizz4BuzzFizz78FizzBuzz11Fizz1314FizzBuzz

# echo 30 | php fizz_buzz_string.php
32
12Fizz4BuzzFizz78FizzBuzz11Fizz1314FizzBuzz1617Fizz19BuzzFizz2223FizzBuzz26Fizz2829FizzBuzz

# echo 100 | php fizz_buzz_string.php
106
(長いので省略)

```

## メモ

### 使用した関数

- mb_substr_count()
	- 指定した文字列の出現回数を数える
	- [http://php.net/manual/ja/function.mb-substr-count.php](http://php.net/manual/ja/function.mb-substr-count.php)


