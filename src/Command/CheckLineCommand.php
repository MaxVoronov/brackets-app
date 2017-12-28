<?php
/*
 * This file is part of the Brackets Checker application.
 *
 * (c) Max Voronov <maxivoronov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Command;

use App\Service\BracketsService;
use App\ValueObject\Sentence;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckLineCommand extends Command
{
    /**
     * @var BracketsService
     */
    protected $service;

    public function __construct(BracketsService $service, string $name = null)
    {
        $this->service = $service;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName('check:line')
            ->setDescription('Check passed argument')
            ->addArgument('sentence', InputArgument::REQUIRED, 'Sentence for checking');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $formatter = $this->getHelper('formatter');

        try {
            $sentence = new Sentence($input->getArgument('sentence'));
            $isCorrect = $this->service->validateSentence($sentence);

            $formattedBlock = ($isCorrect)
                ? $formatter->formatBlock(['Result:', 'Sentence is correct'], 'info', true)
                : $formatter->formatBlock(['Result:', 'Sentence is not correct'], 'comment', true);
            $output->writeln($formattedBlock);
        } catch (\Exception $e) {
            $formattedBlock = $formatter->formatBlock(['Error:', $e->getMessage()], 'error', true);
            $output->writeln($formattedBlock);
        }
    }
}
