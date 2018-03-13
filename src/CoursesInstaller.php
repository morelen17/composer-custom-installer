<?php
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 13.03.18
 * Time: 17:25
 */

namespace CoursesInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class CoursesInstaller extends LibraryInstaller
{
    public function supports($packageType)
    {
        return $packageType === 'courses-extension';
    }

    public function getInstallPath(PackageInterface $package)
    {
        $expectedPrefix = 'morelen17/courses-';
        $expectedPrefixLength = strlen($expectedPrefix);

        $prefix = substr($package->getPrettyName(), 0, $expectedPrefixLength);
        if ($expectedPrefix !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install ' . $package->getPrettyName() . ' '
                .'should always start their package name with '
                .$expectedPrefix
            );
        }

        return 'courses/'. substr($package->getPrettyName(), $expectedPrefixLength);
    }
}