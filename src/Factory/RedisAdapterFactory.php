<?php

declare(strict_types=1);

namespace MentorDosNerds\Cache\Factory;

use MentorDosNerds\Cache\Config\CacheConfig;
use Psr\Container\ContainerInterface;
use Redis;
use Symfony\Component\Cache\Adapter\RedisAdapter;

final class RedisAdapterFactory
{
    public function __invoke(ContainerInterface $container): RedisAdapter
    {
        $config = $container->get(CacheConfig::class);
        $redis  = $container->get(Redis::class);

        return new RedisAdapter(
            $redis,
            $config->getNamespace(),
            $config->getDefaultLifetime(),
        );
    }
}
