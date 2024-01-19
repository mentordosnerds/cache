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
