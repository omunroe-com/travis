<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Travis\Resource\Async;

use ApiClients\Client\Travis\ApiSettings;
use ApiClients\Client\Travis\Resource\RepositoryKey;
use ApiClients\Tools\ResourceTestUtilities\AbstractResourceTest;

class RepositoryKeyTest extends AbstractResourceTest
{
    public function getSyncAsync(): string
    {
        return 'Async';
    }

    public function getClass(): string
    {
        return RepositoryKey::class;
    }

    public function getNamespace(): string
    {
        return Apisettings::NAMESPACE;
    }
}
