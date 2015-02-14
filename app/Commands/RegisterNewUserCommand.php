<?php namespace App\Commands;

use App\Commands\Command;

class RegisterNewUserCommand extends Command {

    /**
     * @var array
     */
    public $data;


    /**
     * Create a new command instance.
     * @param array $data
     */
    public function __construct(array $data) {
        $this->data = $data;
    }

}
