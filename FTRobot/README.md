# FT Robot

以下のサイトにある課題を解いた。

[https://beta.atcoder.jp/contests/arc087/tasks/arc087_b](https://beta.atcoder.jp/contests/arc087/tasks/arc087_b)

- 作成にかかった時間：約4時間

## 出力のサンプル

想定される座標も途中で出力している。

```
# cat sample_01.txt | php FTRobot.php
(-2, -2)
(4, -2)
(4, 2)
YES

# cat sample_02.txt | php FTRobot.php
(-2, -2)
YES

# cat sample_03.txt | php FTRobot.php
(2, 0)
NO

# cat sample_04.txt | php FTRobot.php
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
(0, 0)
NO
```

## メモ

難しかった…。

### 使用した関数

- str_split()
- pow()
- str_pad()
