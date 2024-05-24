<?php
namespace MiguelAngelMP10\Multistorage\Storages;

use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;

class LocalStorage implements StorageInterface {
    private string $directory;

    public function __construct(string $directory) {
        $this->directory = rtrim($directory, '/') . '/';
    }

    public function writeFile(string $filename, string $content): bool {
         // Obtener el directorio del nombre del archivo
         $filePath = $this->directory . $filename;
         $dirPath = dirname($filePath);
 
         // Verificar y crear el directorio si no existe
         if (!is_dir($dirPath)) {
             mkdir($dirPath, 0755, true);
         }
 
         // Escribir el contenido en el archivo
         return file_put_contents($filePath, $content) !== false;
    }
}
