<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('home');
    }

    protected function admin()
    {
        return view('home');
    }

    protected function empresa()
    {
        return view('home');
    }

    protected function funcionario()
    {
        return view('home');
    }

    protected function cliente()
    {
        return view('home');
    }

    protected function candidato()
    {
        return view('home');
    }

    public function notificar()
    {

    }

    public function logout()
    {
        return redirect()->route('login');
    }
}
