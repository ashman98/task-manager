<?php

namespace App\Models\Base\Traits;

use Exception;
use Illuminate\Support\Str;
use ReflectionClass;

trait ModelHelperFunctions
{
    /**
     * Function to get model class name.
     */
    public static function getClassName(): string
    {
        return lcfirst(Str::snake(class_basename(static::class)));
    }

    /**
     * Function to get model class name camel case.
     */
    public static function getClassNameCamelCase(): string
    {
        return Str::camel(class_basename(static::class));
    }

    /**
     * Function to get class namespace.
     */
    public function getClassNamespace(): string
    {
        $namespace = new ReflectionClass(static::class);

        return $namespace->getNamespaceName();
    }

    /**
     * Function to get table name.
     */
    public static function getTableName(): string
    {
        return (new static())->getTable();
    }
}
