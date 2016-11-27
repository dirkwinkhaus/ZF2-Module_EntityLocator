<?php
/**
 * Created by PhpStorm.
 * User: dirkwinkhaus
 * Date: 27.11.16
 * Time: 08:51
 */

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