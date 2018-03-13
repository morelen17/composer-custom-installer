<?php
/**
 * Created by PhpStorm.
 * User: lenar
 * Date: 13.03.18
 * Time: 17:25
 */

namespace CoursesInstaller;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class CoursesPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $composer->getInstallationManager()->addInstaller(new CoursesInstaller($io, $composer));
    }
}