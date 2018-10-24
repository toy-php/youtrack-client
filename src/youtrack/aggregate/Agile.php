<?php

namespace youtrack\aggregate;

use youtrack\core\Aggregate;
use youtrack\core\Entity;
use youtrack\entity\Issue;
use youtrack\entity\Project;
use youtrack\entity\Sprint;

/**
 * Class Agile
 * @package youtrack\aggregate
 *
 * @property string $id
 * @property string $name
 * @property Sprint[] $sprints
 * @property Project[] $projects
 * @property Issue[] $issues
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