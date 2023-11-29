<?php

namespace App\Http\Controllers;

use App\Enums\UserGender;
use App\Enums\UserRole;
use App\Models\Student;
use App\Models\User;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            // validate
            $rules = [
                'username' => 'unique:users|required|string',
                'last_name' => 'required|alpha:ascii',
                'email' => 'required|email|unique:users|regex:/.+\@.+\..+/',
                'password' => 'required|string|min:8',
                'date_of_birth' => 'sometimes|date',
                'address' => 'sometimes|string',
                'phone_number' => 'required|string',
                'gender' => ['required', Rule::enum(UserGender::class)],
                'nationality' => 'required|alpha:ascii'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data = [
                    'message' => 'Errors in fields validation',
                    'error' => $validator->errors()
                ];
                return response()->json($data, Response::HTTP_BAD_REQUEST);
            }

            // create a new user
            $user = new User;
            $user->username = $request->username;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password_hash = Hash::make($request->input('password'));
            $user->save();

            // attach roles to the user
            $date = (new DateTimeImmutable())->format('Y-m-d');
            $user->roles()->attach(UserRole::STUDENT->value, [
                'created_at' => $date,
                'updated_at' => $date
            ]);

            // create a new student
            $student = new Student;
            $student->user_id = $user->id;
            $student->date_of_birth = $request->date_of_birth;
            $student->address = $request->address;
            $student->phone_number = $request->phone_number;
            $student->gender = $request->gender;
            $student->nationality = $request->nationality;
            $student->save();

            // response
            return response()->json([
                'message' => 'Student registration successful',
                'user' => [
                    'id' => $user->id,
                    'student_id' => $student->id,
                ]
            ]);
        } catch (\Throwable $error) {
            return response()->json(
                [
                    'message' => 'Error while registering student',
                    'error' => $error->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
