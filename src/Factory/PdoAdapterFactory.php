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
use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\PdoAdapter;

final class PdoAdapterFactory
{
    public function __invoke(ContainerInterface $container): PdoAdapter
    {
        $config = $container->get(CacheConfig::class);
        $pdo    = $container->get(\PDO::class);

        return new PdoAdapter(
            $pdo,
            $config->getNamespace(),
            $config->getDefaultLifetime(),
        );
    }
}
