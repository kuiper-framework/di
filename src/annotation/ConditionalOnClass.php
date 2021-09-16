<?php

/*
 * This file is part of the Kuiper package.
 *
 * (c) Ye Wenbin <wenbinye@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace kuiper\di\annotation;

use kuiper\di\Condition;
use Psr\Container\ContainerInterface;

/**
 * @Annotation
 * @Target({"CLASS", "METHOD", "ANNOTATION"})
 */
class ConditionalOnClass implements Condition
{
    /**
     * @var string
     */
    public $value;

    public function matches(ContainerInterface $container): bool
    {
        return class_exists($this->value) || interface_exists($this->value);
    }
}
