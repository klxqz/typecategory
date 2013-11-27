<?php

/**
 * @author Коробов Николай wa-plugins.ru <support@wa-plugins.ru>
 * @link http://wa-plugins.ru/
 */
return array(
    'name' => 'Тип категории',
    'description' => 'Плагин задает тип категории аналогично типу товара',
    'vendor' => '985310',
    'version' => '1.0.0',
    'img' => 'img/typecategory.png',
    'frontend' => true,
    'handlers' => array(
        'backend_category_dialog' => 'backendCategoryDialog',
        'category_save' => 'categorySave',
    ),
);
//EOF
