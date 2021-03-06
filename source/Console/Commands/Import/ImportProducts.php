<?php namespace Importer\Console\Commands\Import;

use Importer\Client;
use Importer\Entities\Product;
use Importer\Factories\EntitiesMapperFactory;
use Importer\Factories\ReaderFactory;
use Importer\Mappers\EntityMapper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportProducts extends Command
{
    const FILE_ARGUMENT = 'file';

    public function __construct(string $name = null)
    {
        parent::__construct($name);
    }

    public function configure(): void
    {
        $this
            ->setName('import:products')
            ->setDescription('Import products from a file and insert them into to the database.')
            ->setHelp('This command allows you to import products from a file to the database. To use: simply run "php console import:product <filename>".')
            ->addArgument(self::FILE_ARGUMENT, InputArgument::REQUIRED, 'The file containing the products.');
    }

    public function execute(InputInterface $input, OutputInterface $output): void
    {
        // TODO: Validation for file + test for this function

        $file = $input->getArgument(self::FILE_ARGUMENT);

        $client = Client::getInstance();

        $entityManager = $client->getEntityManager();

        $entityMapper = new EntityMapper($client, Product::class);

        $mapper = EntitiesMapperFactory::make($entityManager, $entityMapper);

        $importedData = (ReaderFactory::make($file))->read();

        $mapper->map($importedData);

        $output->writeln("<bg=green;options=bold>Successfully imported products from {$file}!</>");
    }
}