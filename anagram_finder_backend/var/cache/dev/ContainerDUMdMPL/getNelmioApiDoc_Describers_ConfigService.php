<?php

namespace ContainerDUMdMPL;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioApiDoc_Describers_ConfigService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'nelmio_api_doc.describers.config' shared service.
     *
     * @return \Nelmio\ApiDocBundle\Describer\ExternalDocDescriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/Describer/DescriberInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/Describer/ExternalDocDescriber.php';

        return $container->privates['nelmio_api_doc.describers.config'] = new \Nelmio\ApiDocBundle\Describer\ExternalDocDescriber(['info' => ['title' => 'Anagram API', 'description' => 'PHP Symfony based API', 'version' => '1.0.0'], 'components' => ['securitySchemes' => ['Bearer' => ['type' => 'http', 'scheme' => 'bearer', 'bearerFormat' => 'JWT']]], 'servers' => [['url' => 'http://localhost.com/unsafe', 'description' => 'API over HTTP']]]);
    }
}
