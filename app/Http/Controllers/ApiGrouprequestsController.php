<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Group;
use App\Dashmessage;
use App\Grouprequest;
use Illuminate\Http\Request;

class ApiGrouprequestsController extends Controller
{

    public function index(Group $group)
    {
        $group = Group::with('grouprequests.scan.user', 'scans.user', 'scans.instantie.instantiemodel', 'scans.answers')->findOrFail($group)->first();
        return $group;
    }

    public function accept(Grouprequest $grouprequest)
    {
        $scan = Scan::findOrFail($grouprequest->scan_id);
        $group = Group::findOrFail($grouprequest->group_id);
        $group->scans()->save($scan);
        $grouprequest->delete();
        return $grouprequest;
    }

    public function deny(Grouprequest $grouprequest)
    {
        $scan = Scan::findOrFail($grouprequest->scan_id);
        $group = Group::findOrFail($grouprequest->group_id);
        Dashmessage::create([
            'message' => 'Helaas is je uitnodiging om mee te doen aan de groep <i>' . $group->title . '</i> geweigerd.',
            'user_id' =>  $scan->user->id
        ]);        
        $grouprequest->delete();
    }

}
