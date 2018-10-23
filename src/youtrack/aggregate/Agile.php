<?php

namespace youtrack\aggregate;

use youtrack\core\Aggregate;
use youtrack\core\Entity;

class Agile extends Entity
{

    use Aggregate;

    /**
     * Имя ресурса агрегата
     * @return string
     */
    static public function resource(): string
    {
        return 'agiles';
    }
}