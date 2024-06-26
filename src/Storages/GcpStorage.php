<?php

namespace MiguelAngelMP10\Multistorage\Storages;

use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;
use Google\Cloud\Storage\StorageClient;

class GcpStorage implements StorageInterface
{
    private StorageClient $storageClient;
    private string $bucketName;
    private ?string $filePath = null;

    public function __construct(string $bucketName, string $keyFilePath)
    {
        $this->storageClient = new StorageClient([
            'keyFilePath' => $keyFilePath,
        ]);
        $this->bucketName = $bucketName;
    }

    public function writeFile(string $filename, string $content): bool
    {
        try {
            $bucket = $this->storageClient->bucket($this->bucketName);
            $object = $bucket->upload($content, [
                'name' => $filename
            ]);
            $this->filePath = $object->info()['selfLink'];
            return true;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }
}
