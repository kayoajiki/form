<?php
function getZodiac($month, $day) {
    $zodiac = [
        "山羊座" => [[12, 22], [1, 19]],
        "水瓶座" => [[1, 20], [2, 18]],
        "魚座" => [[2, 19], [3, 20]],
        "牡羊座" => [[3, 21], [4, 19]],
        "牡牛座" => [[4, 20], [5, 20]],
        "双子座" => [[5, 21], [6, 21]],
        "蟹座" => [[6, 22], [7, 22]],
        "獅子座" => [[7, 23], [8, 22]],
        "乙女座" => [[8, 23], [9, 22]],
        "天秤座" => [[9, 23], [10, 23]],
        "蠍座" => [[10, 24], [11, 22]],
        "射手座" => [[11, 23], [12, 21]]
    ];
    foreach ($zodiac as $sign => [$start, $end]) {
        [$sm, $sd] = $start;
        [$em, $ed] = $end;
        if (($month == $sm && $day >= $sd) || ($month == $em && $day <= $ed)) {
            return $sign;
        }
    }
    return "不明";
}

// 入力取得
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$theme = $_POST['theme'];
$change = $_POST['change'];

// 星座計算
$date = date_create($birthday);
$month = (int)date_format($date, 'm');
$day = (int)date_format($date, 'd');
$zodiac = getZodiac($month, $day);

// 新しいデータ
$new_entry = [
    "name" => $name,
    "birthday" => $birthday,
    "theme" => $theme,
    "change" => $change,
    "zodiac" => $zodiac
];

// ファイル読み込み＆追記
$filename = 'data.json';
$data = [];

if (file_exists($filename)) {
    $json = file_get_contents($filename);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $data = $decoded;
    }
}

// 追加して保存
$data[] = $new_entry;
file_put_contents($filename, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

// 完了メッセージ
// 保存処理のあとに…
header("refresh:3;url=index.php");
echo "<h2>🔮 ご回答ありがとうございました！</h2>";
echo "<p>3秒後にアンケートに戻ります。</p>";
?>
