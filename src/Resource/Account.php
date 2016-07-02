<?php
declare(strict_types=1);

namespace WyriHaximus\Travis\Resource;

use WyriHaximus\ApiClient\Resource\TransportAwareTrait;

abstract class Account implements AccountInterface
{
    use TransportAwareTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $login;

    /**
     * @var int
     */
    protected $repos_count;

    /**
     * @return int
     */
    public function id() : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name() : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function type() : string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function login() : string
    {
        return $this->login;
    }

    /**
     * @return int
     */
    public function reposCount() : int
    {
        return $this->repos_count;
    }
}