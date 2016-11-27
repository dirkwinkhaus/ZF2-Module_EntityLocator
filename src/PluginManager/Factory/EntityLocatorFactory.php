<?php

namespace ZF2\Module\EntityLocator\PluginManager\Factory;

use Zend\Mvc\Service\AbstractPluginManagerFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF2\Module\EntityLocator\PluginManager\EntityLocator;
use ZF2\Module\EntityLocator\PluginManager\MissingConfigurationException;

/**
 * Class EntityLocatorFactory
 *
 * @package ZF2\Module\EntityLocator\PluginManager\Factory
 */
class EntityLocatorFactory extends AbstractPluginManagerFactory
{
    /**
     * @var string
     */
    const PLUGIN_MANAGER_CLASS = EntityLocator::class;

    /**
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return EntityLocator
     * @throws MissingConfigurationException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (
            isset($config['zf2'])
            && isset($config['zf2']['entity_locator'])
            && isset($config['zf2']['entity_locator']['validate_entities'])
            && isset($config['zf2']['entity_locator']['entities_should_be_or_contain'])
        ) {
            $validateEntities        = $config['zf2']['entity_locator']['validate_entities'];
            $allowedClassOrInterface = $config['zf2']['entity_locator']['entities_should_be_or_contain'];

            /** @var EntityLocator $entityLocator */
            $entityLocator = parent::createService($serviceLocator);

            $entityLocator->setAllowedClassOrStringName($allowedClassOrInterface);
            $entityLocator->setValidateEntities($validateEntities);

            return $entityLocator;
        }

        throw new MissingConfigurationException('Missing configuration for entity locator. See readme.');
    }
}