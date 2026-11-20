<?php
namespace App\Http\Controllers;



use App\Models\Cicle;
use App\Utils\Validacio;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        // $cicles = Cicle::all();
        // $cicles = Cicle::orderBy('codi', 'asc')->get();

        // if ($request->has('search')) {
        //     $searchTerm = $request->input('search');
        //     $cicles->where(function ($query) use ($searchTerm) {
        //         $query->where('codi', 'like', '%' . $searchTerm . '%')
        //             ->orWhere('nom', 'like', '%' . $searchTerm . '%');
        //     });
        // }

        $query = Cicle::query();

        if ($request->has('search')) {
            $query->where('codi', 'like', '%' . $request->input('search') . '%')
                ->orWhere('nom', 'like', '%' . $request->input('search') . '%');
        }

        $cicles = $query->orderBy('codi', 'asc')->get();

        return view('cicles.index', compact('cicles', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cicle = new Cicle();
        $cicle->codi = $request->input('codi');
        $cicle->nom = $request->input('nom');
        try {
            $cicle->save();
            session()->flash('success', 'Cicle creat correctament.');
        } catch (QueryException $ex) {
            $missatgeError = Validacio::missatgeError($ex);       
            session()->flash('error', $missatgeError);
        }

        
        return redirect()->route('cicles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cicle $cicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cicle $cicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cicle $cicle)
    {
        //
        // $cicle = Cicle::find($request->input('id'));
        $cicle->codi = $request->input('edit-codi');
        $cicle->nom = $request->input('edit-nom');

        try {
            $cicle->save();
            session()->flash('correcte', 'Cicle actualitzat correctament.');
        } catch (QueryException $ex) {
            $missatgeError = Validacio::missatgeError($ex);       
            session()->flash('error', $missatgeError);
        }

        return redirect()->route('cicles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cicle $cicle)
    {
        //
        $cicle->delete();
        return redirect()->route('cicles.index');
    }

    public function pepe() {
        
    }
}
