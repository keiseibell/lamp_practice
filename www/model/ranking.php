<?php

function get_ranking($db){
  $sql = "
    SELECT
      order_detail.item_id,
      sum(amount),
      name,
      image
    FROM
      order_detail
    JOIN
      items
    ON
      order_detail.item_id = items.item_id
    GROUP BY
      item_id
    ORDER BY
      sum(amount) DESC
    LIMIT
    3
  ";
  return fetch_all_query($db, $sql);
}

?>