@extends('dashboard.layouts.app')

@section('content')
    <h2>Example</h2>
    <div class="text-center text-white" >

        <h1>Upload File with Resumable.js</h1>
        <div id="resumable-drop">Drag and drop files here or click to select files</div>
        <input type="file" id="resumable-browse" data-url="https://e02.encosilk.cc/upload" style="display:none;">
        <ul id="file-upload-list"></ul>
        <div class="resumable-progress" style="display:none;">
            <span class="progress-resume-link">Pause</span>
            <span class="progress-pause-link" style="display:none;">Resume</span>
            <div class="progress-bar"></div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('assets/js/resumable/lb-resumable.js') }}"></script>
    @vite('resources/js/resumable/resumable.js')
@endsection
