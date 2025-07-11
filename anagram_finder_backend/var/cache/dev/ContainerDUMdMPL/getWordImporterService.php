<?php

namespace ContainerDUMdMPL;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getWordImporterService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Service\Import\WordImporter' shared autowired service.
     *
     * @return \App\Service\Import\WordImporter
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/Import/WordImporter.php';

        return $container->privates['App\\Service\\Import\\WordImporter'] = new \App\Service\Import\WordImporter(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['App\\Service\\Import\\Strategy\\CsvImportStrategy'] ??= new \App\Service\Import\Strategy\CsvImportStrategy());
            yield 1 => ($container->privates['App\\Service\\Import\\Strategy\\JsonImportStrategy'] ??= new \App\Service\Import\Strategy\JsonImportStrategy());
            yield 2 => ($container->privates['App\\Service\\Import\\Strategy\\TextImportStrategy'] ??= new \App\Service\Import\Strategy\TextImportStrategy());
        }, 3), ($container->services['doctrine.orm.default_entity_manager'] ?? $container->load('getDoctrine_Orm_DefaultEntityManagerService')));
    }
}
