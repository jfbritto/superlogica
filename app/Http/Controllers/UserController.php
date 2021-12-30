<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('formulario.home');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:5|max:100',
            'userName' => 'required|max:20',
            'email' => 'required|email||unique:users',
            'zipCode' => 'required|size:9',
            'password' => [
                'required',
                'min:8',
                function ($attribute, $value, $fail) {
                    if (!(preg_match('/[a-zA-Z]/', $value) && preg_match('/\d+/', $value))) {
                        $fail('O campo senha deve conter letras e números');
                    }
                }
            ]
        ], [], [
            'password' => 'Senha',
            'userName' => 'Login',
            'zipCode' => 'CEP'
        ]);

        $response = $this->userService->store($data);

        if ($response['status'] == 'success') {
            return response()->json(['status' => 'success'], 201);
        }

        return response()->json(['status' => 'error', 'message' => $response['data']], 400);
    }

    public function destroy(Request $request)
    {
        $data = $request->validate([
            'id' => 'required'
        ]);

        $response = $this->userService->destroy($data['id']);

        if ($response['status'] == 'success') {
            return response()->json(['status' => 'success', 'data' => $response['data']], 200);
        }

        return response()->json(['status' => 'error', 'message' => $response['data']], 400);
    }

    public function list()
    {
        $response = $this->userService->list();

        if ($response['status'] == 'success') {
            return response()->json(['status' => 'success', 'data' => $response['data']], 200);
        }

        return response()->json(['status' => 'error', 'message' => $response['data']], 400);
    }
}
