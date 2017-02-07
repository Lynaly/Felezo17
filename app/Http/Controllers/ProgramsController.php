<?php
namespace app\Http\Controllers;


class ProgramsController extends Controller
{

    public function index()
    {
        return view('programs.index');
    }

}