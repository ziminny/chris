<?php

namespace App\Console\Commands;

use App\Helpers\FirstAccess;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Prophecy\Argument;

class FirstUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:first-user {--name=} {--email=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mount user for access in system';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
                if($this->isNoArgs()) {
                    (new FirstAccess)->makeFirstUser($this->defaultValues());
                    $this->showDatas($this->defaultValues());
                    return;  
                }
            
                if($this->isValidArgs()) {
                    $this->showDatas($this->options());
                    (new FirstAccess)->makeFirstUser($this->options());
                    return ;
                }

            $this->error("Nome email e password são obrigatórios");   
    }

    private function myOptions()
    {
        return (object) $this->options();
    }

    private function isValidArgs()
    {
        return ($this->myOptions()->name && $this->myOptions()->email && $this->myOptions()->password);
    }
    private function isNoArgs()
    {
        return (!$this->myOptions()->name && !$this->myOptions()->email && !$this->myOptions()->password);
    }

    private function defaultValues()
    {
        return  [
            'name' => 'Primeiro usuário',
            'email' => 'teste@hotmail.com',
            'password' => '12345678'
        ];
    }
    private function showDatas($object)
    {
        if(is_array($object)) $object = (object) $object;

        $this->info("Dados cadastrados com sucesso !");
        $this->newLine();
        $this->info("Usuário : ".$object->name);
        $this->newLine();
        $this->info("Email : ".$object->email);
        $this->newLine();
        $this->info("Senha : ".$object->password);
    }


}
