<?php

namespace Slimcms\Composer\Plugin;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class Installer extends LibraryInstaller
{
    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        return 'modules/' . substr($package->getPrettyName(), 23);
    }

    /**
     * @inheritDoc
     */
    public function supports($packageType)
    {
        return 'slimcms-module' === $packageType;
    }
}