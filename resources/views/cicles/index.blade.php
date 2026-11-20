@extends('layouts.main')

@section('title')
    Cicles
@endsection

@section('content')
    <h1 class="text-3xl font-bold text-heading mb-6">Cicles Formatius</h1>

    <button type="button"
        class="rounded-lg mb-4 text-white bg-gray-500 box-border border border-transparent 
            hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none"
        data-modal-target="crud-modal" data-modal-toggle="crud-modal">
        Nou cicle formatiu
    </button>

    @if (session('correcte'))
        {{-- <div class="ms-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            <span class="block sm:inline">{{ session('correcte') }}</span>
        </div> --}}
        <span class="ms-4 bg-green-200 text-fg-success-strong text-xs font-medium px-1.5 py-0.5 rounded">{{ session('correcte') }}</span>

    @endif

    @if (session('error'))
        {{-- <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div> --}}

        <span
            class="ms-4 bg-red-200 text-fg-danger-strong text-xs font-medium px-1.5 py-0.5 rounded">{{ session('error') }}</span>
    @endif




    <form class="max-w-md mb-6" action="{{ route('cicles.index') }}" method="GET">
        <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only">Search</label>
        <div class="relative">
            <!-- Ícono a la izquierda -->
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </div>

            <!-- Input (se añadió pe-20 para que el texto no tape el botón) -->
            <input type="search" id="search" name ="search" value="{{ request('search') }}"
                class="block w-full p-3 ps-9 pe-20 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                placeholder="Cercar" />

            <!-- Botón a la derecha -->
            <button type="submit"
                class="absolute end-1.5 bottom-1.5 text-white bg-gray-500 hover:bg-brand-strong box-border 
                border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded 
                text-xs px-3 py-1.5 focus:outline-none">
                Cercar
            </button>
        </div>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($cicles as $cicle)
            <div class="bg-neutral-primary-soft flex flex-col justify-between max-w-sm p-6 border-2 rounded-2xl shadow-xs">
                <div>
                    <!-- Cabecera -->
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <h5 class="text-2xl font-semibold tracking-tight text-heading leading-8">
                            {{ $cicle->codi }}
                        </h5>

                        <!-- Grupo de botones sin bordes duplicados -->
                        <div class="inline-flex shadow-xs shrink-0" role="group">
                            <button data-tooltip-target="tooltip-editar-{{ $cicle->id }}" data-tooltip-placement="bottom"
                                type="button"
                                class="rounded-s-lg inline-flex items-center justify-center text-body bg-neutral-primary-soft 
                                border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-3
                                 focus:ring-neutral-tertiary-soft font-medium leading-5 text-sm w-8 h-8 focus:outline-none"
                                 data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                 data-cicle-id="{{ $cicle->id }}"
                                 data-cicle-codi="{{ $cicle->codi }}" data-cicle-nom="{{ $cicle->nom }}"
                                >
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <button data-tooltip-target="tooltip-esborrar-{{ $cicle->id }}"
                                data-tooltip-placement="bottom" type="button"
                                class="rounded-e-lg border-s-0 inline-flex items-center justify-center text-body bg-neutral-primary-soft border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-3 focus:ring-neutral-tertiary-soft font-medium leading-5 text-sm w-8 h-8 focus:outline-none">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Tooltips fuera de la fila flex -->
                    <div id="tooltip-editar-{{ $cicle->id }}" role="tooltip"
                        class="rounded-lg bg-gray-300 absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium transition-opacity duration-300 bg-dark rounded-base shadow-xs opacity-0 tooltip">
                        Modificar
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="tooltip-esborrar-{{ $cicle->id }}" role="tooltip"
                        class="rounded-lg bg-gray-300 absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium transition-opacity duration-300 bg-dark rounded-base shadow-xs opacity-0 tooltip">
                        Esborrar
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <p class="text-body mb-6 line-clamp-2">
                        {{ $cicle->nom }}
                    </p>

                    <!-- Lista con modificadores de Tailwind -->

                    @if ($cicle->moduls->isNotEmpty())
                        <ul
                            class="rounded-md w-full text-sm font-medium text-heading bg-neutral-primary-soft 
                            border border-default divide-y divide-default">
                            @foreach ($cicle->moduls as $modul)
                                <li class="w-full px-4 py-2">
                                    {{ $modul->codi }} - {{ $modul->nom }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            </div>
        @endforeach
    </div>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class=" hidden bg-gray-900/50 overflow-y-auto overflow-x-hidden fixed top-0 
                right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative bg-white p-4 w-full max-w-md max-h-full rounded-lg">
            <!-- Modal content -->
            <div
                class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6 rounded-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Nou cicle formatiu
                    </h3>
                    <button type="button"
                        class="text-body  hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="crud-modal">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->

                <form class="mt-4 max-w-md mx-auto" action="{{ route('cicles.store') }}" method="POST">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="codi" id="codi"
                            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                            placeholder=" " required />
                        <label for="codi"
                            class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 
                                    origin-left peer-focus:inset-s-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 
                                    peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 
                                    rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Codi
                        </label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="nom" id="nom"
                            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                            placeholder=" " required />
                        <label for="nom"
                            class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 
                                    origin-left peer-focus:inset-s-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 
                                    peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 
                                    rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Nom
                        </label>
                    </div>

                    <button type="submit"
                        class="rounded-lg text-white bg-gray-500 box-border border border-transparent hover:bg-brand-strong focus:ring-4 
                            focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        Alta cicle formatiu
                    </button>
                </form>

            </div>
        </div>
    </div>


    <!-- Edit modal -->
    <div id="edit-modal" tabindex="-1" aria-hidden="true"
        class=" hidden bg-gray-900/50 overflow-y-auto overflow-x-hidden fixed top-0 
                right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative bg-white p-4 w-full max-w-md max-h-full rounded-lg">
            <!-- Modal content -->
            <div
                class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6 rounded-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Editar cicle formatiu
                    </h3>
                    <button type="button"
                        class="text-body  hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="edit-modal">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->

                <form class="mt-4 max-w-md mx-auto" action="" method="POST" id="edit-form">
                    @csrf
                    @method('PUT')
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="edit-codi" id="edit-codi"
                            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                            placeholder=" " required />
                        <label for="codi"
                            class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 
                                    origin-left peer-focus:inset-s-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 
                                    peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 
                                    rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Codi
                        </label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="edit-nom" id="edit-nom"
                            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                            placeholder=" " required />
                        <label for="nom"
                            class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 
                                    origin-left peer-focus:inset-s-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 
                                    peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 
                                    rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Nom
                        </label>
                    </div>

                    <button type="submit"
                        class="rounded-lg text-white bg-gray-500 box-border border border-transparent hover:bg-brand-strong focus:ring-4 
                            focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        Actualitzar cicle formatiu
                    </button>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/editCicle.js') }}"></script>
@endsection
