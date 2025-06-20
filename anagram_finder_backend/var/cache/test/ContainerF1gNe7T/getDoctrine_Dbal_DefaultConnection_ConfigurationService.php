<?php

namespace ContainerF1gNe7T;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_Dbal_DefaultConnection_ConfigurationService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'doctrine.dbal.default_connection.configuration' shared service.
     *
     * @return \Doctrine\DBAL\Configuration
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/dbal/src/Configuration.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/dbal/src/Schema/SchemaManagerFactory.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/dbal/src/Schema/LegacySchemaManagerFactory.php';

        $container->privates['doctrine.dbal.default_connection.configuration'] = $instance = new \Doctrine\DBAL\Configuration();

        $instance->setSchemaManagerFactory(($container->privates['doctrine.dbal.legacy_schema_manager_factory'] ??= new \Doctrine\DBAL\Schema\LegacySchemaManagerFactory()));
        $instance->setSchemaAssetsFilter(($container->privates['doctrine.dbal.default_schema_asset_filter_manager'] ?? $container->load('getDoctrine_Dbal_DefaultSchemaAssetFilterManagerService')));
        $instance->setMiddlewares([($container->privates['doctrine.dbal.debug_middleware.default'] ?? $container->load('getDoctrine_Dbal_DebugMiddleware_DefaultService')), ($container->privates['doctrine.dbal.idle_connection_middleware.default'] ?? $container->load('getDoctrine_Dbal_IdleConnectionMiddleware_DefaultService'))]);

        return $instance;
    }
}
