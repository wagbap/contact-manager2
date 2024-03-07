<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ContactController extends Controller
{
 


    public function index(): View
    {
        $contacts = Contact::latest()->paginate(5);
      
        return view('contacts.index',compact('contacts'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }


   
    public function create(): View
    {
        return view('contacts.create');
    }



    public function update(Request $request, Contact $contact): RedirectResponse
{
    $request->validate([
        'name' => 'required|string|min:6',
        'contact' => 'required|digits:9|unique:contacts,contact,' . $contact->id,
        'email' => ['required', 'email', 'unique:contacts,email,' . $contact->id, 'regex:/^[^@]+@[^@]+\.[^@]+$/']
    ]);

    $contact->name = $request->name; 
    $contact->contact = $request->contact; 
    $contact->email = $request->email; 
    $contact->save();

    return redirect()->route('contacts.index')
                     ->with('success', 'Contact updated successfully.');
}
    
    

    public function show(Contact $contact): View
    {
        return view('contacts.show',compact('contact'));
    }



    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }
    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:6',
            'contact' => 'required|digits:9|unique:contacts,contact,' . $contact->id,
            'email' => ['required', 'email', 'regex:/^[^@]+@[^@]+\.[^@]+$/i', function ($attribute, $value, $fail) use ($contact) {
                if (strpos($value, '@.') !== false) {
                    $fail('O campo ' . $attribute . ' é inválido.');
                }
            }]
        ]);      
     
        $contact->name = $request->name; 
        $contact->contact = $request->contact; 
        $contact->email = $request->email; 
        $contact->save();
      
        return redirect()->route('contacts.index')
                        ->with('success','Contato atualizado com sucesso');
    }
    

    public function destroy(Contact $contact): RedirectResponse
 {
     $contact->delete();
    

     return redirect()->route('contacts.index')
                     ->with('success', 'Contact deleted successfully');
 }
 
 
}



