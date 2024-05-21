<?php
namespace MiguelAngelMP10\Multistorage\Storages;

use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;
use phpseclib3\Net\SFTP;

class SftpStorage implements StorageInterface {
    private SFTP $sftp;
    private string $remoteDirectory;

    public function __construct(string $host, string $username, string $password, string $remoteDirectory) {
        $this->sftp = new SFTP($host);
        if (!$this->sftp->login($username, $password)) {
            throw new \Exception('Login Failed');
        }
        $this->remoteDirectory = rtrim($remoteDirectory, '/') . '/';
    }

    public function writeFile(string $filename, string $content): bool {
        return $this->sftp->put($this->remoteDirectory . $filename, $content);
    }
}
