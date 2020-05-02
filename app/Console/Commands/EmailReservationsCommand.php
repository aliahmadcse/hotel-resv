<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\NotificationsInterface;
use App\Notifications\Reservation;

class EmailReservationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     * I have defined a command with a required argument of count
     * and an option (which is obviously optional) but it require
     * an input to be passed
     * @var string
     */
    protected $signature = 'reservations:notify 
    {count : The number of bookings to retrieve} 
    {--dry-run= : To have this command do no actual work}';

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
    public function __construct(NotificationsInterface $notify)
    {
        $this->notify = $notify;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // asking for user input

        // $this->ask(); //can be used to ask for input 
        // $this->anticipate('',['sms','mail']) //used for anticipation
        $answer = $this->choice(
            'Which service would you like',
            ['sms', 'mail'],
            'mail'
        );
        var_dump($answer);
        // geting the argument value
        $count = $this->argument('count');
        if (!is_numeric($count)) {
            $this->alert('The count must be a number');
            return 1;
        }
        $bookings = \App\Booking::with(['room.roomType', 'users'])
            ->limit($count)
            ->get();

        $this->info(
            sprintf(
                'The number of bookings to alert for is: %d',
                $bookings->count()
            )
        );
        // implementing a bar in artisan console
        $bar = $this->output->createProgressBar($bookings->count());
        $bar->start();
        foreach ($bookings as $booking) {
            // checking for the passed option
            $this->processBooking($booking);
            $bar->advance();
        }
        $bar->finish();
        $this->comment("Command Completed");
    }

    public function processBooking($booking)
    {
        if ($this->option('dry-run')) {
            $this->info('Would process booking');
        } else {
            // $this->error("Nothing");
            // $this->notify->send();
            $booking->notify(new Reservation('Mart Martin'));
        }
    }
}
