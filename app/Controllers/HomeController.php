<?php
namespace App\Controllers;

use App\Models\User;


class HomeController extends Controller
{
    
    public function index($request, $response)
    {

        User::create([
            'name' => 'jane doe',
            'email' => 'janedoe@cloudways.com',
            'password' => 'iamstupid',
        ]);



        // // return 'shah';
        // $users = $this->container->db->table('users')->get();
        // // var_dump($users);
        // foreach ($users as $user){
        //     echo $user->name . "</br>";
        // }
    }
}

?>