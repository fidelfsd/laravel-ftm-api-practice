<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            // usando QueryBuilder
            $users = DB::table('users')
                ->leftJoin('students', 'users.id', '=', 'students.user_id')
                ->leftJoin('teachers', 'users.id', '=', 'teachers.user_id')
                ->select(
                    'users.id',
                    'users.username',
                    'users.first_name',
                    'users.last_name',
                    'users.email',
                    'users.created_at',
                    'users.updated_at',
                    'students.date_of_birth as student_date_of_birth',
                    'students.address as student_address',
                    'students.phone_number as student_phone_number',
                    'students.gender as student_gender',
                    'students.nationality as student_nationality',
                    'teachers.specialization as teacher_specialization',
                    'teachers.academic_degree as teacher_academic_degree',
                    'teachers.work_experience as teacher_work_experience',
                )
                ->orderBy('id', 'asc')
                //->get()
                // ->simplePaginate(5)
                ->paginate(5);

            // usando Elocuent ORM
            $users = User::with(['student', 'teacher'])->get();

            $data = [
                'message' => 'All users successfully listed',
                'users' => $users
            ];
            return  response()->json($data, Response::HTTP_OK);
        } catch (\Throwable $error) {
            $data = [
                'message' => 'Error while listing users',
                'error' => $error->getMessage()
            ];
            return  response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'message' => 'Users successfully created',
            'user' => 'id'
        ];
        return  response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        try {
            $user = DB::table('users')
                ->leftJoin('students', 'users.id', '=', 'students.user_id')
                ->leftJoin('teachers', 'users.id', '=', 'teachers.user_id')
                ->select(
                    'users.id',
                    'users.username',
                    'users.first_name',
                    'users.last_name',
                    'users.email',
                    'users.created_at',
                    'users.updated_at',
                    'students.date_of_birth as student_date_of_birth',
                    'students.address as student_address',
                    'students.phone_number as student_phone_number',
                    'students.gender as student_gender',
                    'students.nationality as student_nationality',
                    'teachers.specialization as teacher_specialization',
                    'teachers.academic_degree as teacher_academic_degree',
                    'teachers.work_experience as teacher_work_experience',
                )
                ->where('users.id', '=', $id)
                ->first();

            $data = [
                'message' => 'User successfully listed',
                'user' => $user
            ];
            return  response()->json($data, Response::HTTP_OK);
        } catch (\Throwable $error) {
            $data = [
                'message' => 'Error while listing user',
                'error' => $error->getMessage()
            ];
            return  response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'message' => 'Users successfully updated',
        ];
        return  response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = [
            'message' => 'Users successfully deleted',

        ];
        return  response()->json($data);
    }
}
