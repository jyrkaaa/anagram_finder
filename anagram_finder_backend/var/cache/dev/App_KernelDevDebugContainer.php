<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDhQsBEq\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDhQsBEq/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerDhQsBEq.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerDhQsBEq\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerDhQsBEq\App_KernelDevDebugContainer([
    'container.build_hash' => 'DhQsBEq',
    'container.build_id' => '288ad56f',
    'container.build_time' => 1749552250,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerDhQsBEq');
