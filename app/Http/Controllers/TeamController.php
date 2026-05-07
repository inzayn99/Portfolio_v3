<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class TeamController extends Controller
{
    protected $team;
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function index()
    {
        $teams = Team::orderBy('in_order', 'asc')->get();
        return view('backend.team.index', compact('teams'));
    }

    public function create()
    {
        $teamType = TeamType::latest()->get();
        return view('backend.team.create', compact('teamType'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'post' => 'required',
            'image' => 'nullable|string|max:250',
            'status' => 'nullable',
            'team_type_id' => 'required|integer',
            // 'content' => $request['content'],
            'facebook' => 'nullable|string|max:250',
            'linkedin' => 'nullable|string|max:250',
            'twitter' => 'nullable|string|max:250',
            'youtube' => 'nullable|string|max:250',
        ]);

        $input = $request->all();
        $member_count = Team::orderBy('in_order', 'desc')->first();
        if ($member_count) {
            $input['in_order'] = $member_count->in_order + 1;
        } else {
            $input['in_order'] = 1;
        }
        // $input['image'] = $request->team_image;
        $input['status'] = $request->status ?? 0;
        $input['slug'] = Str::slug($request['name']);

        Team::create($input);
        return redirect()->route('team.index')->with('success', 'Team is created successfully.');
    }


    public function show(Team $team)
    {
        //
    }

    public function edit($id)
    {
        $teamType = TeamType::latest()->get();
        $team = Team::findorfail($id);
        return view('backend.team.edit', compact('team', 'teamType'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'post' => 'required',
            'image' => 'nullable|string|max:250',
            'active' => 'nullable',
            'team_type_id' => 'required|integer',
            // 'content' => $request['content'],
            'facebook' => 'nullable|string|max:250',
            'linkedin' => 'nullable|string|max:250',
            'twitter' => 'nullable|string|max:250',
            'youtube' => 'nullable|string|max:250',
        ]);

        $input = $request->all();
        // $input['image'] = $request->team_image;
        $input['status'] = $request->status ?? 0; // Ensure consistent field usage

        $input['slug'] = Str::slug($request['name']);

        Team::findorfail($id)->update($input);
        return redirect()->route('team.index')->with('success', 'Team is updated successfully.');
    }

    public function destroy($id)
    {
        $existing_team = Team::findOrFail($id);
        // Delete the file if it exists
        if ($existing_team->location) {
            Storage::disk('uploads')->delete($existing_team->location);
        }
        // Delete the team record
        $existing_team->delete();

        // Return a JSON response for AJAX handling
        return response()->json(['success' => true, 'message' => 'Team deleted successfully.']);
    }



    public function updateMemberOrder(Request $request)
    {
        parse_str($request->sort, $arr);
        $order = 1;
        if (isset($arr['menuItem'])) {
            foreach ($arr['menuItem'] as $key => $value) {  //id //parent_id
                $this->team->where('id', $key)
                    ->update([
                        'in_order' => $order,
                    ]);
                $order++;
            }
        }

        return true;
    }

    public function teamTypeIndex()
    {
        $teams = TeamType::latest()->paginate(20);
        return view('backend.team.teamtype',compact('teams'));
    }

    public function teamTypeDestroy($id)
    {
    $teamType = TeamType::findOrFail($id);
    $teamType->delete();

    return response()->json(['success' => true, 'message' => 'Team category has been deleted successfully.']);
}


    public function teamType(Request $request)
    {
        $teamType = TeamType::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $teamType->save();

        $allType = TeamType::get()->map(function ($value, $key)  {
            return "<option value=\"$value->id\">$value->name</option>";
        })->toArray();

        return response()->json([
            'message' => 'Type was created successfully',
            'data' => implode(' ', $allType)
        ], 200);

    }
}
