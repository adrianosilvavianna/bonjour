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

    private $langPtBr;
    private $langEn;
    private $langFr;


    public function __construct()
    {
        $this->langPtBr = __DIR__."../../../Lang/pt-br.php";
        $this->langEn = __DIR__."../../../Lang/en.php";
        $this->langFr = __DIR__."../../../Lang/fr.php";
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        SEOMeta::setTitle('Bonjou', false);
        SEOMeta::setDescription('Precisa de carona?? Pegue da maneira mais f�cil poss�vel!!');
        SEOMeta::setCanonical('http://bonjou.com.br');
        SEOMeta::addKeyword(['Bonjou', 'caronas', 'caroneiro', 'presico de caronas', 'caronas para ir a aula', 'sou estudante', 'sou imigrante', 'sou negro', 'quero pegar carona']);

        OpenGraph::setTitle('Bonjou',false);
        OpenGraph::setDescription('Precisa de carona?? Pegue da maneira mais f�cil poss�vel!!');
        OpenGraph::setUrl('http://bonjou.com.br');
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addProperty('locale', 'pt-br');

      
        
        if(!empty($_GET['lang']))
        {
            switch($_GET['lang']){
                case "pt-br":
                    include_once $this->langPtBr;
                    break;
                case "en":
                    include_once $this->langEn;
                    break;
                case "fr":
                    include_once $this->langFr;
                    break;
                default:
                    include_once $this->langPtBr;
                    break;
            }
        }else{
                include_once $this->langPtBr;
            }

        return view('index');
    }
}
