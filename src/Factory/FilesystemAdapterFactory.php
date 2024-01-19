<?php

declare(strict_types=1);

namespace MentorDosNerds\Cache\Factory;

use MentorDosNerds\Cache\Config\CacheConfig;
use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

final class FilesystemAdapterFactory
{
    public function __invoke(ContainerInterface $container): FilesystemAdapter
    {
        $config = $container->get(CacheConfig::class);

        return new FilesystemAdapter(
            $config->getNamespace(),
            $config->getDefaultLifetime(),
            $config->getDirectory(),
        );
    }
}
