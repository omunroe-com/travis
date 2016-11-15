<?php
declare(strict_types=1);

namespace WyriHaximus\Travis\Resource\Sync;

use WyriHaximus\ApiClient\Resource\CallAsyncTrait;
use WyriHaximus\Travis\Resource\Repository as BaseRepository;
use function Clue\React\Block\await;
use function React\Promise\resolve;
use WyriHaximus\Travis\Resource\SettingsInterface;
use WyriHaximus\Travis\Resource\RepositoryKeyInterface;

class Repository extends BaseRepository
{
    use CallAsyncTrait;

    /**
     * @return array
     */
    public function builds(): array
    {
        return $this->wait($this->observableToPromise($this->callAsync('builds')->toArray()));
    }

    /**
     * @param int $id
     * @return Build
     */
    public function build(int $id): Build
    {
        return $this->wait($this->callAsync('build', $id));
    }

    /**
     * @return array
     */
    public function commits(): array
    {
        return $this->wait($this->observableToPromise($this->callAsync('commits')->toArray()));
    }

    /**
     * @return SettingsInterface
     */
    public function settings(): SettingsInterface
    {
        return $this->wait($this->callAsync('settings'));
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->wait($this->callAsync('isActive'));
    }

    /**
     * @return Repository
     */
    public function enable(): Repository
    {
        return $this->wait($this->callAsync('enable'));
    }

    /**
     * @return Repository
     */
    public function disable(): Repository
    {
        return $this->wait($this->callAsync('disable'));
    }

    /**
     * @return array
     */
    public function branches(): array
    {
        return $this->wait($this->observableToPromise($this->callAsync('branches')->toArray()));
    }

    /**
     * @return array
     */
    public function vars(): array
    {
        return $this->wait($this->observableToPromise($this->callAsync('vars')->toArray()));
    }

    /**
     * @return array
     */
    public function caches(): array
    {
        return $this->wait($this->observableToPromise($this->callAsync('caches')->toArray()));
    }

    /**
     * @return RepositoryKeyInterface
     */
    public function key(): RepositoryKeyInterface
    {
        return $this->wait($this->callAsync('key'));
    }

    /**
     * @return Repository
     */
    public function refresh(): Repository
    {
        return $this->wait($this->callAsync('refresh'));
    }
}
