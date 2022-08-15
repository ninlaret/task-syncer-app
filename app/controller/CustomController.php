<?php

namespace app\controller;

use core\App;
use core\controller\WebController;
use core\exception\ApiException;
use core\service\TaskService;

class CustomController extends WebController
{
    public function habiticaAction(): void
    {
        $webhookData = json_decode(file_get_contents("php://input"));
        if (!$webhookData || !isset($webhookData->task) || $webhookData->task->type !== 'todo') {
            App::$logger->log('Wrong task');
            return;
        }

        $service = TaskService::getInstance();

        $task = $service->find($webhookData->task->id, 'habitica');
        if (!$task) {
            return;
        }

        $task->setCompleted($webhookData->task->completed);
        $task->setName($webhookData->task->text);

        try {
            $service->syncWithTargets($task);
        } catch (ApiException $exception) {
            App::$logger->error('Habitica webhook error: ' . $exception->getMessage());
        }
    }
}
