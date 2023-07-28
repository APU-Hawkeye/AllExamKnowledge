<?php
declare(strict_types=1);

namespace App\Service\Storage;


use Aws\S3\S3Client;
use Cake\Core\StaticConfigTrait;
use Cake\Utility\Hash;
use InvalidArgumentException;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemAdapter;
use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use League\Flysystem\Local\LocalFilesystemAdapter;
use ReflectionClass;

class Storage
{
    use StaticConfigTrait;

    const INVALID_ARGUMENT_MSG = 'Filesystem "%s" has no client or factory or parameters specific to build a client';

    /**
     * An array mapping url schemes to fully qualified driver class names
     *
     * @return array
     */
    protected static array $_dsnClassMap = [
        's3' => AwsS3V3Adapter::class,
        'local' => LocalFilesystemAdapter::class,
        'memory' => InMemoryFilesystemAdapter::class
    ];

    protected static array $_clientClassMap = [
        's3' => S3Client::class
    ];

    protected static array $_clientConfigKeyMap = [
        's3' => [
            'username' => 'credentials.key',
            'password' => 'credentials.secret',
            'region' => 'region',
            'version' => 'version',
        ]
    ];

    protected static array $_adapterConfigKeyMap = [
        's3' => [
            'client',
            'host'
        ],
        'local' => [
            'path'
        ]
    ];


    /**
     * @param string $scheme
     * @param array $clientConstructorArguments
     * @return object|null
     * @throws \ReflectionException
     */
    protected static function buildClient(string $scheme, array $clientConstructorArguments = []): ?object
    {
        if (isset(self::$_clientClassMap[$scheme])) {
            $class = new ReflectionClass(self::$_clientClassMap[$scheme]);
            return $class->newInstance($clientConstructorArguments);
        }
        return null;
    }

    /**
     * @param string $dsn
     * @return FilesystemAdapter
     * @throws \ReflectionException
     */
    protected static function adapterFromDsn(string $dsn) : FilesystemAdapter
    {
        $configuration = static::parseDsn($dsn);
        $adapterClassFqdn = self::$_dsnClassMap[$configuration["scheme"]] ?? null;
        if (is_null($adapterClassFqdn)) {
            throw new InvalidArgumentException(sprintf(self::INVALID_ARGUMENT_MSG, $configuration["scheme"]));
        }
        $clientConstructorArguments = self::$_clientConfigKeyMap[$configuration["scheme"]] ?? [];
        $clientConstructorArguments = array_flip($clientConstructorArguments);
        foreach ($clientConstructorArguments as $key => $value) {
            $clientConstructorArguments[$key] = $configuration[$value];
        }
        $client = self::buildClient($configuration["scheme"], Hash::expand($clientConstructorArguments));
        if (($configuration["path"] ?? "") === "/files") {
            $configuration["path"] = WWW_ROOT.'/files';
        }
        $adapterConstructorArguments = self::$_adapterConfigKeyMap[$configuration["scheme"]] ?? [];
        foreach ($adapterConstructorArguments as $key => $value) {
            if ($value === "client") {
                $adapterConstructorArguments[$key] = $client;
            } else {
                $adapterConstructorArguments[$key] = $configuration[$value] ?? null;
            }
        }
        $adapterClass = new ReflectionClass($adapterClassFqdn);
        /** @var FilesystemAdapter $adapter */
        $adapter = $adapterClass->newInstanceArgs($adapterConstructorArguments);
        return $adapter;
    }

    /**
     * @param string $dsn
     * @return Filesystem
     * @throws \ReflectionException
     */
    public static function getStorage(string $dsn)
    {
        $adapter = self::adapterFromDsn($dsn);
        return new Filesystem($adapter);
    }

}
