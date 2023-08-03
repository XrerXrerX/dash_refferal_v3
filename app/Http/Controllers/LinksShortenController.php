<?php

namespace App\Http\Controllers;

use App\Models\LinksShorten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LinksShortenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $linkshorten = LinksShorten::latest() // Menambahkan batasan limit 10
            ->get();
        // $results = LinksShorten::orderBy('created_at', 'desc')->paginate(8);
        return view('linksshorten.index', [
            'title' => 'Log Shorten',
            'data' => $linkshorten
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('linksshorten.create', [
            'title' => 'Log Shorten'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username_shorten' => 'required',
            'link_awal' => 'required',
            'link_hasil' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            try {
                LinksShorten::create($request->all());
                return response()->json([
                    'message' => 'Data berhasil disimpan.',
                ]);
            } catch (\Exception $e) {
                return response()->json(['errors' => ['Terjadi kesalahan saat menyimpan data.']]);
            }
        }

        return response()->json([
            'message' => 'Data berhasil disimpan.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(LinksShorten $LinksShorten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $var1 = str_replace("&", " ", $id);
        $var2 = explode("values[]=", $var1);
        $var3 = array_slice($var2, 1);
        $var4 = str_replace(" ", "", $var3);

        if (!empty($var4)) {
            $id = $var4;
            foreach ($id as $index => $ids) {
                $linkshorten[$index] = LinksShorten::where('id', $ids)->first();
            }
        } else {
            $linkshorten = [LinksShorten::where('id', $id)->first()];
        }

        return view('linksshorten.update', [
            'title' => 'Log Shorten',
            'data' => $linkshorten,
            'disabled' => ''
        ]);
    }

    public function views($id)
    {
        $var1 = str_replace("&", " ", $id);
        $var2 = explode("values[]=", $var1);
        $var3 = array_slice($var2, 1);
        $var4 = str_replace(" ", "", $var3);

        if (!empty($var4)) {
            $id = $var4;
            foreach ($id as $index => $ids) {
                $linkshorten[$index] = LinksShorten::where('id', $ids)->first();
            }
        } else {
            $linkshorten = [LinksShorten::where('id', $id)->first()];
        }

        return view('linksshorten.update', [
            'title' => 'Log Shorten',
            'data' => $linkshorten,
            'disabled' => 'disabled'
        ]);
    }


    public function data($id)
    {
        $data = LinksShorten::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        foreach ($id as $index => $idx) {
            $validator = Validator::make($request->all(), [
                'username_shorten.*' => 'required',
                'link_awal.*' => 'required',
                'link_hasil.*' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {
                    $result = LinksShorten::find($idx);
                    $result->username_shorten = $request->username_shorten[$index];
                    $result->link_awal = $request->link_awal[$index];
                    $result->link_hasil = $request->link_hasil[$index];
                    $result->save();
                } catch (\Exception $e) {
                    return response()->json(['errors' => ['Terjadi kesalahan saat menyimpan data.']]);
                }
            }
        }
        return response()->json(['success' => 'Item berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('values');

        if (!is_array($ids)) {
            $ids = [$ids];
        }

        foreach ($ids as $id) {
            $LinksShorten = LinksShorten::findOrFail($id);
            $LinksShorten->delete();
        }

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
