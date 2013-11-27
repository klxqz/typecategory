<?php

/**
 * @author Коробов Николай wa-plugins.ru <support@wa-plugins.ru>
 * @link http://wa-plugins.ru/
 */
class shopTypecategoryPlugin extends shopPlugin {

    public function backendCategoryDialog($category) {
        if ($this->getSettings('status')) {

            #load product types
            $type_model = new shopTypeModel();
            $product_types = $type_model->getAll($type_model->getTableId(), true);
            $product_types_count = count($product_types);


            $view = wa()->getView();
            $view->assign('category', $category);
            $view->assign('product_types', $product_types);
            $template_path = wa()->getAppPath('plugins/typecategory/templates/CategoryField.html', 'shop');
            $html = $view->fetch($template_path);
            return $html;
        }
    }

    public function categorySave($category) {
        $category_id = $category['id'];
        $type_id = waRequest::post('type_id');
        $rec_subcategories = waRequest::post('rec_subcategories');

        $category_model = new shopCategoryModel();
        $category = $category_model->getById($category_id);
        if ($category) {
            $category_model->updateById($category_id, array('type_id' => $type_id));
        }
        if ($rec_subcategories) {
            $cats = $category_model->getTree($category_id, null, false);
            foreach ($cats as $cat) {
                $category_model->updateById($cat['id'], array('type_id' => $type_id));
            }
        }
    }

}
