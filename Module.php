<?php

namespace ZF2\Module\EntityLocator;

use Zend\ModuleManager\Listener\ServiceListener;
use Zend\ModuleManager\ModuleManager;
use Zend\ServiceManager\ServiceManager;
use ZF2\Module\EntityLocator\PluginManager\EntityLocator;
use ZF2\Module\EntityLocator\PluginManager\EntityLocatorProviderInterface;

/**
 * Class Module
 *
 * @package ZF2\Module\EntityLocator
 */
class Module implements EntityLocatorProviderInterface
{

    /**
     * @param ModuleManager $moduleManager
     */
    public function init(ModuleManager $moduleManager)
    {
        /** @var ServiceManager $serviceManager */
        $serviceManager = $moduleManager->getEvent()->getParam('ServiceManager');

        /** @var ServiceListener $serviceListener */
        $serviceListener = $serviceManager->get('ServiceListener');

        $serviceListener->addServiceManager(
            EntityLocator::class,
            'entity_locator',
            EntityLocatorProviderInterface::class,
            'getEntityLocatorConfig'
        );
    }

    /**
     * @return array
     */
    public function getServiceConfig()
    {

        return [
            'factories' => [
                \ZF2\Module\EntityLocator\PluginManager\EntityLocator::class =>
                    \ZF2\Module\EntityLocator\PluginManager\Factory\EntityLocatorFactory::class,
            ],
        ];
    }

    /**
     * Get module config.
     *
     * @return mixed
     */
    public function getConfig()
    {

        return [];
    }

    /**
     * @return array
     */
    public function getEntityLocatorConfig()
    {

        return [];
    }
}
