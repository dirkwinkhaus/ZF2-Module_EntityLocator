<?php

namespace ZF2\Module\EntityLocator\PluginManager;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;

/**
 * Class EntityLocator
 *
 * @package ZF2\Module\EntityLocator\PluginManager
 */
class EntityLocator extends AbstractPluginManager
{
    /**
     * @var bool
     */
    protected $validateEntities;

    /**
     * @var string
     */
    protected $allowedClassOrStringName;

    /**
     * Validate the plugin
     *
     * Checks that the filter loaded is either a valid callback or an instance
     * of FilterInterface.
     *
     * @param  mixed $plugin
     *
     * @return void
     * @throws Exception\RuntimeException if invalid
     */
    public function validatePlugin($plugin)
    {
        if ($this->validateEntities) {
            if (!is_subclass_of($plugin, $this->allowedClassOrStringName)) {
                throw new Exception\RuntimeException('Entity "' . get_class($plugin) . '" not a valid entity. Valid entities implement ' . EntityValidatorInterface::class);
            }
        }
    }

    /**
     * @param string $allowedClassOrStringName
     *
     * @return EntityLocator
     */
    public function setAllowedClassOrStringName($allowedClassOrStringName)
    {
        $this->allowedClassOrStringName = $allowedClassOrStringName;

        return $this;
    }

    /**
     * @param boolean $validateEntities
     *
     * @return EntityLocator
     */
    public function setValidateEntities($validateEntities)
    {
        $this->validateEntities = $validateEntities;

        return $this;
    }
}