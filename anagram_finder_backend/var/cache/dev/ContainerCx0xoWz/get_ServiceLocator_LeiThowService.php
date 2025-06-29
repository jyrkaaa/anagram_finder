<?php

namespace ContainerCx0xoWz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_LeiThowService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.leiThow' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.leiThow'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Controller\\AnagramController::findAnagram' => ['privates', '.service_locator.zN9ngJz.App\\Controller\\AnagramController::findAnagram()', 'getAnagramControllerfindAnagramService', true],
            'App\\Controller\\WordImportController::import' => ['privates', '.service_locator.TckZ.0d.App\\Controller\\WordImportController::import()', 'getWordImportControllerimportService', true],
            'App\\Controller\\WordImportController::importJson' => ['privates', '.service_locator.YSugF_d.App\\Controller\\WordImportController::importJson()', 'getWordImportControllerimportJsonService', true],
            'App\\Controller\\WordImportController::deleteDb' => ['privates', '.service_locator.zN9ngJz.App\\Controller\\WordImportController::deleteDb()', 'getWordImportControllerdeleteDbService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.zHyJIs5.kernel::registerContainerConfiguration()', 'get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.zHyJIs5.kernel::loadRoutes()', 'get_ServiceLocator_ZHyJIs5_KernelloadRoutesService', true],
            'App\\Controller\\AnagramController:findAnagram' => ['privates', '.service_locator.zN9ngJz.App\\Controller\\AnagramController::findAnagram()', 'getAnagramControllerfindAnagramService', true],
            'App\\Controller\\WordImportController:import' => ['privates', '.service_locator.TckZ.0d.App\\Controller\\WordImportController::import()', 'getWordImportControllerimportService', true],
            'App\\Controller\\WordImportController:importJson' => ['privates', '.service_locator.YSugF_d.App\\Controller\\WordImportController::importJson()', 'getWordImportControllerimportJsonService', true],
            'App\\Controller\\WordImportController:deleteDb' => ['privates', '.service_locator.zN9ngJz.App\\Controller\\WordImportController::deleteDb()', 'getWordImportControllerdeleteDbService', true],
        ], [
            'kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Controller\\AnagramController::findAnagram' => '?',
            'App\\Controller\\WordImportController::import' => '?',
            'App\\Controller\\WordImportController::importJson' => '?',
            'App\\Controller\\WordImportController::deleteDb' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:loadRoutes' => '?',
            'App\\Controller\\AnagramController:findAnagram' => '?',
            'App\\Controller\\WordImportController:import' => '?',
            'App\\Controller\\WordImportController:importJson' => '?',
            'App\\Controller\\WordImportController:deleteDb' => '?',
        ]);
    }
}
