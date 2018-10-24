<?php

namespace youtrack\aggregate;

use youtrack\core\Aggregate;
use youtrack\core\Entity;
use youtrack\entity\Issue;
use youtrack\entity\IssueTimeTracker;
use youtrack\entity\PeriodValue;
use youtrack\entity\User;
use youtrack\entity\WorkItemType;

/**
 * Class TimeTracking
 * @package youtrack\aggregate
 *
 * @property int $created
 * @property int $date
 * @property PeriodValue $duration
 * @property Issue $issue
 * @property int $updated
 * @property User $author
 * @property User $creator
 * @property string $id
 * @property IssueTimeTracker $issueTimeTracker
 * @property string $text
 * @property string $textPreview
 * @property WorkItemType $type
 * @property bool $usesMarkdown
 *
 */
class TimeTracking extends Entity
{

    use Aggregate;

    /**
     * Имя ресурса агрегата
     * @return string
     */
    static public function resource(): string
    {
        return 'issues/{issueId}/timeTracking/workItems/{id}';
    }

}