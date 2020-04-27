<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>購入明細</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
    <h>購入明細</h>
    <table>
        <tbody>
        <tr>
            <th>商品名</th>
            <th>商品価格</th>
            <th>購入数</th>
            <th>小計</th>
        </tr>
        <?php foreach ($data as $value)  { ?>
        <tr>
            <td><?php print $value['name']; ?></td>
            <td><?php print $value['price']; ?></td>
            <td><?php print $value['amount']; ?></td>
            <td><?php print $value['sum']; ?></td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</body>
</html>