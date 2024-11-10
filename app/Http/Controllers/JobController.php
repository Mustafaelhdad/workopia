<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class JobController extends Controller
{
    public function index() { 
        $title = 'Available Jobs';
        $jobs = [
        'web developer',
        'desinger',
        'mobile developer',
        'python developer'
        ];

    return view('jobs.index', compact('title', 'jobs'));}

public function create(): View|Factory
    {
        return view('jobs.create');
    }}
