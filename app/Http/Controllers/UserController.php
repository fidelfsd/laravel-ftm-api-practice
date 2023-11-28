<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $users = User::with(['student', 'teacher'])->paginate(5);

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
        try {
            // validate the request
            // TODO: validate

            // create a new user
            $user = new User;
            $user->username = $request->username;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password_hash = Hash::make($request->password);
            $user->save();


            $data = [
                'message' => 'Users successfully created',
                'user' => $user
            ];
            return  response()->json($data);
        } catch (\Throwable $error) {
            $data = [
                'message' => 'Error while creating user',
                'error' => $error->getMessage()
            ];
            return  response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        try {
            // $user = DB::table('users')
            //     ->leftJoin('students', 'users.id', '=', 'students.user_id')
            //     ->leftJoin('teachers', 'users.id', '=', 'teachers.user_id')
            //     ->select(
            //         'users.id',
            //         'users.username',
            //         'users.first_name',
            //         'users.last_name',
            //         'users.email',
            //         'users.created_at',
            //         'users.updated_at',
            //         'students.date_of_birth as student_date_of_birth',
            //         'students.address as student_address',
            //         'students.phone_number as student_phone_number',
            //         'students.gender as student_gender',
            //         'students.nationality as student_nationality',
            //         'teachers.specialization as teacher_specialization',
            //         'teachers.academic_degree as teacher_academic_degree',
            //         'teachers.work_experience as teacher_work_experience',
            //     )
            //     ->where('users.id', '=', $id)
            //     ->first();

            //$user = User::with(['student', 'teacher'])->find($user);

            $data = [
                'message' => 'User successfully listed',
                'id' => $user->id,
                'first_name' => $user->first_name,
                'student' => $user->student,
                'teacher' => $user->teacher,
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
    public function update(Request $request, User $user)
    {
        try {
            // validate the request
            // TODO: validate

            // put default values if not set in request body

            $user->username = $request->input('username', $user->username);
            $user->first_name = $request->input('first_name', $user->first_name);
            $user->last_name = $request->input('last_name', $user->last_name);
            $user->email = $request->input('email', $user->email);
            if ($request->input('password')) {
                $user->password_hash = Hash::make($request->input('password'));
            }
            $user->save();


            $data = [
                'message' => 'Users successfully updated',
                'user' => $user
            ];
            return  response()->json($data);
        } catch (\Throwable $error) {
            $data = [
                'message' => 'Error while updating user',
                'error' => $error->getMessage()
            ];
            return  response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            $data = [
                'message' => 'Users successfully deleted',
                'user' => $user
            ];
            return  response()->json($data, Response::HTTP_OK);
        } catch (\Throwable $error) {
            $data = [
                'message' => 'Error while updating user',
                'error' => $error->getMessage()
            ];
            return  response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
