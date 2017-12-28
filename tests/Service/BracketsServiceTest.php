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
use App\Service\BracketsService;
use App\ValueObject\Sentence;
use PHPUnit\Framework\TestCase;

class BracketsServiceTest extends TestCase
{
    const DATA_DIR = __DIR__ . "/../../data/";

    protected $repository;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        $this->repository = new FileRepository;
        parent::__construct($name, $data, $dataName);
    }

    public function testSuccessSentence()
    {
        $service = new BracketsService($this->repository);
        $this->assertTrue($service->validateSentence(new Sentence("()(())")));
        $this->assertFalse($service->validateSentence(new Sentence(")(())")));
    }

    public function testSuccessFile()
    {
        $service = new BracketsService($this->repository);
        $this->assertTrue($service->validateFromFile(self::DATA_DIR . 'example.txt'));
        $this->assertFalse($service->validateFromFile(self::DATA_DIR . 'incorrect.txt'));
    }
}
