<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerF1gNe7T\App_KernelTestDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerF1gNe7T/App_KernelTestDebugContainer.php') {
    touch(__DIR__.'/ContainerF1gNe7T.legacy');

    return;
}

if (!\class_exists(App_KernelTestDebugContainer::class, false)) {
    \class_alias(\ContainerF1gNe7T\App_KernelTestDebugContainer::class, App_KernelTestDebugContainer::class, false);
}

return new \ContainerF1gNe7T\App_KernelTestDebugContainer([
    'container.build_hash' => 'F1gNe7T',
    'container.build_id' => '32ffc0dc',
    'container.build_time' => 1749454793,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerF1gNe7T');
