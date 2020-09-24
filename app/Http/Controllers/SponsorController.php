<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();

        $sponsors->each(function ($value, $key) {
            $value["links"] = [
                "edit" => URL::route('sponsors.write', $value->id),
                "delete" => URL::route('sponsors.delete', $value->id),
            ];
        });

        return Inertia::render('SponsorsManager', [
            "sponsors" => $sponsors
        ]);
    }

    public function newSponsorPage(Request $request)
    {
        $sponsor = Sponsor::find($request->id);

        return Inertia::render('NewSponsor', [
            "stored" => $sponsor ?? null,
            "publishTo" => URL::route('sponsors.publish'),
        ]);
    }

    public function store(Request $request)
    {
        if ($request->id) {
            $sponsor = Sponsor::find($request->id);

            if ($sponsor) {
                $sponsor->update($request->all());
                return redirect()->route('sponsors.list');
            } else {
                //TODO Populate error bag
                return redirect()->back('500');
            }
        } else {
            Sponsor::create($request->all());
            return redirect()->route('sponsors.list');
        }
    }

    public function delete($id)
    {
        Sponsor::findOrFail($id)->delete();

        return redirect()->route('sponsors.list');
    }
}
