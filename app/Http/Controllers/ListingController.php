<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    // public function index() {
    //         return view('listings.index', [
    //         'listings' => Listing::all()
    //     ]);
    // }

    // Show all listings
    //  public function index() {
    //         return view('listings.index', [
    //         'listings' => Listing::latest()->filter(request(['tag']))->get()
    //     ]);
    // }

    // Show all listings
    // public function index() {
    //         return view('listings.index', [
    //         'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
    //     ]);
    // }

    // Show all listings 
    # paginate() -> gets all listing and paginate(2) -> gets only 2 listing
    public function index() {
            return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate()
        ]);
        // return view('listings.index', [
        //     'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate()
        // ]);
    }

    // Show single listing
    public function show(Listing $listing) {
            return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show listing form
    public function create() {
        return view('listings.create');
    }

    // Store listing data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    // Update listing data
    public function update(Request $request, Listing $listing) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully');
    }

    // Submit listing data
    public function submitListing(Request $request, Listing $listing) {

        // Make sure loggged in user is owner when updating
        if ($listing->id && $listing->user_id != auth()->id()) {
            abort(403, 'Authorized Action');
        }


        $formFields = $request->validate([
            'title' => 'required',
            'company' => $listing->id ? 'required' : ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        if (!($listing->id)) {
            $formFields['user_id'] = auth()->id();
        }

        $listing->id ? $listing->update($formFields) : Listing::create($formFields);

        return $listing->id ? back()->with('message', 'Listing updated successfully') : redirect('/')->with('message', 'Listing created successfully');
    }

    // Show edit listing form
    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    // Show listing form
    public function listingForm(Listing $listing) {
        return view('listings.listing-form', [
            'listing' => $listing
        ]);
    }

    // Delete listing
    public function destroy(Listing $listing) {

        // Make sure loggged in user is owner when deleting
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Authorized Action');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

     // Show all listings 
     public function manage() {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get()
        ]);
    }
}
