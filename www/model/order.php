<?php

function make_order_list($db,$user_id){
  $now_date = date('Y-m-d H:i:s');
    $sql = "
        INSERT INTO
          order_list(
            user_id,
            create_datetime
          )
        VALUES(?,?) ;
    ";
    $params = array($user_id,$now_date);
    return execute_query($db, $sql ,$params);
}

function make_order_detail($db,$order_id,$item_id,$price,$amount){
   
    $now_date = date('Y-m-d H:i:s');

    $sql = "
        INSERT INTO
          order_detail(
            order_id,
            item_id,
            price,
            amount,
            create_datetime
          )
        VALUES(?,?,?,?,?) ;
    ";
    $params = array($order_id,$item_id,$price,$amount,$now_date);
    return execute_query($db, $sql ,$params);
}

function get_order_list($db,$user){
  $sql = "
    SELECT
      order_list.order_id,
      user_id,
      order_list.create_datetime,
      sum(price*amount)
    FROM
      order_list
    JOIN
      order_detail
    ON
      order_list.order_id = order_detail.order_id
    WHERE
      user_id = ?
    GROUP BY
      order_id ;
  ";
  $params = array($user);
  return fetch_all_query($db, $sql ,$params);
}

function get_order_detail($db,$order_id){
    $sql = "
      SELECT
        order_id,
        order_detail.item_id,
        order_detail.price,
        order_detail.amount,
        create_datetime,
        items.name,
        (order_detail.price*order_detail.amount) as sum
      FROM
        order_detail
      JOIN
        items
      ON
        items.item_id = order_detail.item_id
      WHERE
        order_id = ?
    ";
    $params = array($order_id);
    return fetch_all_query($db, $sql ,$params);   
}