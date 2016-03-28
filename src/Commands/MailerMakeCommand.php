<?php namespace browner12\mailer\Commands;

use Illuminate\Console\GeneratorCommand;

class MailerMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:mailer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new mailer class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Mailer';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/mailer.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\' . config('mailer.directory', 'Mailers');
    }
}
