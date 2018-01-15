<?php
/*
 * This file is part of the Brackets Checker application.
 *
 * (c) Max Voronov <maxivoronov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\Exception\InvalidFileException;
use App\Exception\EmptyContentException;
use App\Repository\FileRepository;
use App\ValueObject\Sentence;
use MaxVoronov\BracketsChecker\CheckerInterface;
use MaxVoronov\BracketsChecker\Exceptions\InvalidSentenceException;

class BracketsService
{
    /** @var CheckerInterface */
    protected $bracketsChecker;

    /** @var FileRepository */
    protected $repository;

    public function __construct(CheckerInterface $bracketsChecker, FileRepository $repository)
    {
        $this->bracketsChecker = $bracketsChecker;
        $this->repository = $repository;
    }

    /**
     * Validate brackets in string sentence
     *
     * @param Sentence $sentence
     * @return bool
     * @throws InvalidSentenceException
     */
    public function validateSentence(Sentence $sentence): bool
    {
        return $this->bracketsChecker->check($sentence->getValue());
    }

    /**
     * Read file and validate brackets
     *
     * @param string $file
     * @return bool
     * @throws InvalidFileException
     * @throws EmptyContentException
     * @throws InvalidSentenceException
     */
    public function validateFromFile(string $file): bool
    {
        $sentence = $this->repository->read($file);
        return $this->validateSentence($sentence);
    }
}
