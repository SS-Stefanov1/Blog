<?php
namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller {
    public function index() {
        return view("listings.index", [
            "listings" => Listing::latest()
            ->filter(request(['tag','search']))
            ->paginate(5),
            //->get(),

            //"listings" => Listing::all(), 
        ]);
    }

    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    public function create() {
        return view('listings.create');
    }

    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing,
        ]);
    }

    public function update(Request $req, Listing $listing) {
        $newData = $req->validate([
            'title'    => 'required',
            'company'  => 'required',
            'location' => 'required',
            'website'  => 'required',
            'email'    => ['required', 'email'],
            'tags'     => 'required'
        ]);

        if ($req->hasFile('image')) {
            $newData['image'] = $req->file('image')->store('post_imgs','public');
        }

        $listing->update($newData);
        
        //return redirect("/listings/{{ $listing->id }}")->with('message', 'Post Updated Successfully!');
        return back()->with('message', 'Post Updated Successfully!');
    }

    public function delete(Listing $listing) {
        $listing->delete();

        return redirect('/')->with('message', 'Post deleted successfully');
    }

    public function store(Request $req) {
        //dd($req->hasFile('logo'));

        $formData = $req->validate([
            'title'    => 'required',
            'company'  => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website'  => 'required',
            'email'    => ['required', 'email', Rule::unique('listings', 'email')],
            'tags'     => 'required'
        ]);

        if ($req->hasFile('image')) {
            $formData['image'] = $req->file('image')->store('post_imgs', 'public');
        }

        Listing::create($formData);

        return redirect('/')->with('message', 'Post Added Succesfully!');
    }
}
