<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use DateTimeImmutable;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'get all students';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return 'create user';

        try {
            $rules = [
                'username' => 'required|alpha:ascii',
                'last_name' => 'required|alpha:ascii',
                'email' => 'required|email|unique:users|regex:/.+\@.+\..+/',
                'password' => 'required|string|min:8',
                'date_of_birth' => 'required',
                'address' => 'required',
                'phone_number' => 'required',
                'gender' => 'required',
                'nationality' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'message' => 'Errors in fields validation',
                    'error' => $validator->errors()
                ];
                return response()->json($data, Response::HTTP_BAD_REQUEST);
            }

            $user = new User($request->only([
                'username',
                'first_name',
                'last_name',
                'email',
            ]));
            $user->password_hash = Hash::make($request->input('password'));
            $user->save();

            $date = (new DateTimeImmutable)->format('Y-m-d');
            $user->roles()->attach(3, [
                'created_at' => $date,
                'updated_at' => $date
            ]);

            // return response()->json([
            //     'message' => 'create student',
            //     'user' => $user->id
            // ]);

            $student = new Student([
                'user_id' => $user->id,
                'date_of_birth' => $request->input('date_of_birth'),
                'address' => $request->input('address'),
                'phone_number' => $request->input('phone_number'),
                'gender' => $request->input('gender'),
                'nationality' => $request->input('nationality')
            ]);
            $student->save();

            return response()->json([
                'message' => 'create student',
                'user' => [
                    'id' => $user->id,
                    'student_id' => $student->id,
                ]
            ]);
        } catch (\Throwable $error) {
            return response()->json(
                [
                    'message' => 'error creating user',
                    'error' => $error->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'get student';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $rules = [
            'birth_date' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $data = [
                'message' => 'Errors in fields validation',
                'error' => $validator->errors()
            ];
            return response()->json($data, Response::HTTP_BAD_REQUEST);
        }
        try {
            $student->birth_date = $request->input('birth_date');
            $student->save();
            return response()->json([
                'message' => 'create user',
                'student' => $student
            ]);
        } catch (\Throwable $error) {
            return response()->json(
                [
                    'message' => 'error creating user',
                    'error' => $error->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'delete student';
    }
}
