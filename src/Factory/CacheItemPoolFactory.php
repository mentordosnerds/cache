<?php

declare(strict_types=1);

/**
 * This file is part of mentordosnerds/cache.
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 *
 * @link      https://github.com/mentordosnerds/cache
 * @copyright Copyright (c) 2024 Felipe Sayão Lobato Abreu <github@mentordosnerds.com>
 * @license   https://opensource.org/licenses/MIT MIT License
 */

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
