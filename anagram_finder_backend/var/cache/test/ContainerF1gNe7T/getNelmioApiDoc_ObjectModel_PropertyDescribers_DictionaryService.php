<?php

namespace ContainerF1gNe7T;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioApiDoc_ObjectModel_PropertyDescribers_DictionaryService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'nelmio_api_doc.object_model.property_describers.dictionary' shared service.
     *
     * @return \Nelmio\ApiDocBundle\PropertyDescriber\DictionaryPropertyDescriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/PropertyDescriber/PropertyDescriberInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/Describer/ModelRegistryAwareInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/PropertyDescriber/PropertyDescriberAwareInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/Describer/ModelRegistryAwareTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/PropertyDescriber/PropertyDescriberAwareTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/PropertyDescriber/DictionaryPropertyDescriber.php';

        return $container->privates['nelmio_api_doc.object_model.property_describers.dictionary'] = new \Nelmio\ApiDocBundle\PropertyDescriber\DictionaryPropertyDescriber();
    }
}
