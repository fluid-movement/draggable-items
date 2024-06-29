<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6 text-gray-900 flex">
                    <div class="js-dropzone border p-4 w-1/2">
                        <div id="item-1" class="js-draggable border p-2 cursor-grab" draggable="true">1</div>
                        <div id="item-2" class="js-draggable border p-2 cursor-grab" draggable="true">2</div>
                        <div id="item-3" class="js-draggable border p-2 cursor-grab" draggable="true">3</div>
                        <div id="item-4" class="js-draggable border p-2 cursor-grab" draggable="true">4</div>
                    </div>
                    <div class="js-dropzone border p-4 w-1/2">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
