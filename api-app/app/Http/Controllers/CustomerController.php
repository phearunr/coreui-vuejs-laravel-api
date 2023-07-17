<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::query()
            // ->when(!is_null(request('term')) , function($q) {
            //     $q->where('name', '=', request('term'));
            //     $q->orWhere('phone', request('term'));
            // })
            ->where(['role' => 'customer'])
            ->withSum('score_points As score_points', 'points')
            ->get()->toArray();
        return array_reverse($customers);
    }

}
