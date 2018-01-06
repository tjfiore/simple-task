<?php

namespace App\Policies;

use App\User;
use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    // /**
    //  * Create a new policy instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     //
    // }

    public function destroy(User $user, Request $request)
    {
      # code...
      return $user->id === $request->tasks()->user_id;
    }
}
