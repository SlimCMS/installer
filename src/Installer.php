<?php

declare(strict_types=1);

namespace Slimcms\Composer\Plugin;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

/**
 * Class Installer
 * @package Slimcms\Composer\Plugin
 */
class Installer extends LibraryInstaller
{
    protected $supportTypes = [
        'slimcms-module' => 'modules',
        'slimcms-theme' => 'theme',
    ];

    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        $root = dirname($this->composer->getConfig()->get('vendor-dir'));
        $catalog = $this->supportTypes[$package->getType()];
        $namePackage = $package->getPrettyName();
        $path = "$root/$catalog/$namePackage";
        return $path;
    }

    /**
     * @inheritDoc
     */
    public function supports($packageType)
    {
        return array_key_exists($packageType, $this->supportTypes);
    }
}
