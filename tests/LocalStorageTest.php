<?php

use PHPUnit\Framework\TestCase;
use MiguelAngelMP10\Multistorage\Storages\LocalStorage;

class LocalStorageTest extends TestCase {
    private $testDirectory = __DIR__ . '/test_files/';

    protected function setUp(): void {
        if (!file_exists($this->testDirectory)) {
            mkdir($this->testDirectory, 0777, true);
        }
    }

    
    protected function tearDown(): void {
        $files = glob($this->testDirectory . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
    

    public function testWriteFile() {
        $storage = new LocalStorage($this->testDirectory);
        $filename = 'test.txt';
        $content = 'Hello, World!';

        $result = $storage->writeFile($filename, $content);

        $this->assertTrue($result);
        $this->assertFileExists($this->testDirectory . $filename);
        $this->assertStringEqualsFile($this->testDirectory . $filename, $content);
    }
}
