# Timezone

以下のサイトにある課題を解いた。

https://yukicoder.me/problems/no/652

- 作成にかかった時間：約1時間

日本のタイムゾーンを"UTC+9"として、日本時間と、ある国のタイムゾーン指定したときに
その国では何時になるかを求める問題である。

## 出力のサンプル

```
$ echo 23 31 UTC+8 | php Timezone.php
22:31

$ echo 23 31 UTC+12 | php Timezone.php
02:31

$ echo 23 31 UTC-5.5 | php Timezone.php
09:01

$ sh test.sh sample_input_list.txt answer_list.txt
OK.
21:20
01:20
23:35
23:00
11:30
```

## メモ

必須の機能ではなかったが、タイムゾーンのフォーマットが正しいかどうかを正規表現を用いて厳密に判定した。

```
private function _check_utc_format($utc)
{
    $is_valid = preg_match("/^UTC(\+|-)((1[0-3]|[0-9])(.[0-9])?|14)$/", $utc);
    if (!$is_valid)
    {
        printf("UTC format is invalid : '%s'\n", $utc);
    }
    return $is_valid;
}
```

