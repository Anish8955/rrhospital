<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function appointment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'phone' => 'required|string', // Adjust max length for phone number
            'email' => 'required|email|max:250',
            'date' => 'required|date',
            'area' => 'required|string|max:250',
            'city' => 'required|string|max:250',
            'state' => 'required|string|max:250',
            'code' => 'required|string|max:20', // Adjust max length for postal code
        ]);
    
        Appointment::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date' => $request->date,
            'area' => $request->area,
            'city' => $request->city,
            'state' => $request->state,
            'code' => $request->input('code'), // Adjust field name to match HTML form
        ]);
    
        return redirect()->route('welcome')->withSuccess('Appointment booked successfully!');
    }

    public function allappointment()
    {
        $appointment = appointment::all();
        return view('admin.appointment.allappointment', ['appointment' => $appointment]);
    } 

    public function deleteappointment($id)
    {
        $appointment = appointment::findOrFail($id);

        $appointment->delete();
    
        // Redirect back to user list or other appropriate page
        return redirect()->route('allappointment');
    } 

}
