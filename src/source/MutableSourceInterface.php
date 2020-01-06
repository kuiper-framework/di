<?php

namespace kuiper\di\source;

use kuiper\di\definition\DefinitionInterface;

/**
 * Describes a definition source to which we can add new definitions.
 */
interface MutableSourceInterface extends SourceInterface
{
    /**
     * @param string              $name
     * @param DefinitionInterface $definition
     */
    public function set($name, DefinitionInterface $definition);
}
