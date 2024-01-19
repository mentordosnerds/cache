<?php

declare(strict_types=1);

namespace MentorDosNerds\Cache\Factory;

use Psr\Cache\CacheItemPoolInterface;
use Psr\Container\ContainerInterface;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Psr16Cache;

final class SimpleCacheFactory
{
    public function __invoke(ContainerInterface $container): CacheInterface
    {
        $cacheItemPool = $container->get(CacheItemPoolInterface::class);

        return new Psr16Cache($cacheItemPool);
    }
}
