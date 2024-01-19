<?php

declare(strict_types=1);

namespace MentorDosNerds\Cache\ServiceProvider;

use Interop\Container\ServiceProviderInterface;
use MentorDosNerds\Cache\CacheConfigProvider;
use MentorDosNerds\Cache\Config\CacheConfig;

final class CacheServiceProvider implements ServiceProviderInterface
{
    private CacheConfigProvider $configProvider;

    public function __construct()
    {
        $this->configProvider = new CacheConfigProvider();
    }

    public function getFactories()
    {
        $factories = array_map(
            fn (string $factory) => new $factory(),
            $this->configProvider->getFactories()
        );

        $factories['config'] = [
            CacheConfig::class => $this->configProvider->getCacheConfig()
        ];

        return $factories;
    }

    public function getExtensions()
    {
        return [];
    }
}