<?php

namespace ZF2\Module\EntityLocator\PluginManager;

/**
 * Class EntityLocatorProviderInterface
 *
 * @package ZF2\Module\EntityLocator\PluginManager
 */
interface EntityLocatorProviderInterface
{
    /**
     * @return array
     */
    public function getEntityLocatorConfig();
}