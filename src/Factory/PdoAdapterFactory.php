<?php

declare(strict_types=1);

namespace MentorDosNerds\Cache\Factory;

use MentorDosNerds\Cache\Config\CacheConfig;
use PDO;
use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\PdoAdapter;

final class PdoAdapterFactory
{
    public function __invoke(ContainerInterface $container): PdoAdapter
    {
        $config = $container->get(CacheConfig::class);
        $pdo    = $container->get(PDO::class);

        return new PdoAdapter(
            $pdo,
            $config->getNamespace(),
            $config->getDefaultLifetime(),
        );
    }
}
