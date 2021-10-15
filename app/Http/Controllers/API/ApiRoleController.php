<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiRoleController extends Controller
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
    }

    public function getRolesBasedOnPermission($id)
    {
        $roles = null;

        $user = User::find($id);

        if (is_null($user)) {
            return response()->json(['message' => 'Unable to locate user!'], 404);
        } else {
            if ($user->hasRole('Super Admin')) {
                $roles = Role::all();
                return response()->json($roles, 200);
            } else {
                $roles = Role::where('name', '!=', 'Super Admin')->get();
                return response()->json($roles, 200);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => ['required', 'unique:roles']
        ]);


        //temp solution
        $input = [
            'name' => $validated_data['name'],
            'guard_name' => 'web'
        ];

        $role = Role::create($input);

        if (is_null($role)) {
            return response()->json(['message' => 'Role Creation Failed!'], 400);
        } else {
            return response()->json(['message' => 'Role Created Successfully!'], 200);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);

        if (is_null($role)) {
            return response()->json(['message' => 'Failed to locate role!'], 404);
        } else {

            $permissions = $role->permissions()->get(['name']);
            return response()->json([
                'message' => 'Found role and related permissions!',
                'role' => $role,
                'permissions' => $permissions
            ], 200);
        }
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
        $validated_data = $request->validate([
            'name' => ['required', 'unique:roles,name,' . $id]
        ]);

        $role = Role::find($id);

        if (is_null($role)) {
            return response()->json(['message' => 'Role Update Failed, Unable To Located Role!'], 404);
        } else {
            $role->update([
                'name' => $validated_data['name']
            ]);

            $permissions = $request->permissions;
            foreach ($permissions as $permission) {

                //gets the sub array inside permissions on each element
                $sub_array = ($permission['permissions']);
                foreach ($sub_array as $key => $value) {

                    //Construct the permission phrase based on key dynamically
                    $pm_phrase = $permission['data']['phrase'] . $key;

                    if ($value) {
                        //Add Permission
                        $role->givePermissionTo($pm_phrase);
                    } else {
                        //Remove Permission
                        $role->revokePermissionTo($pm_phrase);
                    }
                }
            }


            return response()->json(['message' => 'Role Updated Successfully!'], 200);
        }
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
