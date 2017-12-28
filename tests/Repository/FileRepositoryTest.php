<?php
/*
 * This file is part of the Brackets Checker application.
 *
 * (c) Max Voronov <maxivoronov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Repository;

use App\Repository\FileRepository;
use App\Exception\EmptyContentException;
use App\Exception\InvalidFileException;
use PHPUnit\Framework\TestCase;

class FileRepositoryTest extends TestCase
{
    const DATA_DIR = __DIR__ . "/../../data/";

    public function testSuccess()
    {
        $file = self::DATA_DIR . '/example.txt';
        $sentence = (new FileRepository)->read($file);
        $this->assertEquals(file_get_contents($file), $sentence->getValue());
    }

    public function testNotExistsFile()
    {
        $file = self::DATA_DIR . '/not_exists_file.txt';
        $this->expectException(InvalidFileException::class);
        (new FileRepository)->read($file);
    }

    public function testEmptyFile()
    {
        $file = self::DATA_DIR . '/empty.txt';
        $this->expectException(EmptyContentException::class);
        (new FileRepository)->read($file);
    }
}
