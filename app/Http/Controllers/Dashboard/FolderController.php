<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\FolderRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
class FolderController
{
    protected $folderRepo;

    public function __construct(FolderRepo $folderRepo)
    {
        $this->folderRepo = $folderRepo;
    }
    public function getAllFolders()
    {
        $userId = Auth::id();
        $folders = $this->folderRepo->getAllFolders($userId);
        $listFolder = [];
        foreach ($folders as $folder) {
            $listFolder[] = [
                'id' => $folder->id,
                'name' => $folder->name_folder,
                'number_file' => $folder->number_file,
                'created_at' => $folder->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $folder->updated_at->format('Y-m-d H:i:s')
            ];
        }
        $data = [
            'msg' => 'oke',
            'sever_time' => date('Y-m-d H:i:s'),
            'status' => '200',
            'folders' => $listFolder
        ];
        return $data;
    }
    public function index()
    {
        $user = Auth::user();
        $folders = $this->folderRepo->getAllFolders($user->id);
        return view('dashboard.video.folder', $folders);
    }
    // Get all folders
    public function show($id)
    {
        // Fetch the folder from the database
        $folder = $this->folderRepo->find($id);

        // Check if the folder exists
        if (!$folder) {
            return response()->json(['message' => 'Folder not found'], 404);
        }

        // Return the folder
        return response()->json($folder);
    }
    // create a new folder
    public function store(Request $request)
    {
        if ($request->nameFolder == null){
            return response()->json(
                [
                    'msg'=>'ok',
                    'sever_time' => date('Y-m-d H:i:s'),
                    'status' => '400',
                    'result' => 'false'
                ]
            );
        }
        // Validate the request data
        $request->validate([
            'nameFolder' => 'required|string|max:255',
        ]);
        $user = Auth::user();
        // Create a new folder
        $folder = new Folder;
        $folder->name_folder = $request->nameFolder;
        $folder->user_id = $user->id;
        $folder->number_file = 0;
        $folder->save();

        // Return a response
        return response()->json(
                [
                    'msg'=>'ok',
                    'sever_time' => date('Y-m-d H:i:s'),
                    'status' => '200',
                    'folder' => [
                        'id' => $folder->id,
                        'name' => $folder->name_folder,
                    ]
                ]
            );
    }
    // edit a new folder
    public function update(Request $request, $id)
    {
        // Fetch the folder from the database
        $folder = $this->folderRepo->find($id);

        // Check if the folder exists
        if (!$folder) {
            return response()->json(['message' => 'Folder not found'], 404);
        }

        $request->validate([
            'newNameFolder' => 'required|string|max:255',
        ]);

        // Update the folder
        $folder->name_folder = $request->newNameFolder;
        $folder->save();

        // Return a response
        return response()->json(
            [
                'msg' => 'oke',
                'sever_time' => date('Y-m-d H:i:s'),
                'status' => '200',
                'folder' => [
                    'id' => $folder->id,
                    'name' => $folder->name_folder,
                ],
            ]);
    }
    // Delete a folder
    public function destroy($id)
    {
        // Fetch the folder from the database
        $folder = $this->folderRepo->find($id);

        // Check if the folder exists
        if (!$folder) {
            return response()->json(['message' => 'Folder not found'], 404);
        }

        // Delete the folder
        $folder->delete();
        // Return a response
        return response()->json(['message' => 'Folder deleted successfully']);
    }
    // Rest of your code...

}
