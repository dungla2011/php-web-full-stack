<?php
class Helpers {

    static function buildSelectOptions($cats, $parentId = 0, $prefix = '', $val = null, $field = null) {
        $html = '';
        foreach ($cats as $category) {
            if ($category[$field] == $parentId) {
                $selected = '';
                if($category['id'] == $val)
                    $selected = 'selected';
                $html .= '
                <option '.$selected.' value="' . $category['id'] . '">' . $prefix . $category['name'] . '</option>';
                $html .= self::buildSelectOptions($cats, $category['id'], $prefix . '--', $val, $field);
                
            }
        }
        $html .= ''; 
        return $html;
    }


}