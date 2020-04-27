<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴一覧</title>

  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'index.css'); ?>">
  
</head>
<body>
    <h>購入履歴</h>
    <table>
        <tbody>
        <tr>
            <th>注文番号</th>
            <th>購入日</th>
            <th>合計金額</th>
            <th></th>
        </tr>
        <?php foreach ($data as $value)  { ?>
        <tr>
            <td><?php print $value['order_id']; ?></td>
            <td><?php print $value['create_datetime']; ?></td>
            <td><?php print $value['order_all_sum']; ?></td>
          <form action = "order_detail.php" method ="post">
          　<td><input type="submit" value="購入明細表示"></td>
          　<input type="hidden" name="order_id" value="<?php print $value['order_id']; ?>">
            <input type="hidden" name="csrf_token" value="<?php print get_csrf_token() ; ?>">
          </form>
        </tr>
        <?php }?>
        </tbody>
    </table>
</body>
</html>