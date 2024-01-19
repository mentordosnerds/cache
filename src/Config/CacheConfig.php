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

namespace MentorDosNerds\Cache\Config;

use Symfony\Component\Cache\Adapter\ArrayAdapter;

final class CacheConfig
{
    private string $adapter;

    private string $directory;

    private string $namespace;

    private int $defaultLifetime;

    public function __construct(
        string $adapter = ArrayAdapter::class,
        string $directory = '',
        string $namespace = '',
        int $defaultLifetime = 0
    ) {
        $this->adapter         = $adapter;
        $this->directory       = $directory;
        $this->namespace       = $namespace;
        $this->defaultLifetime = $defaultLifetime;
    }

    public function getAdapter(): string
    {
        return $this->adapter;
    }

    public function getDirectory(): string
    {
        return $this->directory;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getDefaultLifetime(): int
    {
        return $this->defaultLifetime;
    }
}
