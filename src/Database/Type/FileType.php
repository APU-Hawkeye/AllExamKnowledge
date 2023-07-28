<?php
declare(strict_types=1);

namespace App\Database\Type;

use Cake\Database\Type;

/**
 * Class FileType
 *
 * @package App\Database\Type
 */
class FileType extends Type\BaseType
{
    /**
     * @param mixed $value Passed upload array
     * @return mixed
     */
    public function marshal($value)
    {
        return $value;
    }

    /**
     * @param mixed $value Mixed Arg
     * @param \Cake\Database\DriverInterface $driver DriverInstance
     * @return mixed
     */
    public function toDatabase($value, \Cake\Database\DriverInterface $driver)
    {
        return $value;
    }

    /**
     * @param mixed $value Mixed Arg
     * @param \Cake\Database\DriverInterface $driver DriverInstance
     * @return mixed
     */
    public function toPHP($value, \Cake\Database\DriverInterface $driver)
    {
        return $value;
    }
}
