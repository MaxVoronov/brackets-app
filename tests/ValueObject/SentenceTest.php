<?php
/*
 * This file is part of the Brackets Checker library.
 *
 * (c) Max Voronov <maxivoronov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\ValueObject;

use App\ValueObject\Sentence;
use App\Exception\EmptyContentException;
use PHPUnit\Framework\TestCase;

class SentenceTest extends TestCase
{
    public function testSuccess()
    {
        $value = "()(())";
        $sentence = new Sentence($value);
        $this->assertEquals($value, $sentence->getValue());
    }

    public function testEmptyValue()
    {
        $this->expectException(EmptyContentException::class);
        new Sentence("");
    }
}
