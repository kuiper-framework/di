<?php

namespace kuiper\di\resolver;

use InvalidArgumentException;
use kuiper\di\ContainerInterface;
use kuiper\di\definition\EnvDefinition;
use kuiper\di\DefinitionEntry;
use kuiper\di\source\EnvSource;

class EnvResolver implements ResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function resolve(ContainerInterface $container, DefinitionEntry $entry, $parameters = [])
    {
        $definition = $entry->getDefinition();
        if (!$definition instanceof EnvDefinition) {
            throw new InvalidArgumentException(sprintf(
                'definition expects a %s, got %s',
                EnvDefinition::class,
                is_object($definition) ? get_class($definition) : gettype($definition)
            ));
        }
        $value = EnvSource::findEnvironmentVariable($definition->getName());

        return false === $value ? $definition->getDefaultValue() : $value;
    }
}
