<?php

namespace api\models;

use common\models\Category as ModelsCategory;

class Category extends ModelsCategory
{
    public function fields()
    {
        return ['id'];
    }
    public function extraFields()
    {
        return ['name'];
    }
}