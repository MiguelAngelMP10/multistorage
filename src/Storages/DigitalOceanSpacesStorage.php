<?php

namespace MiguelAngelMP10\Multistorage\Storages;

use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class DigitalOceanSpacesStorage implements StorageInterface
{
    private S3Client $s3Client;
    private string $spaceName;
    private ?string $filePath = null;


    public function __construct(string $spaceName, string $region, string $accessKeyId, string $secretAccessKey)
    {
        $this->s3Client = new S3Client([
            'endpoint' => "https://$region.digitaloceanspaces.com",
            'region' => $region,
            'version' => 'latest',
            'credentials' => [
                'key' => $accessKeyId,
                'secret' => $secretAccessKey,
            ],
        ]);
        $this->spaceName = $spaceName;
    }

    public function writeFile(string $filename, string $content): bool
    {
        try {
            $this->s3Client->putObject([
                'Bucket' => $this->spaceName,
                'Key' => $filename,
                'Body' => $content,
                'ACL' => 'private',
            ]);
            $this->filePath = "https://{$this->spaceName}.{$this->s3Client->getRegion()}.digitaloceanspaces.com/{$filename}";

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
