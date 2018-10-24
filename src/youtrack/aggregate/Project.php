<?php

namespace youtrack\aggregate;

use youtrack\core\Aggregate;
use youtrack\entity\Project as BaseProject;

class Project extends BaseProject
{

    use Aggregate;

    /**
     * Имя ресурса агрегата
     * @return string
     */
    static public function resource(): string
    {
        return 'admin/projects/{id}';
    }
}