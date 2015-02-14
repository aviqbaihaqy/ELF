<?php namespace App\Handlers\Commands;

use App\Commands\CreateNewStreamCommand;

use App\Repositories\StreamRepository;
use Illuminate\Queue\InteractsWithQueue;

class CreateNewStreamCommandHandler {

    /**
     * @var StreamRepository
     */
    private $streamRepository;


    /**
     * Create the command handler.
     * @param StreamRepository $streamRepository
     */
    public function __construct(StreamRepository $streamRepository) {
        $this->streamRepository = $streamRepository;
    }


    /**
     * Handle the command.
     *
     * @param  CreateNewStreamCommand $command
     * @return void
     */
    public function handle(CreateNewStreamCommand $command) {
        return $this->streamRepository->create($command->data);
    }

}
