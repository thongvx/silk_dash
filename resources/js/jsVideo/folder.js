import {fixedBox} from "./video.js";
import {checkAll} from "./video.js";
import { notification } from '../main.js';

//add folder
let addFolder = `<div class="add-folder" id="add-folder">
                            <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Create New Folder</h5>
                            <form class="text-white mt-3">
                                <div class="grid grid-cols-3 gap-4 items-center">
                                    <h5>
                                        Folder name
                                    </h5>
                                    <div class="col-span-2 pr-2">
                                        <input type="text" name="name-folder" class="pl-2 text-sm w-full focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg
                               bg-[#142132] text-white bg-clip-padding py-2 pr-3 transition-all placeholder:text-gray-500
                               focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="title"/>
                                    </div>
                                </div>
                                <button type="submit" class="mt-2 px-5 py-1.5 rounded-lg bg-[#142132] hover:bg-[#009FB2]">Submit</button>
                            </form>
                        </div> `
$(document).on('click', '[btn-add-folder]', function() {
    fixedBox()
    $('#fixed-box-control').append(addFolder)
    $('#add-folder form').on('submit', function(e) {
        e.preventDefault();
        const folderName = $(this).find('input[name="name-folder"]').val();
        const bntSubmit = $(this).find('button[type="submit"]');
        $.ajax({
            url: '/folder',
            type: 'POST',
            data: {
                folderName: folderName
            },
            beforeSend: function() {
                bntSubmit.html(`
                     <div class="flex text-white items-center">
                        <div class="loading">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                        <span>process</span>
                    </div>
                `)
            },
            success: function(data) {
                $('#add-folder').remove()
                fixedBox()
                notification('success', 'Add folder successfully')
                location.reload()
            },
            error: function(err) {
                $('#add-folder').remove()
                fixedBox()
                notification('error', 'Add folder failed')
            }
        })
    })
})
//edit folder
let formEditFolder = `<div class="edit" id="edit-folder">
                                <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Edit file details</h5>
                                <form class="text-white mt-3" action="">
                                    <div class="grid grid-cols-3 gap-4 items-center">
                                        <h5>
                                            Folder name
                                        </h5>
                                        <div class="col-span-2 pr-2 name-folder"></div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4 items-center mt-3">
                                        <h5>
                                            New folder name
                                        </h5>
                                        <div class="col-span-2 pr-2">
                                            <input id="" name="new-folder-name" type="text" class="pl-2 text-sm w-full focus:shadow-primary-outline ease leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid
                                   border-gray-300 bg-slate-900 text-white bg-clip-padding py-2 pr-3 transition-all placeholder:text-gray-500
                                   focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="title"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-2 px-5 py-1.5 rounded-lg bg-[#142132] hover:bg-[#009FB2]">Submit</button>
                                </form>
                            </div>
                            `
$('.btn-edit-folder').on('click', function() {
    fixedBox()
    $('#fixed-box-control').append(formEditFolder)
    const folder = $(this).closest('[folder]');
    const folderId = folder.find('a').data('folderid');
    $('.name-folder').text(folder.find('span:eq(0)').text())
    $('#edit-folder form').on('submit', function(e) {
        e.preventDefault();
        const newfolderName = $(this).find('input[name="new-folder-name"]').val();
        const bntSubmit = $(this).find('button[type="submit"]');
        $.ajax({
            url: '/folder/' + folderId,
            type: 'PATCH',
            data: {
                newfolderName: newfolderName
            },
            beforeSend: function() {
                bntSubmit.html(`
                     <div class="flex text-white items-center">
                        <div class="loading">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                        <span>process</span>
                    </div>
                `)
            },
            success: function(data) {
                folder.find('span:eq(0)').text(data.name)
                $('#edit-folder').remove()
                fixedBox()
                notification('success', 'Edit folder successfully')
            },
            error: function(err) {
                $('#edit-folder').remove()
                fixedBox()
                notification('error', 'Edit folder failed')
            }
        })
    })
})
//delete folder
let formDeleteFolder = `<div class="delete" id="delete-folder">
                                    <form action="">
                                        <h5 class="text-center text-white text-lg">Are you sure you want to remove the selected video?</h5>
                                        <div class="flex justify-center mt-3 text-white ">
                                            <button type="button" class="px-7 py-1.5 rounded-lg bg-gray-400 hover:bg-gray-600 mr-4" fixed-video-close-button>Cancel</button>
                                            <button type="submit" class="px-7 py-1.5 rounded-lg bg-rose-400 hover:bg-rose-600">Delete</button>
                                        </div>
                                    </form>
                                </div>`
$(document).on('click', '.btn-delete-folder', function() {
    fixedBox()
    $('#fixed-box-control').append(formDeleteFolder)
    const folder = $(this).closest('[folder]');
    const folderId = folder.find('a').data('folderid');
    $('#delete-folder form').on('submit', function(e) {
        e.preventDefault();
        const bntSubmit = $(this).find('button[type="submit"]');
        $.ajax({
            url: '/folder/' + folderId,
            type: 'DELETE',
            beforeSend: function() {
                bntSubmit.html(`
                     <div class="flex text-white items-center">
                        <div class="loading">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                        <span>process</span>
                    </div>
                `)
            },
            success: function(data) {
                folder.remove()
                $('#delete-folder').remove()
                fixedBox()
                notification('success', 'Delete folder successfully')
            },
            error: function(err) {
                $('#delete-folder').remove()
                fixedBox()
                notification('error', 'Delete folder failed')
            }
        })
    })
})
