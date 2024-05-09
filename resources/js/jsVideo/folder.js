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
                        <div class="spinner-border spinner-border-sm text-white" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span class="ml-2">Loading...</span>
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
let formEditFolder = `<div class="edit" id="edit">
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
    $('#edit form').on('submit', function(e) {
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
                        <div class="spinner-border spinner-border-sm text-white" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span class="ml-2">Loading...</span>
                    </div>
                `)
            },
            success: function(data) {
                folder.find('span:eq(0)').text(data.name)
                $('#edit').remove()
                fixedBox()
                notification('success', 'Edit folder successfully')
            },
            error: function(err) {
                $('#edit').remove()
                fixedBox()
                notification('error', 'Edit folder failed')
            }
        })
    })
})
