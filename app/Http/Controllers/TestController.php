<?php
/**
 * comment
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class TestController
 *
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    /**
     * comment
     */
    public function demo()
    {
        $a = 1;
        if ($a == 0) {$b = 2;$c = 3;
        }
    }
}
