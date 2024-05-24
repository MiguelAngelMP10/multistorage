<?php

namespace MiguelAngelMP10\Multistorage\Storages;

use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

class AzureStorage implements StorageInterface
{
    private BlobRestProxy $blobClient;
    private string $containerName;
    private ?string $filePath = null;

    public function __construct(string $connectionString, string $containerName)
    {
        $this->blobClient = BlobRestProxy::createBlobService($connectionString);
        $this->containerName = $containerName;
    }

    public function writeFile(string $filename, string $content): bool
    {
        try {
            $this->blobClient->createBlockBlob($this->containerName, $filename, $content);
            $this->filePath = sprintf("https://%s.blob.core.windows.net/%s/%s", $this->blobClient->getAccountName(), $this->containerName, $filename);
            return true;
        } catch (ServiceException $e) {
            echo "Error: " . $e->getMessage();
            $this->filePath = null;
            return false;
        }
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }
}
