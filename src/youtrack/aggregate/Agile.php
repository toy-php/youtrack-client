<?php

namespace youtrack\aggregate;

use youtrack\core\Aggregate;
use youtrack\core\Entity;

/**
 * Class Agile
 * @package youtrack\aggregate
 *
 * @property string $id
 * @property string $name
 * @property \youtrack\entity\Sprint[] $sprints
 * @property \youtrack\entity\Project[] $projects
 *
 */
class Agile extends Entity
{

    use Aggregate;

    /**
     * Имя ресурса агрегата
     * @return string
     */
    static public function resource(): string
    {
        return 'agiles/{id}';
    }
}