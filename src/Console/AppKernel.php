<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console;

use OpenEuropa\EPoetry\Console\DependencyInjection\CompilerPass\CommandsToApplicationCompilerPass;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class AppKernel extends Kernel
{
    /**
     * @inheritDoc
     */
    public function registerBundles(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(__DIR__ . '/../../config/console/services.yml');
    }

    /**
     * @inheritDoc
     */
    protected function build(ContainerBuilder $containerBuilder): void
    {
        $containerBuilder->addCompilerPass(new CommandsToApplicationCompilerPass());
    }
}
