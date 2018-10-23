<?php

namespace youtrack\entity;

use youtrack\core\Entity;

/**
 * Class Project
 * @package youtrack\entity
 *
 * @property bool $archived
 * @property User $createdBy
 * @property string $description
 * @property array $fields
 * @property string $fromEmail
 * @property string $hubResourceId
 * @property string $iconUrl
 * @property Issue[] $issues
 * @property User $leader
 * @property string $ringId
 * @property string $shortName
 * @property int $startingNumber
 * @property string $id
 * @property string $name
 *
 */
class Project extends Entity
{

}