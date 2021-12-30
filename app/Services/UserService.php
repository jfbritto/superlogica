<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;

class UserService
{
    public function store(array $data)
    {
        $response = [];

        try {
            DB::beginTransaction();

            $data['password'] = bcrypt($data['password']);

            $result = User::create($data);

            DB::commit();

            $response = ['status' => 'success', 'data' => $result];
        } catch (Exception $e) {
            DB::rollBack();
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }

    public function destroy($id)
    {
        $response = [];

        try {
            DB::beginTransaction();

            $result = User::destroy($id);

            DB::commit();

            $response = ['status' => 'success', 'data' => $result];
        } catch (Exception $e) {
            DB::rollBack();
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }

    public function list()
    {
        $users = User::orderBy('name')->get();
        return [
            'status' => 'success',
            'data' => $users
        ];
    }
}
