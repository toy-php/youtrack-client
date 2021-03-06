<?php

namespace youtrack\aggregate;

use youtrack\core\Aggregate;
use youtrack\entity\Issue as BaseIssue;

class Issue extends BaseIssue
{

    use Aggregate;

    /**
     * Имя ресурса агрегата
     * @return string
     */
    static public function resource(): string
    {
        return 'issues/{id}';
    }
}