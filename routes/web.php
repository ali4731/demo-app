<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\mailcontroller;
use App\Http\Controllers\RegisteredUserController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;



$jobs = [
    [
        'id' => 1,
        'title' => 'Director',
        'salary' => '$50,000'
    ],
    [
        'id' => 2,
        'title' => 'Programer',
        'salary' => '$10,000'
    ],
    [
        'id' => 3,
        'title' => 'Teacher',
        'salary' => '$40,000'
    ]
];
Route::get('/jobs/create', function () {
    return view('create');
});


Route::get('/', function () {
    $jobs = Job::all();

    dd($jobs);
    // return view('welcome');
});


Route::get('/job', function () {
   return view('job',[
        'jobs'=> [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ]
   ]);
});


Route::get('/jobs/{id}', function ($id) {

    $jobs = [
                [
                    'id' => 1,
                    'title' => 'Director',
                    'salary' => '$50,000'
                ],
                [
                    'id' => 2,
                    'title' => 'Programer',
                    'salary' => '$10,000'
                ],
                [
                    'id' => 3,
                    'title' => 'Teacher',
                    'salary' => '$40,000'
                ]
            ];

           $job = \Illuminate\Support\Arr::first($jobs, fn($job)  => $job['id'] == $id );

           dd($job);
    return view('contact');
});


Route::post('/abc', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});


Route::get('/register',[RegisteredUserController::class, 'create']);
Route::post('/register',[RegisteredUserController::class, 'store']);
Route::get('/login',[LoginController::class, 'login']);

Route::post('/logout',[LoginController::class, 'logout']);
Route::post('/userlogin',[LoginController::class, 'userlogin']);


Route::get('test',function ( ) {
    \Illuminate\Support\Facades\Mail::to('aliakram4731@gmail.com')->queue(
        new \App\Mail\JobPosted()
    );

    dispatch(function(){
        logger('hello');
    });

    return 'Done';    
});

Route::get('send-mail',[mailcontroller::class,'sendEmail']);