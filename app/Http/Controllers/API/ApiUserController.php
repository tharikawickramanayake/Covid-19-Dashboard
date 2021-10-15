<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Photo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ApiUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $validated_data = $request->validate([
            'role_id' => ['required'],
            'username' => ['required', 'unique:users', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $role = Role::find($validated_data['role_id']);

        if (is_null($role)) {
            return response()->json(['message' => 'Failed to get role!'], 404);
        }

        $user = User::create([
            'username' => $validated_data['username'],
            'email' => $validated_data['email'],
            'password' => $validated_data['password'],
            'is_active' => true
        ]);
        $user->syncRoles($role);

        $has_photo = $request->photo['file'];
        if ($has_photo) {

            $name = time() . explode('.', $request->photo['name'])[0]  . '.' . explode('/', explode(':', substr($request->photo['file'], 0, strpos($request->photo['file'], ';')))[1])[1];
            Image::make($request->photo['file'])->resize(720, 720, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(600, 600)->save(storage_path('app/public/images/profile/') . $name);

            Photo::create([
                'user_id' => $user->id,
                'path' => $name
            ]);
        } else {
            Photo::create([
                'user_id' => $user->id,
            ]);
        }

        return response()->json(['message' => 'User added successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function profile()
    {
        $user = auth('api')->user();
        $role = $user->getRoleNames()[0];
        $photo = $user->photo;

        return response()->json(['user' => $user, 'role' => $role, 'photo' => $photo]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;

        $validated_data = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'current_password' => ['required', 'string', 'min:8'],
            'username' => ['required']
        ]);

        if (Auth::guard('web')->attempt(['username' => $validated_data['username'], 'password' => $validated_data['current_password']], false, false)) {

            $user = User::find($id);
            $user->email = $validated_data['email'];

            if ($request->password != null) {
                $user->password = $validated_data['password'];
            }

            $user->save();

            if (is_null($user)) {
                return response()->json(['message' => 'Failed to update user!'], 400);
            } else {
                return response()->json(['message' => 'User updated successfully!'], 200);
            }
        } else {
            // invalid credentials, act accordingly
            return  response()->json(['message' => 'Unable to update, authentication failed!'], 400);
        }
    }

    public function update_profile_pic(Request $request, $id)
    {

        $user = User::find($id);

        if(is_null($user)){
            return response()->json(['message' => 'Unable to locate user!'], 400);
        }

        //If the user already has a photo delete from storage, make photo path to null
        if ($user->photo->getRawOriginal('path') != null) {
            $file_name = $user->photo->getRawOriginal('path');
            Storage::delete('/public/images/profile/' . $file_name);

            $user->photo()->update([
                'path' => null
            ]);
        }

        $has_photo = $request->photo['file'];
        if ($has_photo) {

            $name = time() . explode('.', $request->photo['name'])[0]  . '.' . explode('/', explode(':', substr($request->photo['file'], 0, strpos($request->photo['file'], ';')))[1])[1];
            Image::make($request->photo['file'])->resize(720, 720, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(600, 600)->save(storage_path('app/public/images/profile/') . $name);

            $user->photo()->update([
                'path' => $name
            ]);
        }

        return response()->json(['message' => 'Profile picture updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
