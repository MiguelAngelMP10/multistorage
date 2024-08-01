<?php

namespace MiguelAngelMP10\Multistorage\Storages;

use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class S3Storage implements StorageInterface
{
    private S3Client $s3Client;
    private string $bucketName;
    private ?string $filePath = null;


    public function __construct(string $bucketName, string $region, string $accessKeyId, string $secretAccessKey)
    {
        $this->s3Client = new S3Client([
            'region' => $region,
            'version' => 'latest',
            'credentials' => [
                'key' => $accessKeyId,
                'secret' => $secretAccessKey,
            ],
        ]);
        $this->bucketName = $bucketName;
    }

    public function writeFile(string $filename, string $content): bool
    {
        try {
            $result = $this->s3Client->putObject([
                'Bucket' => $this->bucketName,
                'Key' => $filename,
                'Body' => $content,
                'ACL' => 'private',
            ]);
            $this->filePath = $filename;
            return true;
        } catch (AwsException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }
}
