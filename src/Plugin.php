<?php

declare(strict_types=1);

namespace Slimcms\Composer\Plugin;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * Class Plugin
 * @package Slimcms\Composer\Plugin
 */
class Plugin implements PluginInterface
{
    /**
     * @inheritDoc
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new Installer($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}