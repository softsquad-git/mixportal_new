<?php

namespace App\Http\Controllers;

use App\WebsiteTabs;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class TabsController extends Controller
{
    public function index($name){
        $data = WebsiteTabs::where('name',$name)->get();

        if($data)return view('tabs.tab',['data'=>$data[0]['content']]);

}

    public function list(Request $request){
        $allTabs = WebsiteTabs::all();

        $data = $request->all();
        $indexer =1;
        if($data) {
            foreach ($allTabs as $tab) {
               $tab->content = $data[$indexer];
               $tab->save();
               $indexer++;
            }
        }

        return view('tabs.edit',['list'=>$allTabs]);
    }
}
