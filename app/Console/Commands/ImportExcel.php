<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerWasteImport; // This will be your import class

class ImportExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports data from an Excel file into the database';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = $this->argument('file'); // Get the file argument from the command line

        if (!file_exists($file)) {
            $this->error("The file {$file} does not exist.");
            return;
        }

        try {
            Excel::import(new CustomerWasteImport, $file);
            $this->info('Data has been successfully imported.');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error("There was an error importing the data: " . $e->getMessage());
        }
    }
}