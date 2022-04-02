<?php

namespace api\models;

use common\models\Job as ModelsJob;

class Job extends ModelsJob
{
    // public function fields()
    // {
    //     return ['id'];
    // }
    public function extraFields()
    {
        return ['category'];
    }
}
