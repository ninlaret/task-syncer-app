<?php

namespace app\system;

use core\system\NotionApiSystem;

/**
 *
 */
class CustomNotion extends NotionApiSystem
{
    /**
     * @var string
     */
    protected string $databaseId = 'your_db_id';
}