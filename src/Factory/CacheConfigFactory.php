<?php

declare(strict_types=1);

namespace MentorDosNerds\Cache\Factory;

use Laminas\Config\Config;
use MentorDosNerds\Cache\Config\CacheConfig;
use Psr\Container\ContainerInterface;

final class CacheConfigFactory
{
    public function __invoke(ContainerInterface $container): CacheConfig
    {
        $config = $container->has('config') ? $container->get('config') : [];

        if (empty($config['cache']) && $container->has(Config::class)) {
            $config = $container->get(Config::class)->toArray();
        }

        return new CacheConfig(
            $config[CacheConfig::class]['adapter'] ?? '',
            $config[CacheConfig::class]['directory'] ?? '',
            $config[CacheConfig::class]['namespace'] ?? '',
            $config[CacheConfig::class]['defaultLifetime'] ?? 0,
        );
    }
}
