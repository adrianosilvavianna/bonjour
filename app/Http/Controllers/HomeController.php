<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        SEOMeta::setTitle('Bonjou', false);
        SEOMeta::setDescription('Precisa de carona?? Pegue da maneira mais fácil possível!!');
        SEOMeta::setCanonical('http://bonjou.com.br');
        SEOMeta::addKeyword(['Bonjou', 'caronas', 'caroneiro', 'presico de caronas', 'caronas para ir a aula', 'sou estudante', 'sou imigrante', 'sou negro', 'quero pegar carona']);

        OpenGraph::setTitle('Bonjou',false);
        OpenGraph::setDescription('Precisa de carona?? Pegue da maneira mais fácil possível!!');
        OpenGraph::setUrl('http://bonjou.com.br');
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addProperty('locale', 'pt-br');


        return view('index');
    }
}
