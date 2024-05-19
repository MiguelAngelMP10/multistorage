<?php
namespace MiguelAngelMP10\Multistorage\Storages;

use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

class AzureStorage implements StorageInterface {
    private $blobClient;
    private $containerName;

    public function __construct(string $connectionString, string $containerName) {
        $this->blobClient = BlobRestProxy::createBlobService($connectionString);
        $this->containerName = $containerName;
    }

    public function writeFile(string $filename, string $content): bool {
        try {
            $this->blobClient->createBlockBlob($this->containerName, $filename, $content);
            return true;
        } catch (ServiceException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
