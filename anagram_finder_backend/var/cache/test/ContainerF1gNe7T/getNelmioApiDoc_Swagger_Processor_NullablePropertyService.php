<?php

namespace ContainerF1gNe7T;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioApiDoc_Swagger_Processor_NullablePropertyService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'nelmio_api_doc.swagger.processor.nullable_property' shared service.
     *
     * @return \Nelmio\ApiDocBundle\Processor\NullablePropertyProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/Processor/NullablePropertyProcessor.php';

        return $container->privates['nelmio_api_doc.swagger.processor.nullable_property'] = new \Nelmio\ApiDocBundle\Processor\NullablePropertyProcessor();
    }
}
