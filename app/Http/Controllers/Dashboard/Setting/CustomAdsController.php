<?php

namespace App\Http\Controllers\Dashboard\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class CustomAdsController extends Controller
{
    public function updateCustomAds(Request $request)
    {
        $user = Auth::user();
        $adsType = $request->input('adsType', []);
        $offset = $request->input('offset', []);
        $linkAds = $request->input('linkAds', []);
        $data = array();

        for ($i = 0; $i < count($linkAds); $i++) {
            if (!empty($adsType[$i]) && !empty($offset[$i]) && !empty($linkAds[$i])) {
                $data[] = [
                    'adsType' => $adsType[$i],
                    'offset' => $offset[$i],
                    'linkAds' => $linkAds[$i],
                ];
            }
        }

        $data = json_encode($data);

        if (!is_dir('customAds')) {
            mkdir('customAds', 0755, true);
        }

        file_put_contents('customAds/'.$user->id.'.json', $data);

        return response()->json(json_decode($data, true));
    }


}
