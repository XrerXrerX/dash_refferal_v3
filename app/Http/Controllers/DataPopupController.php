<?php

namespace App\Http\Controllers;

use App\Models\DataPopup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class DataPopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datapopup = DataPopup::latest() // Menambahkan batasan limit 10
            ->get();
        // $results = DataPopup::orderBy('created_at', 'desc')->paginate(8);
        return view('datapopup.index', [
            'title' => 'Data Popup',
            'data' => $datapopup
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datapopup.create', [
            'title' => 'Data Popup'
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
                DataPopup::create($request->all());
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
    public function show(DataPopup $DataPopup)
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
                $datapopup[$index] = DataPopup::where('id', $ids)->first();
            }
        } else {
            $datapopup = [DataPopup::where('id', $id)->first()];
        }

        return view('datapopup.update', [
            'title' => 'Data Popup',
            'data' => $datapopup,
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
                $datapopup[$index] = DataPopup::where('id', $ids)->first();
            }
        } else {
            $datapopup = [DataPopup::where('id', $id)->first()];
        }

        return view('datapopup.update', [
            'title' => 'Data Popup',
            'data' => $datapopup,
            'disabled' => 'disabled'
        ]);
    }


    public function data($id)
    {
        $data = DataPopup::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request)
    // {
    //     $id = $request->id;
    //     foreach ($id as $index => $idx) {
    //         $validator = Validator::make($request->all(), [
    //             'judul_event.*' => 'required',
    //             'desk_event.*' => 'required',
    //             'gambar_event.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //             'switch_desk.*' => 'required'

    //         ]);

    //         if ($validator->fails()) {
    //             return response()->json(['errors' => $validator->errors()->all()]);
    //         } else {
    //             try {
    //                 $result = DataPopup::find($idx);
    //                 $result->judul_event = $request->judul_event[$index];
    //                 $result->desk_event = $request->desk_event[$index];

    //                 if ($request->hasFile('gambar_event') && $request->file('gambar_event')[$index]->isValid()) {
    //                     if ($result->gambar_event) {
    //                         Storage::disk('public')->delete($result->gambar_event);
    //                     }

    //                     $gambar_event = $request->file('gambar_event')[$index];
    //                     $gambar_eventPath = $gambar_event->store('public/images/Datapopup_img');
    //                     $gambar_eventPath = str_replace('public/', '', $gambar_eventPath);
    //                     $result->gambar_event = $gambar_eventPath;
    //                 }
    //                 $result->switch_desk = isset($request->switch_desk[$index]) ? 1 : 0;

    //                 $result->save();
    //             } catch (\Exception $e) {
    //                 echo "Pesan error: " . $e->getMessage();
    //                 die;
    //                 return response()->json(['errors' => ['Terjadi kesalahan saat menyimpan data.']]);
    //             }
    //         }
    //     }
    //     return response()->json(['success' => 'Item berhasil diupdate!']);
    // }

    public function update(Request $request)
    {
        $id = $request->id;

        foreach ($id as $index => $idx) {
            $validator = Validator::make($request->all(), [
                'judul_event.*' => 'required',
                'desk_event.*' => 'nullable',
                'gambar_event.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'switch_desk.*' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                try {
                    $result = DataPopup::find($idx);
                    $result->judul_event = $request->judul_event[$index];
                    $result->desk_event = $request->desk_event[$index] == null ? '' : $request->desk_event[$index];

                    if ($request->hasFile('gambar_event') && $request->file('gambar_event')[$index]->isValid()) {
                        if ($result->gambar_event) {
                            $pathToFile = $result->gambar_event;
                            if (file_exists($pathToFile)) {
                                unlink($pathToFile);
                            }
                        }
                        $gambar_event = $request->file('gambar_event')[$index];
                        $filename = time() . '_' . Str::random(10) . '.' . $gambar_event->getClientOriginalExtension();
                        $gambar_event->move('xx88/images/Datapopup_img', $filename);
                        $result->gambar_event = 'xx88/images/Datapopup_img/' . $filename;
                    }

                    $result->switch_desk = isset($request->switch_desk[$index]) && $request->switch_desk[$index] != '0' ? '1' : '0';

                    $result->save();
                } catch (\Exception $e) {
                    dd($e->getMessage());
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
            $DataPopup = DataPopup::findOrFail($id);\
            $DataPopup->delete();
        }

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
