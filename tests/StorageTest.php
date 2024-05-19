<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery as m;
use MiguelAngelMP10\Multistorage\Interfaces\StorageInterface;

class StorageTest extends TestCase {
    use MockeryPHPUnitIntegration;

    protected function tearDown(): void {
        m::close();
    }

    public function testLocalStorage() {
        $storageMock = m::mock(StorageInterface::class);
        $storageMock->shouldReceive('writeFile')
                    ->once()
                    ->with('test.txt', 'Hello, World!')
                    ->andReturn(true);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }

    public function testSftpStorage() {
        $storageMock = m::mock(StorageInterface::class);
        $storageMock->shouldReceive('writeFile')
                    ->once()
                    ->with('test.txt', 'Hello, World!')
                    ->andReturn(true);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }

    public function testGcpStorage() {
        $storageMock = m::mock(StorageInterface::class);
        $storageMock->shouldReceive('writeFile')
                    ->once()
                    ->with('test.txt', 'Hello, World!')
                    ->andReturn(true);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }

    public function testAzureStorage() {
        $storageMock = m::mock(StorageInterface::class);
        $storageMock->shouldReceive('writeFile')
                    ->once()
                    ->with('test.txt', 'Hello, World!')
                    ->andReturn(true);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }

    public function test_S3_Storage() {
        $storageMock = m::mock(StorageInterface::class);
        $storageMock->shouldReceive('writeFile')
                    ->once()
                    ->with('test.txt', 'Hello, World!')
                    ->andReturn(true);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }

    public function testDigitalOceanSpacesStorage() {
        $storageMock = m::mock(StorageInterface::class);
        $storageMock->shouldReceive('writeFile')
                    ->once()
                    ->with('test.txt', 'Hello, World!')
                    ->andReturn(true);

        $this->assertTrue($storageMock->writeFile('test.txt', 'Hello, World!'));
    }
}
