<?php

namespace youtrack\aggregate;

use youtrack\core\Aggregate;
use youtrack\entity\Sprint as BaseSprint;

class Sprint extends BaseSprint
{

    use Aggregate;

    /**
     * Имя ресурса агрегата
     * @return string
     */
    static public function resource(): string
    {
       return 'agiles/{id}/sprints';
    }

}