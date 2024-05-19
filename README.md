# Multistorage

Multistorage es una biblioteca PHP que permite manejar múltiples sistemas de almacenamiento de archivos. Soporta almacenamiento local, SFTP, Amazon S3, Google Cloud Storage, Azure Blob Storage y DigitalOcean Spaces.

## Características

- Almacenamiento en múltiples backend.
- Interfaz unificada para diferentes sistemas de almacenamiento.
- Fácil de extender y agregar nuevos backends de almacenamiento.

## Requisitos

- PHP >= 8.2
- Composer
- Extensiones de PHP necesarias para cada tipo de almacenamiento (por ejemplo, `ext-curl` para AWS S3).

## Instalación

Puedes instalar esta biblioteca usando Composer. Ejecuta el siguiente comando en tu terminal:

```bash
composer require miguelangelmp10/multistorage
```


## Configuración
Para configurar y usar la biblioteca Multistorage, primero necesitas crear una instancia del almacenamiento que deseas usar y luego llamar a los métodos correspondientes.

### Ejemplo de Uso

```php
<?php

require 'vendor/autoload.php';

use MiguelAngelMP10\Multistorage\Storages\LocalStorage;
use MiguelAngelMP10\Multistorage\Storages\SftpStorage;
use MiguelAngelMP10\Multistorage\Storages\S3Storage;
use MiguelAngelMP10\Multistorage\Storages\GcpStorage;
use MiguelAngelMP10\Multistorage\Storages\AzureStorage;
use MiguelAngelMP10\Multistorage\Storages\IbmCloudStorage;
use MiguelAngelMP10\Multistorage\Storages\DigitalOceanSpacesStorage;

// Uso de almacenamiento local
$local = new LocalStorage('/path/to/local/storage');
$local->writeFile('test.txt', 'Hello, Local!');

// Uso de almacenamiento SFTP
$sftp = new SftpStorage('sftp.example.com', 'username', 'password', '/path/to/sftp/storage');
$sftp->writeFile('test.txt', 'Hello, SFTP!');

// Uso de almacenamiento S3
$s3 = new S3Storage('bucket-name', 'region', 'access-key', 'secret-key');
$s3->writeFile('test.txt', 'Hello, S3!');

// Uso de almacenamiento GCP
$gcp = new GcpStorage('bucket-name', 'path/to/credentials.json');
$gcp->writeFile('test.txt', 'Hello, GCP!');

// Uso de almacenamiento Azure
$azure = new AzureStorage('account-name', 'account-key', 'container-name');
$azure->writeFile('test.txt', 'Hello, Azure!');

// Uso de almacenamiento DigitalOcean Spaces
$doSpaces = new DigitalOceanSpacesStorage('space-name', 'region', 'access-key', 'secret-key');
$doSpaces->writeFile('test.txt', 'Hello, DigitalOcean Spaces!');

```