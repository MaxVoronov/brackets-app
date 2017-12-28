<?php
/*
 * This file is part of the Brackets Checker application.
 *
 * (c) Max Voronov <maxivoronov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\ValueObject;

use App\Exception\EmptyContentException;

class Sentence
{
    protected $value;

    /**
     * Sentence value object constructor
     *
     * @param string $value
     * @throws EmptyContentException
     */
    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new EmptyContentException('Sentence is empty');
        }

        $this->value = $value;
    }

    /**
     * Return saved value
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
