<?php

declare(strict_types=1);

namespace MentorDosNerds\Cache\Factory;

use Memcached;
use MentorDosNerds\Cache\Config\CacheConfig;
use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\MemcachedAdapter;

final class MemcachedAdapterFactory
{
    public function __invoke(ContainerInterface $container): MemcachedAdapter
    {
        $config    = $container->get(CacheConfig::class);
        $memcached = $container->get(Memcached::class);

        return new MemcachedAdapter(
            $memcached,
            $config->getNamespace(),
            $config->getDefaultLifetime(),
        );
    }
}
