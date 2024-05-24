<?php

namespace MiguelAngelMP10\Multistorage\Storages;

use Exception;
use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;
use phpseclib3\Net\SFTP;

class SftpStorage implements StorageInterface
{
    private SFTP $sftp;
    private string $remoteDirectory;
    private ?string $filePath = null;

    /**
     * @throws Exception
     */
    public function __construct(string $host, string $username, string $password, string $remoteDirectory)
    {
        $this->sftp = new SFTP($host);
        if (!$this->sftp->login($username, $password)) {
            throw new Exception('Login Failed');
        }
        $this->remoteDirectory = rtrim($remoteDirectory, '/') . '/';
    }

    public function writeFile(string $filename, string $content): bool
    {
        $this->filePath = $this->remoteDirectory . $filename;
        $success = $this->sftp->put($this->filePath, $content);

        if (!$success) {
            $this->filePath = null;
        }

        return $success;
    }

    // Método para obtener la ruta del archivo escrito
    public function getFilePath(): ?string
    {
        return $this->filePath;
    }
}
