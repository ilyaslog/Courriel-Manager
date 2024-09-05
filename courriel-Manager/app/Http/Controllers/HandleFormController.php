<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Courriels\UrgenceController;
use App\Http\Controllers\Courriels\ImportanceController;

class HandleFormController extends Controller
{
    public function handle(Request $request)
    {
        // Determine which controller to use based on the 'controller' input
        switch ($request->input('controller')) {
            case 'urgence':
                $response = app(UrgenceController::class)->store($request);
                break;
            case 'importance':
                $response = app(ImportanceController::class)->store($request);
                break;
            default:
                abort(404); // Handle invalid controller value
                break;
        }

        // Check if the response is a redirect back (assuming it returns redirect()->back())
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            // If it's a redirect response, redirect back to ParametrageCourriels with success message
            return $response->with('success', 'Form submitted successfully.');
        } else {
            // Otherwise, return the ParametrageCourriels view
            return view('ParametrageCourriels');
        }
    }
}
