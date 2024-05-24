<?php

namespace MiguelAngelMP10\Multistorage\Storages;

use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;

class LocalStorage implements StorageInterface
{
    private string $directory;
    private ?string $filePath = null;

    public function __construct(string $directory)
    {
        $this->directory = rtrim($directory, '/') . '/';
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function writeFile(string $filename, string $content): bool
    {
        // Obtener el directorio del nombre del archivo
        $this->filePath = $this->directory . $filename;
        $dirPath = dirname($this->filePath);

        // Verificar y crear el directorio si no existe
        if (!is_dir($dirPath)) {
            mkdir($dirPath, 0755, true);
        }

        // Escribir el contenido en el archivo
        $success = file_put_contents($this->filePath, $content) !== false;

        if (!$success) {
            $this->filePath = null;
        }

        return $success;
    }
}
