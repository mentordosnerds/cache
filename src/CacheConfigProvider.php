<?php

declare(strict_types=1);

namespace MentorDosNerds\Cache;

use Psr\Cache\CacheItemPoolInterface;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Adapter;

final class CacheConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies'            => $this->getDependencies(),
            Config\CacheConfig::class => $this->getCacheConfig(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories' => $this->getFactories(),
        ];
    }

    public function getCacheConfig(): array
    {
        return [
            'adapter' => Adapter\ArrayAdapter::class,
            'namespace' => '',
            'default_lifetime' => 0,
            'directory' => '',
        ];
    }

    /**
     * @return string[]
     */
    public function getFactories(): array
    {
        return [
            Adapter\ArrayAdapter::class => Factory\ArrayAdapterFactory::class,
            Adapter\FilesystemAdapter::class => Factory\FilesystemAdapterFactory::class,
            Adapter\MemcachedAdapter::class => Factory\MemcachedAdapterFactory::class,
            Adapter\PdoAdapter::class => Factory\PdoAdapterFactory::class,
            Adapter\RedisAdapter::class => Factory\RedisAdapterFactory::class,
            CacheInterface::class => Factory\SimpleCacheFactory::class,
            CacheItemPoolInterface::class => Factory\CacheItemPoolFactory::class,
            Config\CacheConfig::class => Factory\CacheConfigFactory::class,
        ];
    }
}
