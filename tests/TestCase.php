<?php

/**
 * This file is part of Spiral Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Spiral\Tests\Attributes;

use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * @group unit
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * @param \Traversable|array $iterable
     * @return array
     */
    protected function iterableToArray(iterable $iterable): array
    {
        if ($iterable instanceof \Traversable) {
            return \iterator_to_array($iterable, false);
        }

        return $iterable;
    }

    /**
     * @param string $class
     * @return string
     */
    protected function classNamespace(string $class): string
    {
        return \dirname(\str_replace('\\', \DIRECTORY_SEPARATOR, $class));
    }

    /**
     * @param string $class
     * @param array $fields
     * @return object
     */
    protected function newAnnotation(string $class, array $fields = []): object
    {
        $instance = new $class();

        foreach ($fields as $field => $value) {
            $instance->$field = $value;
        }

        return $instance;
    }
}
