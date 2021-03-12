<?php

namespace App\Command;

use App\Service\Weather\ClothesValidator;
use App\Service\Weather\WeatherPredictor;
use App\Service\Weather\WeatherPredictorMessager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WeatherPredictionCommand extends Command
{
    protected static $defaultName = 'app:weather';

    private WeatherPredictor $weatherPredictor;
    private ClothesValidator $clothesValidator;
    private WeatherPredictorMessager $messager;

    /**
     * @param WeatherPredictor $weatherPredictor
     * @param ClothesValidator $clothesValidator
     * @param WeatherPredictorMessager $messager
     */
    public function __construct(
        WeatherPredictor $weatherPredictor,
        ClothesValidator $clothesValidator,
        WeatherPredictorMessager $messager
    ) {
        $this->weatherPredictor = $weatherPredictor;
        $this->clothesValidator = $clothesValidator;
        $this->messager = $messager;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Weather prediction.')
            ->setHelp('Command for predicting weather and whether or not specific clothes are suitable for it.')
            ->addArgument('city', InputArgument::REQUIRED, 'City')
            ->addArgument('clothes', InputArgument::OPTIONAL, 'Clothes');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $city = $input->getArgument('city');
        $clothes = $input->getArgument('clothes');
        $weatherData = $this->weatherPredictor->getData($city);

        if (empty($clothes)) {
            $result = $this->messager->getPredictionMessage($weatherData);
        } else {
            $result = $this->messager->getClothesValidationMessage(
                $this->clothesValidator->isValid($weatherData, strtolower($clothes))
            );
        }

        $output->writeln($result);

        return Command::SUCCESS;
    }
}