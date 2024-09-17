<?php

namespace App\Http\Controllers;

use App\Models\CriminalRecord;
use Illuminate\Http\Request;

class CriminalRecordController extends Controller
{
    public function index()
    {
        // Fetch all records from the criminal_records table
        $records = CriminalRecord::all();

        // Return the data in JSON format
        return response()->json($records);
    }

    public function search(Request $request)
{
    return response()->json(['status' => 'API route is working']);
}

    

    
}
