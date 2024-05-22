<?php
namespace MiguelAngelMP10\Multistorage\Storages;

use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;

class LocalStorage implements StorageInterface {
    private string $directory;

    public function __construct(string $directory) {
        $this->directory = rtrim($directory, '/') . '/';
    }

    public function writeFile(string $filename, string $content): bool {
        if (!is_dir($this->directory)) {
            mkdir($this->directory, 0755, true);
        }
        return file_put_contents($this->directory . $filename, $content) !== false;
    }
}
