<?php

namespace youtrack\entity;

use youtrack\core\Entity;

/**
 * Class Sprint
 * @package youtrack\entity
 *
 * @property string $id
 * @property string $name
 * @property int $start
 * @property int $finish
 * @property Issue[] $issues
 *
 */
class Sprint extends Entity
{

}