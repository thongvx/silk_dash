@extends('dashboard.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Video</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('my-videos.update', $video->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="videoID">Video ID</label>
                                    <input type="text" name="videoID" id="videoID" class="form-control" value="{{ $video->videoID }}">
                                </div>

                                <div class="form-group">
                                    <label for="middleVideoID">Middle Video ID</label>
                                    <input type="text" name="middleVideoID" id="middleVideoID" class="form-control" value="{{ $video->middleVideoID }}">
                                </div>

                                <div class="form-group">
                                    <label for="originVideo">Origin Video</label>
                                    <input type="text" name="originVideo" id="originVideo" class="form-control" value="{{ $video->originVideo }}">
                                </div>

                                <div class="form-group">
                                    <label for="userID">User ID</label>
                                    <input type="text" name="userID" id="userID" class="form-control" value="{{ $video->userID }}">
                                </div>

                                <div class="form-group">
                                    <label for="folder">Folder</label>
                                    <input type="text" name="folder" id="folder" class="form-control" value="{{ $video->folder }}">
                                </div>

                                <div class="form-group">
                                    <label for="pathstream">Path Stream</label>
                                    <input type="text" name="pathstream" id="pathstream" class="form-control" value="{{ $video->pathstream }}">
                                </div>

                                <div class="form-group">
                                    <label for="sd">SD</label>
                                    <input type="text" name="sd" id="sd" class="form-control" value="{{ $video->sd }}">
                                </div>

                                <div class="form-group">
                                    <label for="hd">HD</label>
                                    <input type="text" name="hd" id="hd" class="form-control" value="{{ $video->hd }}">
                                </div>

                                <div class="form-group">
                                    <label for="fhd">FHD</label>
                                    <input type="text" name="fhd" id="fhd" class="form-control" value="{{ $video->fhd }}">
                                </div>

                                <div class="form-group">
                                    <label for="softDelete">Soft Delete</label>
                                    <input type="text" name="softDelete" id="softDelete" class="form-control" value="{{ $video->softDelete }}">
                                </div>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $video->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="poster">Poster</label>
                                    <input type="text" name="poster" id="poster" class="form-control" value="{{ $video->poster }}">
                                </div>

                                <div class="form-group">
                                    <label for="gridposter">Grid Poster</label>
                                    <input type="text" name="gridposter" id="gridposter" class="form-control" value="{{ $video->gridposter }}">
                                </div>

                                <div class="form-group">
                                    <label for="sub">Sub</label>
                                    <input type="text" name="sub" id="sub" class="form-control" value="{{ $video->sub }}">
                                </div>

                                <div class="form-group">
                                    <label for="totalPlay">Total Play</label>
                                    <input type="text" name="totalPlay" id="totalPlay" class="form-control" value="{{ $video->totalPlay }}">
                                </div>

                                <div class="form-group">
                                    <label for="lastPlayed">Last Played</label>
                                    <input```html
                                    type="text" name="lastPlayed" id="lastPlayed" class="form-control" value="{{ $video->lastPlayed }}">
                                </div>

                                <div class="form-group">
                                    <label for="dateUpload">Date Upload</label>
                                    <input type="text" name="dateUpload" id="dateUpload" class="form-control" value="{{ $video->dateUpload }}">
                                </div>

                                <div class="form-group">
                                    <label for="size">Size</label>
                                    <input type="text" name="size" id="size" class="form-control" value="{{ $video->size }}">
                                </div>

                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="text" name="duration" id="duration" class="form-control" value="{{ $video->duration }}">
                                </div>

                                <div class="form-group">
                                    <label for="quality">Quality</label>
                                    <input type="text" name="quality" id="quality" class="form-control" value="{{ $video->quality }}">
                                </div>

                                <div class="form-group">
                                    <label for="format">Format</label>
                                    <input type="text" name="format" id="format" class="form-control" value="{{ $video->format }}">
                                </div>

                                <!-- Add other fields of the Video model as needed -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
