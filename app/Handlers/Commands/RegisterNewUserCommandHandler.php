<?php namespace App\Handlers\Commands;

use App\Commands\RegisterNewUserCommand;

use App\Repositories\UserRepoitory;
use Illuminate\Queue\InteractsWithQueue;

class RegisterNewUserCommandHandler {

    /**
     * @var UserRepoitory
     */
    private $userRepoitory;


    /**
     * Create the command handler.
     * @param UserRepoitory $userRepoitory
     */
    public function __construct(UserRepoitory $userRepoitory) {
        $this->userRepoitory = $userRepoitory;
    }


    /**
     * Handle the command.
     *
     * @param  RegisterNewUserCommand $command
     * @return App\User
     */
    public function handle(RegisterNewUserCommand $command) {
        $user = $this->userRepoitory->create($command->data);

        return $user;
    }

}
