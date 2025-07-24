<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {

            $user = Auth::user();
            // if(request('player_id') != null){
            //     $data = [
            //         'user_id' => $user->id,
            //         'player_id' => request('player_id'),
            //     ];
            //     UserPlayerIds::create($data);

            // }
            $success = $user;
            $success['api_token'] = $user->createToken('auth_token')->plainTextToken;


            // $success['player_ids'] = $user->playerids->pluck('player_id');
            // unset($user->playerids);

            return response()->json(['data' => $success], 200);
        } else {
            $message = "Failed to login";
            return json_response($message, 406);
        }
    }

    public function logout()
    {

        return request();
        $auth = Auth::user();
        $auth->currentAccessToken()->delete();
        // if (request('player_id') !== null) {
        //     $user = UserPlayerIds::where('user_id', $auth->id)->where('player_id', request('player_id'))->get();
        //     if ($request->is('api*')) {
        //         $user->each(function ($record) {
        //             $record->delete();
        //         });
        //         return comman_message_response('Logout successfully');
        //     }
        // }
        return json_response('Logout successfully');
    }
}
