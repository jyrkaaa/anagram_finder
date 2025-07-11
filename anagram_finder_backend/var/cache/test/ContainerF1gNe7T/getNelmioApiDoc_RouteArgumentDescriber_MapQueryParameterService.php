<?php

namespace ContainerF1gNe7T;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioApiDoc_RouteArgumentDescriber_MapQueryParameterService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'nelmio_api_doc.route_argument_describer.map_query_parameter' shared service.
     *
     * @return \Nelmio\ApiDocBundle\RouteDescriber\RouteArgumentDescriber\SymfonyMapQueryParameterDescriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/RouteDescriber/RouteArgumentDescriber/RouteArgumentDescriberInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/zircote/swagger-php/src/Processors/Concerns/TypesTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/RouteDescriber/RouteArgumentDescriber/SymfonyMapQueryParameterDescriber.php';

        return $container->privates['nelmio_api_doc.route_argument_describer.map_query_parameter'] = new \Nelmio\ApiDocBundle\RouteDescriber\RouteArgumentDescriber\SymfonyMapQueryParameterDescriber();
    }
}
