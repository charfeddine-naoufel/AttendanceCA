@extends('layouts.master')
@section('content')
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->
        <div>
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="javascript:;" class="text-primary hover:underline">Paramètes</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Groupes</span>
                </li>
            </ul>
            <div class="pt-5">
                <div class="mb-5 flex items-center justify-between">
                    <h5 class="text-lg font-semibold dark:text-white-light">
                        Groupes
                    </h5>
                </div>
                <div x-data="{ tab: 'home' }">
                    <ul
                        class="mb-5 overflow-y-auto whitespace-nowrap border-b border-[#ebedf2] font-semibold dark:border-[#191e3a] sm:flex">
                        <li class="inline-block">
                            <a href="javascript:;"
                                class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary"
                                :class="{ '!border-primary text-primary': tab == 'home' }" @click="tab='home'">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                    <path opacity="0.5"
                                        d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                        stroke="currentColor" stroke-width="1.5"></path>
                                    <path d="M12 15L12 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                    </path>
                                </svg>
                                Groupe
                            </a>
                        </li>

                        <li class="inline-block">
                            <a href="javascript:;"
                                class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary"
                                :class="{ '!border-primary text-primary': tab == 'preferences' }"
                                @click="tab='preferences'">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                    <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5">
                                    </circle>
                                    <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4"
                                        stroke="currentColor" stroke-width="1.5"></ellipse>
                                </svg>
                                Elèves/Groupes
                            </a>
                        </li>

                    </ul>
                    <template x-if="tab === 'home'">
                        <div class="pt-5">
                            <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-12 xl:grid-cols-12">

                                <div class="panel lg:col-span-2 xl:col-span-3">
                                    <div class="mb-10 flex items-center justify-between">
                                        <h5 class="text-lg font-semibold dark:text-white-light">Niveau</h5>

                                        <!-- Register -->
                                        <div x-data="modal">
                                            <button type="button" class="btn btn-danger" @click="toggle"><svg
                                                    fill="none" height="24" viewBox="0 0 24 24" width="24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Add">
                                                        <path clip-rule="evenodd"
                                                            d="M1.25 3C1.25 1.48122 2.48122 0.25 4 0.25H14C15.5188 0.25 16.75 1.48122 16.75 3V10.5C16.75 10.9142 16.4142 11.25 16 11.25C15.5858 11.25 15.25 10.9142 15.25 10.5V3C15.25 2.30964 14.6904 1.75 14 1.75H4C3.30964 1.75 2.75 2.30964 2.75 3V21C2.75 21.6904 3.30964 22.25 4 22.25H12C12.4142 22.25 12.75 22.5858 12.75 23C12.75 23.4142 12.4142 23.75 12 23.75H4C2.48122 23.75 1.25 22.5188 1.25 21V3Z"
                                                            fill="#fff" fill-rule="evenodd" id="Rectangle 12 (Stroke)" />
                                                        <path clip-rule="evenodd"
                                                            d="M4.36201 0.605702C4.49867 0.384589 4.74007 0.25 5 0.25H13C13.2599 0.25 13.5013 0.384589 13.638 0.605702C13.7746 0.826814 13.7871 1.10292 13.6708 1.33541L12.9472 2.78262C12.6508 3.3755 12.0448 3.75 11.382 3.75H6.61803C5.95518 3.75 5.34922 3.3755 5.05279 2.78262L4.32918 1.33541C4.21293 1.10292 4.22536 0.826814 4.36201 0.605702ZM6.21353 1.75L6.39443 2.1118C6.43678 2.1965 6.52334 2.25 6.61803 2.25H11.382C11.4767 2.25 11.5632 2.1965 11.6056 2.1118L11.7865 1.75H6.21353Z"
                                                            fill="#fff" fill-rule="evenodd" id="Rectangle 13 (Stroke)" />
                                                        <path clip-rule="evenodd"
                                                            d="M6.25 20C6.25 19.5858 6.58579 19.25 7 19.25H11C11.4142 19.25 11.75 19.5858 11.75 20C11.75 20.4142 11.4142 20.75 11 20.75H7C6.58579 20.75 6.25 20.4142 6.25 20Z"
                                                            fill="#fff" fill-rule="evenodd" id="Vector 11 (Stroke)" />
                                                        <path clip-rule="evenodd"
                                                            d="M18 13.75C15.6528 13.75 13.75 15.6528 13.75 18C13.75 20.3472 15.6528 22.25 18 22.25C20.3472 22.25 22.25 20.3472 22.25 18C22.25 15.6528 20.3472 13.75 18 13.75ZM12.25 18C12.25 14.8244 14.8244 12.25 18 12.25C21.1756 12.25 23.75 14.8244 23.75 18C23.75 21.1756 21.1756 23.75 18 23.75C14.8244 23.75 12.25 21.1756 12.25 18Z"
                                                            fill="#fff" fill-rule="evenodd" id="Ellipse 7 (Stroke)" />
                                                        <path clip-rule="evenodd"
                                                            d="M18 15.25C18.4142 15.25 18.75 15.5858 18.75 16V20C18.75 20.4142 18.4142 20.75 18 20.75C17.5858 20.75 17.25 20.4142 17.25 20V16C17.25 15.5858 17.5858 15.25 18 15.25Z"
                                                            fill="#fff" fill-rule="evenodd" id="Vector 14 (Stroke)" />
                                                        <path clip-rule="evenodd"
                                                            d="M15.25 18C15.25 17.5858 15.5858 17.25 16 17.25H20C20.4142 17.25 20.75 17.5858 20.75 18C20.75 18.4142 20.4142 18.75 20 18.75H16C15.5858 18.75 15.25 18.4142 15.25 18Z"
                                                            fill="#fff" fill-rule="evenodd" id="Vector 15 (Stroke)" />
                                                    </g>
                                                </svg>

                                                <span class="ml-2">Ajouter</span></button>
                                            <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                                                :class="open && '!block'">
                                                <div class="flex min-h-screen items-start justify-center px-4"
                                                    @click.self="open = false">
                                                    <div x-show="open" x-transition="" x-transition.duration.300=""
                                                        class="panel my-8 w-full max-w-sm overflow-hidden rounded-lg border-0 py-1 px-4">
                                                        <div
                                                            class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
                                                            Nouveau groupe
                                                            <button type="button" @click="toggle"
                                                                class="text-white-dark hover:text-dark">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                    height="24px" viewbox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="h-6 w-6">
                                                                    <line x1="18" y1="6" x2="6"
                                                                        y2="18">
                                                                    </line>
                                                                    <line x1="6" y1="6" x2="18"
                                                                        y2="18">
                                                                    </line>
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div class="p-5">
                                                            <form method="post" action="{{ route('groupes.store') }}">
                                                                @csrf
                                                                <div class="relative mb-4">
                                                                    <span
                                                                        class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                                        <svg width="24" height="24"
                                                                            viewbox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-5 w-5">
                                                                            <circle cx="12" cy="6" r="4"
                                                                                stroke="currentColor" stroke-width="1.5">
                                                                            </circle>
                                                                            <ellipse opacity="0.5" cx="12"
                                                                                cy="17" rx="7"
                                                                                ry="4" stroke="currentColor"
                                                                                stroke-width="1.5"></ellipse>
                                                                        </svg>
                                                                    </span>
                                                                    <input type="text"
                                                                        placeholder="Nom groupe"name="nom_groupe"
                                                                        class="form-input ltr:pl-10 rtl:pr-10">
                                                                </div>
                                                                <div class="relative mb-4">
                                                                    {{-- <span class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                                        <path d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 12.7215 17.8726 13.4133 17.6392 14.054C17.5551 14.285 17.4075 14.4861 17.2268 14.6527L17.1463 14.727C16.591 15.2392 15.7573 15.3049 15.1288 14.8858C14.6735 14.5823 14.4 14.0713 14.4 13.5241V12M14.4 12C14.4 13.3255 13.3255 14.4 12 14.4C10.6745 14.4 9.6 13.3255 9.6 12C9.6 10.6745 10.6745 9.6 12 9.6C13.3255 9.6 14.4 10.6745 14.4 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                                        <path opacity="0.5" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                                                    </svg>
                                                                </span> --}}
                                                                    <div>
                                                                        <select class="form-select text-white-dark"
                                                                            name="niveau_id">
                                                                            <option>Choisir le niveau</option>
                                                                            @foreach ($niveaux as $niveau)
                                                                                <option value="{{ $niveau->id }}">
                                                                                    {{ $niveau->nom_niv_fr }}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="relative mb-4">
                                                                    {{-- <span class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                                        <path d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 12.7215 17.8726 13.4133 17.6392 14.054C17.5551 14.285 17.4075 14.4861 17.2268 14.6527L17.1463 14.727C16.591 15.2392 15.7573 15.3049 15.1288 14.8858C14.6735 14.5823 14.4 14.0713 14.4 13.5241V12M14.4 12C14.4 13.3255 13.3255 14.4 12 14.4C10.6745 14.4 9.6 13.3255 9.6 12C9.6 10.6745 10.6745 9.6 12 9.6C13.3255 9.6 14.4 10.6745 14.4 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                                        <path opacity="0.5" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                                                    </svg>
                                                                </span> --}}
                                                                    <div>
                                                                        <select class="form-select text-white-dark"
                                                                            name="matiere_id">
                                                                            <option>Choisir la Matiere</option>
                                                                            @foreach ($matieres as $matiere)
                                                                                <option value="{{ $matiere->id }}">
                                                                                    {{ $matiere->nom_mat_fr }}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary w-full">Submit</button>
                                                            </form>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <div class="table-responsive">
                                            <table class="table-striped">
                                                <thead class="bg-dark">
                                                    <tr>
                                                        <th>N°</th>
                                                        <th> Niveau</th>
                                                        <th>Groupe</th>
                                                        <th>Matiere</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($groupes as $groupe)
                                                        <tr>
                                                            <td class="whitespace-nowrap">{{ $loop->iteration }}</td>
                                                            <td>{{ $groupe->niveau->nom_niv_fr }}</td>
                                                            <td>{{ $groupe->nom_groupe }}</td>
                                                            <td>{{ $groupe->matiere->nom_mat_fr }}</td>
                                                            <td
                                                                class="border-b border-[#ebedf2] p-3 text-center dark:border-[#191e3a]">

                                                                {{-- edit --}}
                                                                <div x-data="modal" class="inline-block">
                                                                    <button type="button" @click="toggle"
                                                                        data-id="{{ $groupe->id }}"
                                                                        class="btn-outline-success editbtn ">
                                                                        <svg width="24" height="24"
                                                                            viewbox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2">
                                                                            <path
                                                                                d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                                                stroke="currentColor" stroke-width="1.5">
                                                                            </path>
                                                                            <path opacity="0.5"
                                                                                d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                                                stroke="currentColor" stroke-width="1.5">
                                                                            </path>
                                                                        </svg>
                                                                    </button>
                                                                    <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                                                                        :class="open && '!block'">
                                                                        <div class="flex min-h-screen items-start justify-center px-4"
                                                                            @click.self="open = false">
                                                                            <div class="panel animate__animated my-8 w-full max-w-lg overflow-hidden rounded-lg border-0 p-0"
                                                                                :class="$store.app.rtlClass === 'rtl' ?
                                                                                    'animate__rotateInDownRight' :
                                                                                    'animate__rotateInDownLeft'">
                                                                                <div
                                                                                    class="flex items-center justify-between bg-[#fbfbfb] px-5 py-3 dark:bg-[#121c2c]">
                                                                                    <h5 class="text-lg font-bold">Modifier
                                                                                        Matière</h5>
                                                                                    <button type="button"
                                                                                        class="text-white-dark hover:text-dark"
                                                                                        @click="toggle">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="24px" height="24px"
                                                                                            viewbox="0 0 24 24"
                                                                                            fill="none"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="1.5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            class="h-6 w-6">
                                                                                            <line x1="18"
                                                                                                y1="6"
                                                                                                x2="6"
                                                                                                y2="18"></line>
                                                                                            <line x1="6"
                                                                                                y1="6"
                                                                                                x2="18"
                                                                                                y2="18"></line>
                                                                                        </svg>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="p-5">
                                                                                    <form>
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <div class="relative mb-4">
                                                                                            <span
                                                                                                class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                                                                <svg width="24"
                                                                                                    height="24"
                                                                                                    viewbox="0 0 24 24"
                                                                                                    fill="none"
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    class="h-5 w-5">
                                                                                                    <circle cx="12"
                                                                                                        cy="6"
                                                                                                        r="4"
                                                                                                        stroke="currentColor"
                                                                                                        stroke-width="1.5">
                                                                                                    </circle>
                                                                                                    <ellipse opacity="0.5"
                                                                                                        cx="12"
                                                                                                        cy="17"
                                                                                                        rx="7"
                                                                                                        ry="4"
                                                                                                        stroke="currentColor"
                                                                                                        stroke-width="1.5">
                                                                                                    </ellipse>
                                                                                                </svg>
                                                                                            </span>
                                                                                            <input type="text"
                                                                                                placeholder="Nom Groupe"
                                                                                                name="nom_groupe"
                                                                                                id="nom_groupe{{ $groupe->id }}"
                                                                                                class="form-input ltr:pl-10 rtl:pr-10">
                                                                                            <input type="hidden"
                                                                                                class="form-control"
                                                                                                id="IdGroupe"
                                                                                                name="IdGroupe">
                                                                                        </div>
                                                                                        <div class="relative mb-4">
                                                                                            <div>
                                                                                                <select
                                                                                                    class="form-select text-white-dark"
                                                                                                    name="niveau_id"
                                                                                                    id="niveau_id{{ $groupe->id }}">
                                                                                                    <option>Choisir le
                                                                                                        niveau</option>
                                                                                                    @foreach ($niveaux as $niveau)
                                                                                                        <option
                                                                                                            value="{{ $niveau->id }}">
                                                                                                            {{ $niveau->nom_niv_fr }}
                                                                                                        </option>
                                                                                                    @endforeach

                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <button type=""
                                                                                            class="btn btn-primary w-full updatebtn">Submit</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- edit --}}

                                                                <form action="{{ route('groupes.destroy', $groupe->id) }}"
                                                                    method="post" class="inline-block">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" x-tooltip="Delete"
                                                                        class="btn-outline-danger">
                                                                        <svg width="24" height="24"
                                                                            viewbox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-5 w-5">
                                                                            <path d="M20.5001 6H3.5" stroke="currentColor"
                                                                                stroke-width="1.5" stroke-linecap="round">
                                                                            </path>
                                                                            <path
                                                                                d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"></path>
                                                                            <path opacity="0.5" d="M9.5 11L10 16"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"></path>
                                                                            <path opacity="0.5" d="M14.5 11L14 16"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"></path>
                                                                            <path opacity="0.5"
                                                                                d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                                                stroke="currentColor" stroke-width="1.5">
                                                                            </path>
                                                                        </svg>
                                                                    </button>

                                                                </form>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </template>

                    <template x-if="tab === 'preferences'">
                        <div class="panel h-full flex-1 overflow-auto">
                            <div class="pb-5">
                                <button type="button" class="hover:text-primary xl:hidden"
                                    @click="isShowNoteMenu = !isShowNoteMenu">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                                        <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                    </svg>
                                </button>
                            </div>

                           
                            <div class="min-h-[400px] sm:min-h-[300px]">
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
                                    @foreach ($groupes as $groupe)
                                        
                                    <div class="panel pb-12 bg-primary-light shadow-primary"
                                        {{-- :class="{
                                            'bg-primary-light shadow-primary': note.tag === 'personal',
                                            'bg-warning-light shadow-warning': note.tag === 'work',
                                            'bg-info-light shadow-info': note.tag === 'social',
                                            'bg-danger-light shadow-danger': note.tag === 'important',
                                            'dark:shadow-dark': !note.tag
                                        }" --}}
                                        >
                                        <div class="min-h-[142px]">
                                            <div class="flex justify-around">
                                                <div class="flex w-max ">
                                                    <div class="flex ">
                                                        <div class="btn btn-outline-primary flex  px-2 py-1">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0">
                                                                <path d="M4.72848 16.1369C3.18295 14.5914 2.41018 13.8186 2.12264 12.816C1.83509 11.8134 2.08083 10.7485 2.57231 8.61875L2.85574 7.39057C3.26922 5.59881 3.47597 4.70292 4.08944 4.08944C4.70292 3.47597 5.59881 3.26922 7.39057 2.85574L8.61875 2.57231C10.7485 2.08083 11.8134 1.83509 12.816 2.12264C13.8186 2.41018 14.5914 3.18295 16.1369 4.72848L17.9665 6.55812C20.6555 9.24711 22 10.5916 22 12.2623C22 13.933 20.6555 15.2775 17.9665 17.9665C15.2775 20.6555 13.933 22 12.2623 22C10.5916 22 9.24711 20.6555 6.55812 17.9665L4.72848 16.1369Z" stroke="currentColor" stroke-width="1.5"></path>
                                                                <circle opacity="0.5" cx="8.60699" cy="8.87891" r="2" transform="rotate(-45 8.60699 8.87891)" stroke="currentColor" stroke-width="1.5"></circle>
                                                                <path opacity="0.5" d="M11.5417 18.5L18.5208 11.5208" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                            </svg>
                                                            <span class="ltr:ml-2 rtl:mr-2" >Groupe: {{$groupe->nom_groupe}}</span>
                                                        </div>
                                                        <button>
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" transform="rotate(0) scale(1, 1)">    <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="#9b1fe8" stroke-width="1.5" ></path>    <path d="M8 13H10.5" stroke="#9b1fe8" stroke-width="1.5" stroke-linecap="round" ></path>    <path d="M8 9H14.5" stroke="#9b1fe8" stroke-width="1.5" stroke-linecap="round" ></path>    <path d="M8 17H9.5" stroke="#9b1fe8" stroke-width="1.5" stroke-linecap="round" ></path>    <path opacity="0.5" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z" stroke="#9b1fe8" stroke-width="1.5" ></path></svg>
                                                        </button>
                                                        
                                                       
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="w-full max-w-xs rounded-md border border-white-dark/20 p-5">
                                                {{-- <h4 class="mt-4 font-semibold" >Meeting with Kelly</h4> --}}
                                                
                                                <ul class="mb-5 space-y-1 font-semibold group-hover:text-primary">
                                                    @foreach ($groupe->eleves as $eleve)
                                                        
                                                    <li class="flex  ">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 text-primary ltr:mr-2 rtl:ml-2 rtl:rotate-180">
                                                            <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                        {{$eleve->nom_pr_eleve_fr}}
                                                    </li>
                                                    @endforeach
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="absolute bottom-5 left-0 w-full px-5">
                                            <div class="mt-2 flex items-center justify-between">
                                                <div>
                                                    <span class="badge bg-secondary">{{$groupe->matiere->nom_mat_fr}}</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <span class="badge bg-warning">{{$groupe->niveau->nom_niv_fr}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    
                                    
                                </div>
                            </div>

                           
                        </div>
                    </template>

                </div>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
@section('scripts')
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':

                    toastr.options.timeOut = 10000;
                    toastr.info("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
                    break;
                case 'success':

                    toastr.options.timeOut = 10000;
                    toastr.success("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'warning':

                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'error':

                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
            }
        @endif
    </script>
    <script type="module">
        $(document).ready(function() {
            //edit button
            // var items={!! $groupes !!};
            // console.log('itemmmmmms',items);
            $('.editbtn').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');


                // var action ="{{ URL::to('matieres') }}/"+id;


                // var url = "{{ URL::to('matieres') }}";

                $.get("groupes/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#nom_groupe' + id).val(data.data['nom_groupe']);
                    $('#niveau_id' + id).val(data.data['niveau_id']);
                    $('#IdGroupe').val(data.data['id']);



                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var id = $('#IdGroupe').val();
                var nom_groupe = $('#nom_groupe' + id).val();
                var niveau_id = $('#niveau_id' + id).val();


                var URL = "groupes/" + id;
                console.log("url===", URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        nom_groupe: nom_groupe,
                        niveau_id: niveau_id
                    },

                    success: function(data) {
                        // $('.modaledit').modal('hide');
                        window.location.reload();
                        //  alert('update done')

                    }
                });
            });


        });
    </script>
    <!-- script -->
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("collapse", () => ({
                collapse: false,

                collapseSidebar() {
                    this.collapse = !this.collapse;
                },
            }));

            Alpine.data("dropdown", (initialOpenState = false) => ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    </script>
@endsection
