<?php

namespace ContainerDUMdMPL;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getWordImportControllerimportService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.TckZ.0d.App\Controller\WordImportController::import()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.TckZ.0d.App\\Controller\\WordImportController::import()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'importer' => ['privates', 'App\\Service\\Import\\WordImporter', 'getWordImporterService', true],
        ], [
            'importer' => 'App\\Service\\Import\\WordImporter',
        ]))->withContext('App\\Controller\\WordImportController::import()', $container);
    }
}
