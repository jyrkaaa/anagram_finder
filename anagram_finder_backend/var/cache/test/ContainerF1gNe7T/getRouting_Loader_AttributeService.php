<?php

namespace ContainerF1gNe7T;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRouting_Loader_AttributeService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'routing.loader.attribute' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\AttributeRouteControllerLoader
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/config/Loader/LoaderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/routing/Loader/AttributeClassLoader.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Routing/AttributeRouteControllerLoader.php';

        return $container->privates['routing.loader.attribute'] = new \Symfony\Bundle\FrameworkBundle\Routing\AttributeRouteControllerLoader('test');
    }
}
