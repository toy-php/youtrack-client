<?php

namespace youtrack\aggregate;

use youtrack\core\Aggregate;
use youtrack\entity\IssueAttachment;
use youtrack\entity\Project;

/**
 * Class Issue
 * @package youtrack\aggregate
 *
 * @property string $id
 * @property string $description
 * @property string $summary
 *
 * @property IssueAttachment $attachments
 * @property Project $project
 *
 */
class Issue extends Aggregate
{

    /**
     * Имя ресурса агрегата
     * @return string
     */
    static public function resource(): string
    {
        return 'issues';
    }
}