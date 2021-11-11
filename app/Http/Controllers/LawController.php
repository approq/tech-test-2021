<?php

namespace App\Http\Controllers;

use App\Models\Law;
use Illuminate\Http\JsonResponse;

/**
 * Class LawController
 * @package App\Models
 */
class LawController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(['laws' => Law::paginate(1)]);
    }
}
