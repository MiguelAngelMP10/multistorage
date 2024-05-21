<?php

use PHPUnit\Framework\TestCase;
use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;

class StorageTest extends TestCase {

    public function testLocalStorage(): void {
        // Crear un mock de la interfaz
        $storageMock = $this->createMock(StorageInterface::class);

        // Configurar la expectativa de que 'writeFile' sea llamado una vez con los parámetros especificados
        $storageMock->expects($this->once())
                    ->method('writeFile')
                    ->with('test.txt', 'Hello, World!')
                    ->willReturn(true);

        // Llamar al método y hacer la aserción
        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }

    public function testSftpStorage(): void {
        $storageMock = $this->createMock(StorageInterface::class);

        $storageMock->expects($this->once())
                    ->method('writeFile')
                    ->with('test.txt', 'Hello, World!')
                    ->willReturn(true);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }

    public function testGcpStorage(): void {
        $storageMock = $this->createMock(StorageInterface::class);

        $storageMock->expects($this->once())
                    ->method('writeFile')
                    ->with('test.txt', 'Hello, World!')
                    ->willReturn(true);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }

    public function testAzureStorage(): void {
        $storageMock = $this->createMock(StorageInterface::class);

        $storageMock->expects($this->once())
                    ->method('writeFile')
                    ->with('test.txt', 'Hello, World!')
                    ->willReturn(true);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }

    public function test_S3_Storage(): void {
        $storageMock = $this->createMock(StorageInterface::class);

        $storageMock->expects($this->once())
                    ->method('writeFile')
                    ->with('test.txt', 'Hello, World!')
                    ->willReturn(true);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }

    public function testDigitalOceanSpacesStorage(): void {
        $storageMock = $this->createMock(StorageInterface::class);

        $storageMock->expects($this->once())
                    ->method('writeFile')
                    ->with('test.txt', 'Hello, World!')
                    ->willReturn(true);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }
}
