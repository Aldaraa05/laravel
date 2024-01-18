<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\View\View;
use Laravel\Sanctum\HasApiTokens;
class UserController extends Controller
{
    use HasApiTokens;
    
    public function show(string $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}