<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCategories(Request $request)
    {
        $userId = $request->input('user_id');

        // Sử dụng Query Builder để lấy danh sách category dựa trên $userId
        $categories = DB::table('doctor_categories')
            ->where('user_id', $userId)
            ->select('id', 'name')
            ->get();

        return response()->json($categories);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $users = DB::table('users')
            ->select('id', 'name')
            ->get();
        return view('client.pages.booking', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
