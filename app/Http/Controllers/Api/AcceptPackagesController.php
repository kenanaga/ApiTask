<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Http\Requests\AcceptPackagesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Jobs\AcceptPackagesJob;
use Illuminate\Http\Request;




class AcceptPackagesController extends Controller
{
    public function acceptPackages(AcceptPackagesRequest $request){

        $validated = $request->validated();
        $items = $validated['items'];
        $userid = auth()->user()->id;

            if(!empty($items) && !empty($userid)){

                AcceptPackagesJob::dispatch($items,$userid);
                   return response()->json([
                    'status' => true,
                    'message' => 'Packages accept Successfully',
                         ], 200);
            } else{
                return response()->json([
                    'status' => false,
                    'message' => 'Error',
                         ], 404);
            }

             
    }
}
