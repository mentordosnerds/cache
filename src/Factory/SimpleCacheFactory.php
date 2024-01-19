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
