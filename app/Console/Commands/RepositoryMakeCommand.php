<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class RepositoryMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:repository';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (parent::handle() === false && ! $this->option('force')) {
            return;
        }

        if ($this->option('all')) {
            $this->input->setOption('interface', true);
            $this->input->setOption('provider', true);
        }

        if ($this->option('interface')) {
            $this->createInterface();
        }

        if ($this->option('provider')) {
            $this->createProvider();
        }
    }

    /**
     * Create a interface for repository.
     *
     * @return void
     */
    protected function createInterface()
    {
        $this->call('make:interface', [
            'name' => $this->argument('name').'Interface',
            '--repository' => true,
        ]);
    }

    /**
     * Create a service provider for repository.
     *
     * @return void
     */
    protected function createProvider()
    {
        $this->call('make:provider', [
            'name' => $this->argument('name').'ServiceProvider',
        ]);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'\stubs\repository.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['all', 'a', InputOption::VALUE_NONE, 'Generate interface and provider for repository.'],
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the repository already exists.'],
            ['interface', 'i', InputOption::VALUE_NONE, 'Create a new interface for repository.'],
            ['provider', 'p', InputOption::VALUE_NONE, 'Create a new provider for repository.'],
        ];
    }
}
