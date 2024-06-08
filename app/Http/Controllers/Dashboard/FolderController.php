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
        // Validate the request data
        $request->validate([
            'folderName' => 'required|string|max:255',
        ]);
        $user = Auth::user();
        // Create a new folder
        $folder = new Folder;
        $folder->name_folder = $request->folderName;
        $folder->user_id = $user->id;
        $folder->number_file = 0;
        $folder->save();
        $folder->deleteCacheFolder();

        // Return a response
        return response()->json(['message' => 'Folder created successfully', 'folder' => $folder]);
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
            'newfolderName' => 'required|string|max:255',
        ]);

        // Update the folder
        $folder->name_folder = $request->newfolderName;
        $folder->save();
        //delete cache
        $folder->deleteCacheFolder();

        // Return a response
        return response()->json(['name' => $folder->name_folder]);
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
        $folder->deleteCacheFolder();

        // Return a response
        return response()->json(['message' => 'Folder deleted successfully']);
    }
    // Rest of your code...
}
