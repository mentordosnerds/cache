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
            static fn (string $factory) => new $factory(),
            $this->configProvider->getFactories()
        );

        $factories['config'] = [
            CacheConfig::class => $this->configProvider->getCacheConfig(),
        ];

        return $factories;
    }

    public function getExtensions()
    {
        return [];
    }
}
