<?php

declare(strict_types=1);

namespace MentorDosNerds\Cache\Factory;

use MentorDosNerds\Cache\Config\CacheConfig;
use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\ArrayAdapter;

final class ArrayAdapterFactory
{
    public function __invoke(ContainerInterface $container): ArrayAdapter
    {
        $config = $container->get(CacheConfig::class);

        return new ArrayAdapter(
            $config->getDefaultLifetime()
        );
    }
}
