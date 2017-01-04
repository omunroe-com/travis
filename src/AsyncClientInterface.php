<?php declare(strict_types=1);

namespace ApiClients\Client\Travis;

use ApiClients\Client\Travis\CommandBus\Command;
use React\Promise\CancellablePromiseInterface;
use React\Promise\PromiseInterface;
use Rx\Observable;
use Rx\ObservableInterface;
use function ApiClients\Tools\Rx\unwrapObservableFromPromise;
use function React\Promise\resolve;

interface AsyncClientInterface
{
    /**
     * Fetch the given repository.
     * This will resolve a Resource\Async\Repository object.
     *
     * @param string $repository
     * @return CancellablePromiseInterface
     */
    public function repository(string $repository): CancellablePromiseInterface;

    /**
     * Fetch all the repositories linked to the authenticated user's account.
     * This will return a stream of Resource\Async\Repository objects.
     * (Requires auth token to be passed to the client!)
     *
     * @return ObservableInterface
     */
    public function repositories(): ObservableInterface;

    /**
     * Fetch information about the current authenticated user.
     * This will resolve a Resource\Async\User object.
     * (Requires auth token to be passed to the client!)
     *
     * @return PromiseInterface
     */
    public function user(): PromiseInterface;

    /**
     * Fetch the SSH key for the given repository ID.
     * This will resolve a Resource\Async\SSHKey object.
     * (Requires auth token to be passed to the client!)
     * (Only available on Travis Pro: https://travis-ci.com/)
     *
     * @param int $id
     * @return PromiseInterface
     */
    public function sshKey(int $id): PromiseInterface;

    /**
     * Fetch the list of available hooks.
     * Hooks represent whether a repository is active or not,
     * their ID's match that of the repository they represent.
     * This will return a stream of Resource\Async\Hook objects.
     * (Requires auth token to be passed to the client!)
     *
     * @return ObservableInterface
     */
    public function hooks(): ObservableInterface;

    /**
     * Fetch a stream of which users and orgs the currently authenticated user has access to.
     * This will return a stream of Resource\Async\Account objects.
     * (Requires auth token to be passed to the client!)
     *
     * @return ObservableInterface
     */
    public function accounts(): ObservableInterface;

    /**
     * Fetch a list of currently active broadcast. Used by the Travis team to spread news on the site.
     * This will return a stream of Resource\Async\Broadcast objects.
     * (Requires auth token to be passed to the client!)
     *
     * @return ObservableInterface
     */
    public function broadcasts(): ObservableInterface;
}
