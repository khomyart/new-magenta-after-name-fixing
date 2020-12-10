<?php

function getListOfImages($filter = '')
{
    $query = 'SELECT * FROM `gallery` WHERE 1';

    if (is_string($filter) && (trim($filter) != '')) {
        $query .= ' AND ( (`name` LIKE :filter) OR (`desc` LIKE :filter) ';
        $params['filter'] = '%' . $filter . '%';
    }

    return getAllRows($query, $params);
}

/**
 * Edit unit, depends of $action value
 *
 * @param $action
 * @param $params
 * @return bool
 */
function editGalleryUnit($action, $params) {
    if ($action === 'insert') {
        $query = 'INSERT INTO `gallery`(`img`, `name`, `desc`) 
                    VALUES (:img, :name, :desc);';
    }
    
    if ($action === 'remove') {
        $query = 'DELETE from `gallery` WHERE `id` = :id;';
    }

    if ($action === 'update') {
        $query = 'UPDATE `gallery` 
                    SET `img`=:img,`name`=:name,`desc`=:desc
                    WHERE `id` = :id;';
    }

    return performQuery($query, $params) ? true : false;
}
