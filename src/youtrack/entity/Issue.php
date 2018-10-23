<?php

namespace youtrack\entity;

use youtrack\core\Entity;

/**
 * Class Issue
 * @package youtrack\entity
 *
 * @property IssueAttachment[] $attachments
 * @property IssueComment[] $comments
 * @property int $created
 * @property string $description
 * @property DraftIssueComment $draftComment
 * @property User $draftOwner
 * @property ExternalIssue $externalIssue
 * @property array $fields
 * @property string $idReadable
 * @property bool $isDraft
 * @property IssueLink[] $links
 * @property int $numberInProject
 * @property IssueLink $parent
 * @property Project $project
 * @property User $reporter
 * @property int $resolved
 * @property IssueLink $subtasks
 * @property string $summary
 * @property IssueTag[] $tags
 * @property int $updated
 * @property User $updater
 * @property bool $usesMarkdown
 * @property Visibility $visibility
 * @property IssueVoters $voters
 * @property int $votes
 * @property IssueWatchers $watchers
 * @property string $wikifiedDescription
 * @property string $id
 *
 */
class Issue extends Entity
{

}