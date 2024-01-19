<?php

declare(strict_types=1);

namespace MentorDosNerds\Cache\Factory;

use MentorDosNerds\Cache\Config\CacheConfig;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

final class CacheItemPoolFactory
{
    public function __invoke(ContainerInterface $container): CacheItemPoolInterface
    {
        $config        = $container->get(CacheConfig::class);
        $cacheItemPool = $container->get($config->getAdapter());

        if ($cacheItemPool instanceof LoggerAwareInterface && $container->has(LoggerInterface::class)) {
            $logger = $container->get(LoggerInterface::class);
            $cacheItemPool->setLogger($logger);
        }

        return $cacheItemPool;
    }
}
