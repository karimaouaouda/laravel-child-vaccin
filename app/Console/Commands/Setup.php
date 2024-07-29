<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\User;
use App\Models\Vaccin;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = [];

        if(file_exists( base_path('/storage/app/data/vaccins.php') )){
            $data[] = require(base_path('/storage/app/data/vaccins.php'));
        }
        if(file_exists( base_path('/storage/app/data/users.php') )){
            $data[] = require(base_path('/storage/app/data/users.php'));
        }

        $this->withProgressBar($data, function ($data){
            if( count(array_diff( (new $data['model'])->getFillable(), $data['columns'] )) > 0 ){
                $this->output->error("few columns to model : {$data['model']}");
                return false;
            }

            foreach( $data['records'] as $record ){
                $model = new $data['model']($record);

                try{
                    $model->save();
                }catch(Exception $e){
                    $this->output->error("error : ". $e->getMessage());
                }
            }

            $this->output->info('finished adding your assets');
        });
        $user = User::find(1);
        $user->role = "admin";
        $user->save();
        $user = User::find(2);
        $user->role = "admin";
        $user->save();
    }

    public function createAdmin(){
        $info = [
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'role' => 'admin'
        ];

        $user = User::create($info);

        $user->save();

        Admin::create([
            'user_id' => $user->id
        ])->save();

        $user->role = 'admin';
        $user->save();
    }

    public function createVccins(){
        $info = [
            'name' => 'vaccin 1',
            'description' => 'vaccin 1 description',
            'age' => 1
        ];

        $vaccin = Vaccin::create($info);

        $vaccin->save();


    }
}
