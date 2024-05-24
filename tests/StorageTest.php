<?php

use PHPUnit\Framework\TestCase;
use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;

class StorageTest extends TestCase
{

    public function testLocalStorage(): void
    {
        // Crear un mock de la interfaz
        $storageMock = $this->createMock(StorageInterface::class);

        // Configurar la expectativa de que 'writeFile' sea llamado una vez con los parámetros especificados
        $storageMock->expects($this->once())
            ->method('writeFile')
            ->with('test.txt', 'Hello, World!')
            ->willReturn(true);

        $storageMock->expects($this->once())
            ->method('getFilePath')
            ->willReturn(null);


        // Llamar al método y hacer la aserción
        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
        $this->assertNull($storageMock->getFilePath());
    }

    public function testSftpStorage(): void
    {
        $storageMock = $this->createMock(StorageInterface::class);

        $storageMock->expects($this->once())
            ->method('writeFile')
            ->with('test.txt', 'Hello, World!')
            ->willReturn(true);

        $storageMock->expects($this->once())
            ->method('getFilePath')
            ->willReturn(null);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
        $this->assertNull($storageMock->getFilePath());
    }

    public function testGcpStorage(): void
    {
        $storageMock = $this->createMock(StorageInterface::class);

        $storageMock->expects($this->once())
            ->method('writeFile')
            ->with('test.txt', 'Hello, World!')
            ->willReturn(true);
        $storageMock->expects($this->once())
            ->method('getFilePath')
            ->willReturn(null);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
        $this->assertNull($storageMock->getFilePath());
    }

    public function testAzureStorage(): void
    {
        $storageMock = $this->createMock(StorageInterface::class);

        $storageMock->expects($this->once())
            ->method('writeFile')
            ->with('test.txt', 'Hello, World!')
            ->willReturn(true);
        $storageMock->expects($this->once())
            ->method('getFilePath')
            ->willReturn(null);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
        $this->assertNull($storageMock->getFilePath());
    }

    public function test_S3_Storage(): void
    {
        $storageMock = $this->createMock(StorageInterface::class);

        $storageMock->expects($this->once())
            ->method('writeFile')
            ->with('test.txt', 'Hello, World!')
            ->willReturn(true);
        $storageMock->expects($this->once())
            ->method('getFilePath')
            ->willReturn(null);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
        $this->assertNull($storageMock->getFilePath());
    }

    public function testDigitalOceanSpacesStorage(): void
    {
        $storageMock = $this->createMock(StorageInterface::class);

        $storageMock->expects($this->once())
            ->method('writeFile')
            ->with('test.txt', 'Hello, World!')
            ->willReturn(true);
        $storageMock->expects($this->once())
            ->method('getFilePath')
            ->willReturn(null);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
        $this->assertNull($storageMock->getFilePath());
    }
}
