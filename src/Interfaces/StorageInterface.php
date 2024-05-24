<?php

namespace MiguelAngelMP10\Multistorage\Interfaces;

interface StorageInterface
{
    public function writeFile(string $filename, string $content): bool;

    public function getFilePath(): ?string;
}
