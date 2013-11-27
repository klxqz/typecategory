<?php

/**
 * @author Коробов Николай wa-plugins.ru <support@wa-plugins.ru>
 * @link http://wa-plugins.ru/
 */
$model = new waModel();
try {
    $sql = 'SELECT `type_id` FROM `shop_category` WHERE 0';
    $model->query($sql);
} catch (waDbException $ex) {
    $sql = 'ALTER TABLE `shop_category` ADD `type_id` INT NOT NULL AFTER `id` , ADD INDEX ( `type_id` )';
    $model->query($sql);
}