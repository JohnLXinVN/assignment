<?php

namespace Ductong\XuongOop\Models;

use Ductong\XuongOop\Commons\Model;

class Category extends Model
{
    protected string $tableName = 'category';


    public function getForMenu()
    {
        try {
            return $this->queryBuilder
                ->select('id', 'name')
                ->from('category')
                ->fetchAllAssociative();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
