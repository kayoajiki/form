<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>誕生日アンケート</title>
</head>
<body>
  <h2>🔮 占いアンケート「今年はどんな年でしたか？」</h2>
  <form action="submit.php" method="POST">
    <label>お名前：<input type="text" name="name" required></label><br><br>
    <label>生年月日：<input type="date" name="birthday" required></label><br><br>

    <label>Q1. 今年はどんなテーマの年でしたか？</label><br>
    <select name="theme" required>
      <option value="変化の年">変化の年</option>
      <option value="挑戦の年">挑戦の年</option>
      <option value="恋愛の年">恋愛の年</option>
      <option value="学びの年">学びの年</option>
      <option value="停滞の年">停滞の年</option>
    </select><br><br>

    <label>Q2. どんな変化がありましたか？</label><br>
    <textarea name="change" rows="4" cols="40" required></textarea><br><br>

    <input type="submit" value="送信">
  </form>
</body>
</html>
