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
        // Validate that either NIC or phone number is provided
        $request->validate([
            'query' => 'required|string',
        ]);

        $query = $request->input('query');

        // Search for criminal by NIC or phone
        $criminals = CriminalRecord::where('criminal_nic', $query)
            ->orWhere('criminal_mobile', $query)
            ->get();

        // If criminals found, return their data
        if ($criminals->count() > 0) {
            return response()->json([
                'found' => true,
                'data' => $criminals
            ]);
        }

        // If no criminal found, return found as false
        return response()->json(['found' => false]);
    }

    

    
}
