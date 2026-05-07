<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;
use phpDocumentor\Reflection\Types\Nullable;

class MenuController extends Controller
{
    protected $menu;
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function index()
    {

        $menu_categories = MenuCategory::latest()->get();
        $parent_menus = Menu::where('parent_id', null)->get();



        $menu_items = Menu::orderBy('position', 'asc')->whereIn('header_footer', ['1','3'])->get();
        $menu_footer = Menu::orderBy('position', 'asc')->whereIn('header_footer', ['2','3'])->get();
        return view('backend.menu.index', compact('menu_items', 'menu_footer','menu_categories','parent_menus'));
    }

    public function create()
    {
        $menu_categories = MenuCategory::latest()->get();
        // dd($menu_categories);
        $parent_menus = Menu::where('parent_id', null)->get();
        return view('backend.menu.create', compact('menu_categories', 'parent_menus'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'required',
            'menu_category' => 'required',
            'page_title'=>'required',
            'main_child' => 'required',
            'parent_id' => '',
            'show_in' => '',
            'image'=>'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'meta_title'  => '',
            'meta_keywords'  => '',
            'meta_description'  => '',
            'og_image' => 'nullable|string|max:250',
            'title_slug'=>'nullable',
            'content_slug'=>'nullable'

        ]);
        // return $request->all();
        $parent_id = NULL;
        $show_in = 1;
        if($request['main_child'] == 1)
        {
            $parent_id = $request['parent_id'];
        }
        else if($request['main_child'] == 0)
        {
            $show_in = $request['show_in'];
        }
        $menu_count = Menu::all()->count();
        $new_menu = Menu::create([
            'name' => $request['name'],
            'slug' => Str::slug($request->name),
            'position' => $menu_count + 1,
            'category_slug' => $request['menu_category'],
            'main_child' => $request['main_child'],
            'parent_id' => $parent_id,
            'external_link' => $request['external_link'],
            'header_footer' => $show_in,
            'banner_image' => $request->banner_image,
            'image' => $request->image,
            'publish_status'=>$request->publish_status ?? 0,
            'page_title' => $request['page_title'],
            'title_slug' => Str::slug($request->page_title),
            'content_slug' => $request['content_slug'],
            'content' => $request['content'],
            'meta_title' => $request['meta_title'],
            'meta_keywords' => $request['meta_keywords'],
            'meta_description' => $request['meta_description'],
            'og_image' => $request->og_image,

        ]);
        $new_menu->save();
        return redirect()->route('menu.index')->with('success', 'Menu information is saved successfully.');
    }

    public function show(Menu $menu)
    {
        //
    }

    public function edit($id)
    {
        $menu = Menu::findorFail($id);
        $menu_categories = MenuCategory::latest()->get();
        $parent_menus = Menu::where('parent_id', null)->get();
        return view('backend.menu.edit', compact('menu', 'menu_categories', 'parent_menus'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'    => 'required',
            'page_title'    => 'required',
            'menu_category' => 'required',
            'main_child' => 'required',
            'parent_id' => '',
            'show_in' => '',
            'image'=>'nullable|string|max:250',
            'banner_image' => 'nullable|string|max:250',
            'meta_title'  => '',
            'meta_keywords'  => '',
            'meta_description'  => '',
            'og_image' => 'nullable|string|max:250',
            'content_slug'=>'nullable'
        ]);
        $menu = Menu::findorFail($id);
        $parent_id = NULL;
        $show_in = 1;
        if($request['main_child'] == 1)
        {
            $parent_id = $request['parent_id'];
        }
        else if($request['main_child'] == 0)
        {
            $show_in = $request['show_in'];
        }

        $menu->update([
            'name' => $request['name'],
            'slug' => Str::slug($request->name),
            'category_slug' => $request['menu_category'],
            'main_child' => $request['main_child'],
            'parent_id' => $parent_id,
            'external_link' => $request['external_link'],
            'header_footer' => $show_in,
            'banner_image' => $request->banner_image,
            'image' => $request->image,
            'page_title' => $request['page_title'],
            'content_slug' => $request['content_slug'],
            'title_slug' => Str::slug($request->page_title),
            'content' => $request['content'],
            'meta_title' => $request['meta_title'],
            'publish_status'=>$request->publish_status ?? 0,
            'meta_keywords' => $request['meta_keywords'],
            'meta_description' => $request['meta_description'],
            'og_image' => $request->og_image,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu information is updated successfully.');
    }

    public function destroy($id)
{
    $menu = Menu::findOrFail($id);
    $child_menus = Menu::where('parent_id', $menu->id)->get();

    if (count($child_menus) > 0) {
        return response()->json(['success' => false, 'message' => 'This menu contains child menus.']);
    } else {
        if ($menu->banner_image) {
            Storage::disk('uploads')->delete($menu->banner_image);
        }
        $menu->delete();
        return response()->json(['success' => true, 'message' => 'Menu item deleted successfully.']);
    }
}

    public function menuLinkCourse()
    {
        return Course::forMenu()->select('id','slug','title')->get();
    }

    // public function updateMenuOrder(Request $request)
    // {
    //     parse_str($request->sort, $arr);
    //     $order = 1;
    //     if (isset($arr['menuItem'])) {
    //         foreach ($arr['menuItem'] as $key => $value) {  //id //parent_id
    //             $this->menu->where('id', $key)
    //                 ->update([
    //                     'position' => $order,
    //                     'parent_id' => ($value == "null") ? NULL : $value,
    //                     'main_child' => ($value == "null") ? 0 : 1,
    //                 ]);
    //             $order++;
    //         }
    //     }
    //     return true;
    // }

    public function updateMenuOrder(Request $request)
    {
        $orderArray = $request->input('order');

        if (!is_array($orderArray)) {
            return response()->json(['success' => false, 'message' => 'Invalid data format.']);
        }

        foreach ($orderArray as $index => $item) {
            $menuId = $item['id'];
            $parentId = $item['parent_id'] ?? null;

            Menu::where('id', $menuId)->update([
                'position' => $index + 1,
                'parent_id' => $parentId,
                'main_child' => $parentId ? 1 : 0,
            ]);
        }

        return response()->json(['success' => true]);
    }

    private function update_child($id)
    {
        $menus = Menu::where('parent_id', $id)->get();
        if ($menus->count() > 1) {
            foreach ($menus as $child) {
                Menu::where('id', $child->id)->update(['parent_id' => $child->id]);
                $this->update_child($child->id);
            }
            // $this->forgetMenuCache();
        }
    }

    public function create_menuCategory(Request $request)
    {
        $menuCategory = MenuCategory::create([
            'name' => $request['name'],
            'slug' => Str::slug($request->name),
        ]);
        $menuCategory->save();
    }
}
