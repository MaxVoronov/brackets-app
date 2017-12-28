<?php
/*
 * This file is part of the Brackets Checker application.
 *
 * (c) Max Voronov <maxivoronov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;

use App\Exception\InvalidFileException;
use App\Exception\EmptyContentException;
use App\ValueObject\Sentence;

class FileRepository
{
    /**
     * Read and return data from file
     *
     * @param string $file
     * @return Sentence
     * @throws InvalidFileException
     * @throws EmptyContentException
     */
    public function read(string $file): Sentence
    {
        $this->checkFile($file);
        return new Sentence(file_get_contents($file));
    }

    /**
     * Check if file existing and is readable
     *
     * @param string $file
     * @throws InvalidFileException
     */
    protected function checkFile(string $file)
    {
        if (!file_exists($file)) {
            throw new InvalidFileException(sprintf('File "%s" does not exist', $file));
        }

        if (!is_readable($file)) {
            throw new InvalidFileException(sprintf('Can not read file "%s"', $file));
        }
    }
}
