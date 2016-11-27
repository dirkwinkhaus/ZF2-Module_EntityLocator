ZF2 Module EntityLocator
========================

Configuration
-------------
Copy the configuration file "config/zf2_entity_locator_config.global.php.dist" to your
project config folder and remove the ".dist".

For setup entity configuration insert this in your module config:

    'entity_locator' => [
        'factories' => [
            // insert entity factories
        ],
        'invokables' => [
            // insert entity invokables
        ],
    
Usage
-----
Get the entity locator from the service factory by
 
    $entityLocator = $serviceLocator->get(\ZF2\Module\EntityLocator\PluginManager\EntityLocator::class);
    
