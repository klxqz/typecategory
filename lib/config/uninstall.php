<?php

/**
 * @author Коробов Николай wa-plugins.ru <support@wa-plugins.ru>
 * @link http://wa-plugins.ru/
 */
$model = new waModel();
try {
    $model->query("SELECT type_id FROM shop_category WHERE 0");
    $model->exec("ALTER TABLE shop_category DROP type_id");
} catch (waDbException $e) {
    
}

