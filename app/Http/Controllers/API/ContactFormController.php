<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactFormController extends Controller
{
    public function contactForm(Request $request): \Illuminate\Http\JsonResponse
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|string|max:20',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            $contactForm = ContactForm::create($validatedData);

            return response()->json([
                'message' => 'Contact form submitted successfully',
                'data' => $contactForm
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }
    }
}
