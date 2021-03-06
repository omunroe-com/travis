<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Travis\CommandBus\Handler;

use ApiClients\Client\Travis\CommandBus\Command\SettingsCommand;
use ApiClients\Client\Travis\CommandBus\Handler\SettingsHandler;
use ApiClients\Client\Travis\Resource\SettingsInterface;
use ApiClients\Tools\Services\Client\FetchAndHydrateService;
use ApiClients\Tools\TestUtilities\TestCase;

final class SettingsHandlerTest extends TestCase
{
    public function testRepositoryKey()
    {
        $command = new SettingsCommand(123);
        $service = $this->prophesize(FetchAndHydrateService::class);
        $service->fetch('repos/123/settings', 'settings', SettingsInterface::HYDRATE_CLASS)->shouldBeCalled();
        $handler = new SettingsHandler($service->reveal());
        $handler->handle($command);
    }
}
