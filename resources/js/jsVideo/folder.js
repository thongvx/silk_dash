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
    const box = 'add-folder'
    $('#fixed-box-control').append(addFolder)
    fixedBox(box)
    const limit = $('[folder]:eq(0) a').data('limit')
    $('#add-folder form').on('submit', function(e) {
        e.preventDefault();
        const folderName = $(this).find('input[name="name-folder"]').val();
        const bntSubmit = $(this).find('button[type="submit"]');
        $.ajax({
            url: '/folder',
            type: 'POST',
            data: {
                nameFolder: folderName
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
                $('[folder]:eq(0)').after(`<div folder
                                            class="item-folder rounded-lg text-white flex justify-between px-2 py-1.5 mb-2 bg-[#142132] hover:bg-[#009FB2] from-[#009FB2] to-[#4CBE1F]">
                                            <a class="w-full btn-page-folder" href="javascript:;" data-folderid="${data.folder.id}" data-limit="${limit}">
                                                <h5>
                                                    <span name-folder>${data.folder.name}</span> - 0 files
                                                </h5>
                                            </a>
                                            <li class="list-none pl-4">
                                                <span class="relative"><a href="javascript:;" dropdown-trigger
                                                                          aria-expanded="false" class="flex items-center"><i
                                                            class="material-symbols-outlined">more_vert</i></a>
                                                  <ul dropdown-menu
                                                      class="text-sm transform-dropdown bg-slate-900 before:font-awesome before:leading-default before:duration-350 before:ease
                                                         shadow-lg shadow-slate-900 duration-250 px-5 before:sm:right-1 before:text-5.5 pointer-events-none absolute right-1 top-8 -lg:top-0
                                                         origin-top list-none rounded-lg  bg-clip-padding text-white z-10
                                                         py-4 text-left opacity-0 transition-all before:absolute before:right-0 before:left-auto before:top-0 before:z-10
                                                         before:inline-block before:font-normal before:text-slate-900 before:antialiased before:transition-all before:text-xl before:content-['▲'] sm:-mr-6                         lg:absolute lg:right-6 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                                                    <!-- add show class on dropdown open js -->
                                                    <li class="relative w-max btn-edit-folder hover:text-[#009FB2] items-center flex"><i
                                                            class="material-symbols-outlined opacity-1 mr-2">edit_square</i>
                                                        Edit Folder
                                                    </li>
                                                    <li class=" mt-3 relative btn-delete-folder hover:text-[#009FB2] items-center flex"><i
                                                            class="material-symbols-outlined opacity-1 mr-2">delete</i>
                                                        Delete
                                                    </li>
                                                  </ul>
                                                </span>
                                            </li>
                                        </div>`)
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
    const box = 'edit-folder'
    $('#fixed-box-control').append(formEditFolder)
    fixedBox(box)
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
                newNameFolder: newfolderName
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
                folder.find('span:eq(0)').text(data.folder.name)
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
