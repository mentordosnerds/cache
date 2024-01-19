<?php

declare(strict_types=1);

namespace MentorDosNerds\Cache\Config;

use Symfony\Component\Cache\Adapter\ArrayAdapter;

final class CacheConfig
{
    private string $adapter;
    private string $directory;
    private string $namespace;
    private int $defaultLifetime;

    public function __construct(
        string $adapter = ArrayAdapter::class,
        string $directory = '',
        string $namespace = '',
        int $defaultLifetime = 0
    ) {
        $this->adapter = $adapter;
        $this->directory = $directory;
        $this->namespace = $namespace;
        $this->defaultLifetime = $defaultLifetime;
    }

    public function getAdapter(): string
    {
        return $this->adapter;
    }

    public function getDirectory(): string
    {
        return $this->directory;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getDefaultLifetime(): int
    {
        return $this->defaultLifetime;
    }
}
