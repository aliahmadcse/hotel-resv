<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EmailReservationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify reservations holders';

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
     * @return mixed
     */
    public function handle()
    {
        $bookings = \App\Booking::with(['room.roomType', 'users'])
            ->get();

        $this->info(
            sprintf(
                'The number of bookings to alert for is: %d',
                $bookings->count()
            )
        );
        $bar = $this->output->createProgressBar($bookings->count());
        $bar->start();
        foreach ($bookings as $booking) {
            $this->error("Nothing");
            $bar->advance();
        }
        $bar->finish();
        $this->comment("Command Completed");
    }
}
