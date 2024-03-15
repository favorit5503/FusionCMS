<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace CodeIgniter\Exceptions;

/**
 * Model Exceptions.
 */
class ModelException extends FrameworkException
{
    /**
     * @return static
     */
    public static function forNoPrimaryKey(string $modelName)
    {
        return new static('"' . $modelName . '" model class does not specify a Primary Key.');
    }

    /**
     * @return static
     */
    public static function forNoDateFormat(string $modelName)
    {
        return new static('"' . $modelName . '" model class does not have a valid dateFormat.');
    }

    /**
     * @return static
     */
    public static function forMethodNotAvailable(string $modelName, string $methodName)
    {
        return new static('You cannot use "' . $modelName . '" in "' . $methodName . '". This is a method of the Query Builder Class.');
    }
}