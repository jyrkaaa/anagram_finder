<?php

namespace ContainerF1gNe7T;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioApiDoc_ObjectModel_PropertyDescriberService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'nelmio_api_doc.object_model.property_describer' shared service.
     *
     * @return \Nelmio\ApiDocBundle\PropertyDescriber\PropertyDescriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/PropertyDescriber/PropertyDescriberInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/Describer/ModelRegistryAwareInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/Describer/ModelRegistryAwareTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/src/PropertyDescriber/PropertyDescriber.php';

        return $container->privates['nelmio_api_doc.object_model.property_describer'] = new \Nelmio\ApiDocBundle\PropertyDescriber\PropertyDescriber(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['nelmio_api_doc.object_model.property_describers.nullable'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\NullablePropertyDescriber());
            yield 1 => ($container->privates['nelmio_api_doc.object_model.property_describers.uuid'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\UuidPropertyDescriber());
            yield 2 => ($container->privates['nelmio_api_doc.object_model.property_describers.translatable'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\TranslatablePropertyDescriber());
            yield 3 => ($container->privates['nelmio_api_doc.object_model.property_describers.array'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\ArrayPropertyDescriber());
            yield 4 => ($container->privates['nelmio_api_doc.object_model.property_describers.dictionary'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\DictionaryPropertyDescriber());
            yield 5 => ($container->privates['nelmio_api_doc.object_model.property_describers.boolean'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\BooleanPropertyDescriber());
            yield 6 => ($container->privates['nelmio_api_doc.object_model.property_describers.float'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\FloatPropertyDescriber());
            yield 7 => ($container->privates['nelmio_api_doc.object_model.property_describers.integer'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\IntegerPropertyDescriber());
            yield 8 => ($container->privates['nelmio_api_doc.object_model.property_describers.string'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\StringPropertyDescriber());
            yield 9 => ($container->privates['nelmio_api_doc.object_model.property_describers.date_time'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\DateTimePropertyDescriber());
            yield 10 => ($container->privates['nelmio_api_doc.object_model.property_describers.object'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\ObjectPropertyDescriber());
            yield 11 => ($container->privates['nelmio_api_doc.object_model.property_describers.compound'] ??= new \Nelmio\ApiDocBundle\PropertyDescriber\CompoundPropertyDescriber());
        }, 12));
    }
}
