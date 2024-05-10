<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public $rooms =  ['1+0','1+1','1.5+1','2+0','2+1','2.5+1','2+2','3+0','3+1','3.5+1','3+2','3+3','4+0','4+1','4.5+1','4+2','4+3','4+4','5+1','5.5+1','5+2','5+3','5+4','6+1','6+2','6.5+1','6+3','6+4','7+1','7+2','7+3','8+1','8+2', '8+3','8+4','9+1','9+2','9+3','9+4','9+5','9+6','10+1','10+2','10 Üzeri',
];
    public $types = ['Konut','Arsa','Tarla','Arazi','İş Yeri','Bina','Devre Mülk', 'Turistlik Tesis', 'Diğer'];
    public $paymentMethods = ['Aylık','3 Aylık','6 Aylık','Yıllık'];
}
