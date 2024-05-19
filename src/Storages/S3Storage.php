<?php
namespace MiguelAngelMP10\Multistorage\Storages;

use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class S3Storage implements StorageInterface {
    private $s3Client;
    private $bucketName;

    public function __construct(string $bucketName, string $region, string $accessKeyId, string $secretAccessKey) {
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

    public function writeFile(string $filename, string $content): bool {
        try {
            $this->s3Client->putObject([
                'Bucket' => $this->bucketName,
                'Key' => $filename,
                'Body' => $content,
                'ACL' => 'private',
            ]);
            return true;
        } catch (AwsException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
