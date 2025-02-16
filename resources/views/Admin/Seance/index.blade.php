@extends('layouts.master')
@section('content')
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <div>
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Seance</span>
                </li>
            </ul>
            {{-- start --}}
            <div class="pt-5">
                <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-12 xl:grid-cols-12">

                    <div class="panel lg:col-span-2 xl:col-span-3">
                        <div class="mb-10 flex items-center justify-between">
                            <h5 class="text-lg font-semibold dark:text-white-light">Seances</h5>

                            <!-- Register -->
                            <div x-data="modal">
                                <button type="button" class="btn btn-danger" @click="toggle">
                                    <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
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
                                            class="panel my-8 w-full max-w-5xl overflow-hidden rounded-lg border-0 py-1 px-4">
                                            <div
                                                class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
                                                Nouvelle Séance
                                                <button type="button" @click="toggle"
                                                    class="text-white-dark hover:text-dark">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                        viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                        class="h-6 w-6">
                                                        <line x1="18" y1="6" x2="6" y2="18">
                                                        </line>
                                                        <line x1="6" y1="6" x2="18" y2="18">
                                                        </line>
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="p-5">
                                                <form class="space-y-5" method="post"
                                                    action="{{ route('seances.store') }}">
                                                    @csrf
                                                    <div class="grid grid-cols-1 gap-x-12 sm:grid-cols-2 ">
                                                        <div>
                                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-3">
                                                                <div>
                                                                    <select class="form-select text-white-dark"
                                                                        name="matiere_id">
                                                                        <option value="">Choisir une matiere</option>
                                                                        @foreach ($matieres as $matiere)
                                                                            <option value="{{ $matiere->id }}">
                                                                                {{ $matiere->nom_mat_fr }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                                <div>
                                                                    <select class="form-select text-white-dark btngroupe"
                                                                        name="groupe_id" id="groupe">
                                                                        <option value="">Choisir un groupe</option>
                                                                        @foreach ($groupes as $groupe)
                                                                            <option value="{{ $groupe->id }}">
                                                                                {{ $groupe->nom_groupe }}-{{ $groupe->niveau->nom_niv_fr }}-{{ $groupe->matiere->nom_mat_fr }}
                                                                            </option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                <div>
                                                                    <select class="form-select text-white-dark"
                                                                        name="prof_id">
                                                                        <option value="">Choisir un Prof</option>
                                                                        @foreach ($profs as $prof)
                                                                            <option value="{{ $prof->id }}">
                                                                                {{ $prof->nom_pr_prof_fr }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                                <div>
                                                                    {{-- <label for="gridPassword">Classe Lycée</label> --}}
                                                                    <input type="date" name="date" placeholder="Date"
                                                                        value="{{ date('Y-m-d') }}" class="form-input" />
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-3">

                                                                <div class="flex">
                                                                    <div
                                                                        class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 40 40" width="24px"
                                                                            height="24px">
                                                                            <path fill="#8bb7f0"
                                                                                d="M20,38.5C9.799,38.5,1.5,30.201,1.5,20S9.799,1.5,20,1.5S38.5,9.799,38.5,20S30.201,38.5,20,38.5z" />
                                                                            <path fill="#4e7ab5"
                                                                                d="M20,2c9.925,0,18,8.075,18,18s-8.075,18-18,18S2,29.925,2,20S10.075,2,20,2 M20,1 C9.507,1,1,9.507,1,20s8.507,19,19,19s19-8.507,19-19S30.493,1,20,1L20,1z" />
                                                                            <path fill="#fff"
                                                                                d="M20,35.5c-8.547,0-15.5-6.953-15.5-15.5S11.453,4.5,20,4.5S35.5,11.453,35.5,20S28.547,35.5,20,35.5 z" />
                                                                            <path fill="#4e7ab5"
                                                                                d="M20,5c8.271,0,15,6.729,15,15s-6.729,15-15,15S5,28.271,5,20S11.729,5,20,5 M20,4 C11.163,4,4,11.163,4,20s7.163,16,16,16s16-7.163,16-16S28.837,4,20,4L20,4z" />
                                                                            <path fill="none" stroke="#66798f"
                                                                                stroke-linecap="round"
                                                                                stroke-miterlimit="10" stroke-width="2"
                                                                                d="M26.995 9.665L20 20 25.846 25.846" />
                                                                            <path fill="#66798f"
                                                                                d="M20 18.5A1.5 1.5 0 1 0 20 21.5A1.5 1.5 0 1 0 20 18.5Z" />
                                                                            <path fill="#c5d4de"
                                                                                d="M20 6A1 1 0 1 0 20 8 1 1 0 1 0 20 6zM20 32A1 1 0 1 0 20 34 1 1 0 1 0 20 32z" />
                                                                            <g>
                                                                                <path fill="#c5d4de"
                                                                                    d="M33 19A1 1 0 1 0 33 21A1 1 0 1 0 33 19Z" />
                                                                            </g>
                                                                            <g>
                                                                                <path fill="#c5d4de"
                                                                                    d="M7 19A1 1 0 1 0 7 21A1 1 0 1 0 7 19Z" />
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                    <input type="time" name="heure_deb"
                                                                        placeholder="Heure début"
                                                                        class="form-input ltr:rounded-l-none rtl:rounded-r-none">
                                                                </div>
                                                                <div class="flex">
                                                                    <div
                                                                        class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 40 40" width="24px"
                                                                            height="24px">
                                                                            <path fill="#8bb7f0"
                                                                                d="M20,38.5C9.799,38.5,1.5,30.201,1.5,20S9.799,1.5,20,1.5S38.5,9.799,38.5,20S30.201,38.5,20,38.5z" />
                                                                            <path fill="#4e7ab5"
                                                                                d="M20,2c9.925,0,18,8.075,18,18s-8.075,18-18,18S2,29.925,2,20S10.075,2,20,2 M20,1 C9.507,1,1,9.507,1,20s8.507,19,19,19s19-8.507,19-19S30.493,1,20,1L20,1z" />
                                                                            <path fill="#fff"
                                                                                d="M20,35.5c-8.547,0-15.5-6.953-15.5-15.5S11.453,4.5,20,4.5S35.5,11.453,35.5,20S28.547,35.5,20,35.5 z" />
                                                                            <path fill="#4e7ab5"
                                                                                d="M20,5c8.271,0,15,6.729,15,15s-6.729,15-15,15S5,28.271,5,20S11.729,5,20,5 M20,4 C11.163,4,4,11.163,4,20s7.163,16,16,16s16-7.163,16-16S28.837,4,20,4L20,4z" />
                                                                            <path fill="none" stroke="#66798f"
                                                                                stroke-linecap="round"
                                                                                stroke-miterlimit="10" stroke-width="2"
                                                                                d="M26.995 9.665L20 20 25.846 25.846" />
                                                                            <path fill="#66798f"
                                                                                d="M20 18.5A1.5 1.5 0 1 0 20 21.5A1.5 1.5 0 1 0 20 18.5Z" />
                                                                            <path fill="#c5d4de"
                                                                                d="M20 6A1 1 0 1 0 20 8 1 1 0 1 0 20 6zM20 32A1 1 0 1 0 20 34 1 1 0 1 0 20 32z" />
                                                                            <g>
                                                                                <path fill="#c5d4de"
                                                                                    d="M33 19A1 1 0 1 0 33 21A1 1 0 1 0 33 19Z" />
                                                                            </g>
                                                                            <g>
                                                                                <path fill="#c5d4de"
                                                                                    d="M7 19A1 1 0 1 0 7 21A1 1 0 1 0 7 19Z" />
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                    <input type="time" name="heure_fin"
                                                                        placeholder="Heure fin"
                                                                        class="form-input ltr:rounded-l-none rtl:rounded-r-none">
                                                                </div>
                                                            </div>


                                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                                                <div>
                                                                    <div class="flex">
                                                                        <div class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                            Salle
                                                                        </div>
                                                                        <select name="salle" id="" class="py-2.5">
                                                                            <option value="S1">S1</option>
                                                                            <option value="S2">S2</option>
                                                                            <option value="S3">S3</option>
                                                                            <option value="S4">S4</option>
                                                                            <option value="S5">S1</option>
                                                                            <option value="S6">S6</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="table-responsive">
                                                                <table id="mytable" class=" table table-sm">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><input id="checkAll" type="checkbox"
                                                                                    class="form-checkbox checkAll" /></th>
                                                                            <th>الاسم و اللقب</th>
                                                                            <th>Nom et Prénom</th>


                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>


                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary w-full">Enregistrer</button>
                                                        </div>
                                                    </div>
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
                                            <th> Matière</th>
                                            <th>Groupe</th>
                                            <th>Prof</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>E. Présents</th>
                                            <th>E. Abscents</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($seances as $seance)
                                            <tr>
                                                <td class="whitespace-nowrap">{{ $loop->iteration }}</td>
                                                <td>{{ $seance->matiere->nom_mat_ar }}</td>
                                                <td>{{ $seance->groupe->nom_groupe }}</td>
                                                <td>{{ $seance->prof->nom_pr_prof_ar }}</td>
                                                <td>{{ $seance->date->format('d/m/Y') }}</td>
                                                <td>{{ $seance->heure_deb }}-{{ $seance->heure_fin }}</td>
                                                <td>
                                                    {{-- présents --}}
                                                    <!-- profile -->
                                                    <div x-data="modal">
                                                        <button type="button" @click="toggle"
                                                            class="btn-outline-info  ">
                                                            <svg version="1.2" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 481" width="24" height="23">
                                                                <title>view-show-all-icon</title>
                                                                <style>
                                                                    .s0 {
                                                                        fill: rgb(80, 43, 214)
                                                                    }
                                                                </style>
                                                                <path fill-rule="evenodd" class="s0"
                                                                    d="m230.9 453.2h-199.4c-8.6 0-16.5-3.6-22.2-9.3-5.7-5.7-9.3-13.5-9.3-22.2v-390.2c0-8.6 3.5-16.5 9.2-22.2l0.1-0.1c5.7-5.7 13.6-9.2 22.2-9.2h383.6c8.6 0 16.5 3.6 22.2 9.3 5.7 5.7 9.3 13.6 9.3 22.2v279.4c-9.7-3.4-19.7-6.1-29.7-8.1v-271.3c0-0.4-0.3-0.9-0.6-1.2-0.3-0.4-0.8-0.6-1.2-0.6h-383.6c-0.5 0-1 0.2-1.2 0.5l-0.1 0.1c-0.3 0.3-0.5 0.7-0.5 1.2v390.2c0 0.4 0.2 0.9 0.6 1.2 0.3 0.4 0.8 0.6 1.2 0.6h172.3q1.9 3.6 4.7 6.8c7 8.2 14.5 15.8 22.4 22.9zm20.2-54.7c31.7-38.2 72.7-68.9 123.9-69.9 54.3-1.2 99.4 31.2 134.8 70.1q1 1.1 1.6 2.5 0.5 1.4 0.6 2.9 0.1 1.5-0.4 2.9-0.4 1.5-1.4 2.7c-29.8 42.1-77 70.8-129.6 71.1-54.1 0.3-96.8-29.4-130-71-2.7-3.4-2.4-8.2 0.5-11.3zm-106.4-285.1h215.4c1.2 0 2.2 1.1 2.2 2.3v28.5c0 1.2-1.1 2.3-2.2 2.3h-215.4c-1.1 0-2.3-1-2.3-2.3v-28.5c0-1.3 1.1-2.3 2.3-2.3zm0 193.8h175.5q-9.2 2.7-18.5 6.4c-12.1 4.9-30.9 14.6-49.1 26.7h-107.9c-1.2 0-2.3-1-2.3-2.3v-28.5q0-0.5 0.2-0.9 0.2-0.4 0.5-0.7 0.3-0.4 0.8-0.5 0.4-0.2 0.8-0.2zm-41.4-2.5c10.5 0 19 8.6 19 19.1 0 10.5-8.5 19-19 19-10.5 0-19.1-8.5-19.1-19 0-10.5 8.6-19.1 19.1-19.1zm41.4-94.6h215.4c1.2 0 2.2 1.1 2.2 2.3v28.6c0 1.2-1 2.3-2.2 2.3h-215.4c-1.2 0-2.3-1.1-2.3-2.3v-28.6c0-1.3 1.1-2.3 2.3-2.3zm-41.4-2.5c10.5 0 19 8.6 19 19.1 0 10.5-8.5 19-19 19-10.5 0-19.1-8.5-19.1-19 0-10.5 8.6-19.1 19.1-19.1zm0-96.7c10.5 0 19 8.5 19 19.1 0 10.5-8.5 19-19 19-10.5 0-19.1-8.5-19.1-19 0-10.6 8.6-19.1 19.1-19.1zm168.2 293.6c29.7 34.5 62.8 56.5 109.1 56.2 44.3-0.3 82.1-21 108.7-55.6-31.3-32.7-67.3-57.4-114-56.4-43.6 0.9-75.7 23.9-103.8 55.8zm108.9-35.7c9.9 0 18.9 4 25.4 10.5q2.5 2.5 4.4 5.4 2 3 3.4 6.3 1.3 3.2 2 6.7 0.7 3.5 0.7 7c0 9.9-4.1 18.9-10.5 25.4q-2.5 2.5-5.5 4.4-2.9 2-6.2 3.4-3.2 1.3-6.7 2-3.5 0.7-7 0.7c-9.9 0-18.9-4-25.4-10.5-6.5-6.5-10.5-15.5-10.5-25.4 0-9.9 4-18.9 10.5-25.4 6.5-6.5 15.5-10.5 25.4-10.5zm-24.1 20.9c0 7.6 6.3 13.9 14 13.9 7.7 0 13.9-6.3 13.9-13.9 0-7.7-6.2-14-13.9-14-7.7 0-14 6.3-14 14z" />
                                                            </svg>
                                                        </button>
                                                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                                                            :class="open && '!block'">
                                                            <div class="flex min-h-screen items-start justify-center px-4"
                                                                @click.self="open = false">
                                                                <div x-show="open" x-transition=""
                                                                    x-transition.duration.300=""
                                                                    class="panel my-8 w-full max-w-[300px] overflow-hidden rounded-lg border-0 bg-secondary p-0 dark:bg-secondary">
                                                                    <div class="panel">
                                                                        <div
                                                                            class="mb-10 flex items-center justify-between">
                                                                            <h5
                                                                                class="text-lg font-semibold dark:text-white-light">
                                                                                Elèves Présents</h5>
                                                                            {{-- <a href="javascript:;" class="btn btn-primary">Renew Now</a> --}}
                                                                        </div>
                                                                        <div class="group">
                                                                            <ul
                                                                                class="mb-7 list-inside list-disc space-y-2 font-semibold text-white-dark">
                                                                                @forelse($seance->presents as $eleve)
                                                                                    <li class="flex space-between">
                                                                                        {{ $eleve->nom_pr_eleve_fr }}<span>
                                                                                            {{ $eleve->nom_pr_eleve_ar }}</span>
                                                                                    </li>

                                                                                @empty
                                                                                    <p>Aucun eleve présent !</p>
                                                                                @endforelse

                                                                            </ul>

                                                                            <div class="mb-5 h-2.5 flex justify-center ">
                                                                                {{-- <button type="button"
                                                                                    class="btn btn-warning rounded-full">
                                                                                    Modifier

                                                                                    <svg width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="h-5 w-5 shrink-0 ltr:ml-1.5 rtl:mr-1.5">
                                                                                        <path
                                                                                            d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="1.5"></path>
                                                                                        <path opacity="0.5"
                                                                                            d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="1.5"></path>
                                                                                    </svg>
                                                                                </button> --}}
                                                                                <div x-data="modal" class="inline-block">
                                                                                    <button type="button" @click="toggle"
                                                                                        data-id="{{ $seance->id }}"
                                                                                        class="btn btn-warning rounded-full editbtn "> Modifier
                                                                                        <svg width="24" height="24" viewbox="0 0 24 24"
                                                                                            fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                                            class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2">
                                                                                            <path
                                                                                                d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                                                                stroke="currentColor" stroke-width="1.5"></path>
                                                                                            <path opacity="0.5"
                                                                                                d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                                                                stroke="currentColor" stroke-width="1.5"></path>
                                                                                        </svg>
                                                                                    </button>
                                                                                    <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                                                                                        :class="open && '!block'">
                                                                                        <div class="flex min-h-screen items-start justify-center px-4"
                                                                                            @click.self="open = false">
                                                                                            <div class="panel animate__animated my-8 w-full max-w-3xl overflow-hidden rounded-lg border-0 p-0"
                                                                                                :class="$store.app.rtlClass === 'rtl' ?
                                                                                                    'animate__rotateInDownRight' :
                                                                                                    'animate__rotateInDownLeft'">
                                                                                                <div
                                                                                                    class="flex items-center justify-between bg-[#fbfbfb] px-5 py-3 dark:bg-[#121c2c]">
                                                                                                    <h5 class="text-lg font-bold">Modifier Séance</h5>
                                                                                                    <button type="button"
                                                                                                        class="text-white-dark hover:text-dark"
                                                                                                        @click="toggle">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="24px" height="24px"
                                                                                                            viewbox="0 0 24 24" fill="none"
                                                                                                            stroke="currentColor" stroke-width="1.5"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round" class="h-6 w-6">
                                                                                                            <line x1="18" y1="6"
                                                                                                                x2="6" y2="18"></line>
                                                                                                            <line x1="6" y1="6"
                                                                                                                x2="18" y2="18"></line>
                                                                                                        </svg>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="p-5">
                                                                                                    <form class="space-y-5">
                                                                                                        @csrf
                                                                                                        @method('PUT')
                                                                                                        <div
                                                                                                            class="grid grid-cols-1 gap-x-12 sm:grid-cols-2 ">
                                                                                                            <div>
                                                                                                                <div
                                                                                                                    class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-3">
                                                                                                                    <div>
                                                                                                                        <select
                                                                                                                            class="form-select text-white-dark"
                                                                                                                            id="matiere_id">
                                                                                                                            <option value="">
                                                                                                                                Choisir une matiere
                                                                                                                            </option>
                                                                                                                            @foreach ($matieres as $matiere)
                                                                                                                                <option
                                                                                                                                    value="{{ $matiere->id }}">
                                                                                                                                    {{ $matiere->nom_mat_fr }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                            
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div>
                                                                                                                        <select
                                                                                                                            class="form-select text-white-dark btngroupe"
                                                                                                                            id="groupe_id"
                                                                                                                            id="groupe">
                                                                                                                            <option value="">
                                                                                                                                Choisir un groupe
                                                                                                                            </option>
                                                                                                                            @foreach ($groupes as $groupe)
                                                                                                                                <option
                                                                                                                                    value="{{ $groupe->id }}">
                                                                                                                                    {{ $groupe->nom_groupe }}-{{ $groupe->niveau->nom_niv_fr }}-{{ $groupe->matiere->nom_mat_fr }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                            
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                            
                                                                                                                <div
                                                                                                                    class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                                                                    <div>
                                                                                                                        <select
                                                                                                                            class="form-select text-white-dark"
                                                                                                                            id="prof_id">
                                                                                                                            <option value="">
                                                                                                                                Choisir un Prof</option>
                                                                                                                            @foreach ($profs as $prof)
                                                                                                                                <option
                                                                                                                                    value="{{ $prof->id }}">
                                                                                                                                    {{ $prof->nom_pr_prof_fr }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                            
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div>
                                                                                                                        {{-- <label for="gridPassword">Classe Lycée</label> --}}
                                                                                                                        <input type="date"
                                                                                                                            id="date"
                                                                                                                            placeholder="Date"
                                                                                                                            value="{{ date('Y-m-d') }}"
                                                                                                                            class="form-input" />
                                                                                                                        <input type="hidden"
                                                                                                                            class="form-control IdSeance"
                                                                                                                            id="IdSeance">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-3">
                            
                                                                                                                    <div class="flex">
                                                                                                                        <div
                                                                                                                            class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                                viewBox="0 0 40 40"
                                                                                                                                width="24px"
                                                                                                                                height="24px">
                                                                                                                                <path fill="#8bb7f0"
                                                                                                                                    d="M20,38.5C9.799,38.5,1.5,30.201,1.5,20S9.799,1.5,20,1.5S38.5,9.799,38.5,20S30.201,38.5,20,38.5z" />
                                                                                                                                <path fill="#4e7ab5"
                                                                                                                                    d="M20,2c9.925,0,18,8.075,18,18s-8.075,18-18,18S2,29.925,2,20S10.075,2,20,2 M20,1 C9.507,1,1,9.507,1,20s8.507,19,19,19s19-8.507,19-19S30.493,1,20,1L20,1z" />
                                                                                                                                <path fill="#fff"
                                                                                                                                    d="M20,35.5c-8.547,0-15.5-6.953-15.5-15.5S11.453,4.5,20,4.5S35.5,11.453,35.5,20S28.547,35.5,20,35.5 z" />
                                                                                                                                <path fill="#4e7ab5"
                                                                                                                                    d="M20,5c8.271,0,15,6.729,15,15s-6.729,15-15,15S5,28.271,5,20S11.729,5,20,5 M20,4 C11.163,4,4,11.163,4,20s7.163,16,16,16s16-7.163,16-16S28.837,4,20,4L20,4z" />
                                                                                                                                <path fill="none"
                                                                                                                                    stroke="#66798f"
                                                                                                                                    stroke-linecap="round"
                                                                                                                                    stroke-miterlimit="10"
                                                                                                                                    stroke-width="2"
                                                                                                                                    d="M26.995 9.665L20 20 25.846 25.846" />
                                                                                                                                <path fill="#66798f"
                                                                                                                                    d="M20 18.5A1.5 1.5 0 1 0 20 21.5A1.5 1.5 0 1 0 20 18.5Z" />
                                                                                                                                <path fill="#c5d4de"
                                                                                                                                    d="M20 6A1 1 0 1 0 20 8 1 1 0 1 0 20 6zM20 32A1 1 0 1 0 20 34 1 1 0 1 0 20 32z" />
                                                                                                                                <g>
                                                                                                                                    <path
                                                                                                                                        fill="#c5d4de"
                                                                                                                                        d="M33 19A1 1 0 1 0 33 21A1 1 0 1 0 33 19Z" />
                                                                                                                                </g>
                                                                                                                                <g>
                                                                                                                                    <path
                                                                                                                                        fill="#c5d4de"
                                                                                                                                        d="M7 19A1 1 0 1 0 7 21A1 1 0 1 0 7 19Z" />
                                                                                                                                </g>
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                        <input type="time"
                                                                                                                            id="heure_deb"
                                                                                                                            placeholder="Heure début"
                                                                                                                            class="form-input ltr:rounded-l-none rtl:rounded-r-none">
                                                                                                                    </div>
                                                                                                                    <div class="flex">
                                                                                                                        <div
                                                                                                                            class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                                viewBox="0 0 40 40"
                                                                                                                                width="24px"
                                                                                                                                height="24px">
                                                                                                                                <path fill="#8bb7f0"
                                                                                                                                    d="M20,38.5C9.799,38.5,1.5,30.201,1.5,20S9.799,1.5,20,1.5S38.5,9.799,38.5,20S30.201,38.5,20,38.5z" />
                                                                                                                                <path fill="#4e7ab5"
                                                                                                                                    d="M20,2c9.925,0,18,8.075,18,18s-8.075,18-18,18S2,29.925,2,20S10.075,2,20,2 M20,1 C9.507,1,1,9.507,1,20s8.507,19,19,19s19-8.507,19-19S30.493,1,20,1L20,1z" />
                                                                                                                                <path fill="#fff"
                                                                                                                                    d="M20,35.5c-8.547,0-15.5-6.953-15.5-15.5S11.453,4.5,20,4.5S35.5,11.453,35.5,20S28.547,35.5,20,35.5 z" />
                                                                                                                                <path fill="#4e7ab5"
                                                                                                                                    d="M20,5c8.271,0,15,6.729,15,15s-6.729,15-15,15S5,28.271,5,20S11.729,5,20,5 M20,4 C11.163,4,4,11.163,4,20s7.163,16,16,16s16-7.163,16-16S28.837,4,20,4L20,4z" />
                                                                                                                                <path fill="none"
                                                                                                                                    stroke="#66798f"
                                                                                                                                    stroke-linecap="round"
                                                                                                                                    stroke-miterlimit="10"
                                                                                                                                    stroke-width="2"
                                                                                                                                    d="M26.995 9.665L20 20 25.846 25.846" />
                                                                                                                                <path fill="#66798f"
                                                                                                                                    d="M20 18.5A1.5 1.5 0 1 0 20 21.5A1.5 1.5 0 1 0 20 18.5Z" />
                                                                                                                                <path fill="#c5d4de"
                                                                                                                                    d="M20 6A1 1 0 1 0 20 8 1 1 0 1 0 20 6zM20 32A1 1 0 1 0 20 34 1 1 0 1 0 20 32z" />
                                                                                                                                <g>
                                                                                                                                    <path
                                                                                                                                        fill="#c5d4de"
                                                                                                                                        d="M33 19A1 1 0 1 0 33 21A1 1 0 1 0 33 19Z" />
                                                                                                                                </g>
                                                                                                                                <g>
                                                                                                                                    <path
                                                                                                                                        fill="#c5d4de"
                                                                                                                                        d="M7 19A1 1 0 1 0 7 21A1 1 0 1 0 7 19Z" />
                                                                                                                                </g>
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                        <input type="time"
                                                                                                                            id="heure_fin"
                                                                                                                            placeholder="Heure fin"
                                                                                                                            class="form-input ltr:rounded-l-none rtl:rounded-r-none">
                                                                                                                    </div>
                                                                                                                </div>
                            
                            
                                                                                                                <div
                                                                                                                    class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            
                                                                                                                    <div>
                                                                                                                        
                                                                                                                        <div class="flex">
                                                                                                                            <div class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee]  px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                                                                                Salle
                                                                                                                            </div>
                                                                                                                            <select name="salle" id="salle" class="py-2.5">
                                                                                                                                <option value="S1">S1</option>
                                                                                                                                <option value="S2">S2</option>
                                                                                                                                <option value="S3">S3</option>
                                                                                                                                <option value="S4">S4</option>
                                                                                                                                <option value="S5">S1</option>
                                                                                                                                <option value="S6">S6</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div>
                                                                                                                <div class="table-responsive">
                                                                                                                    <table id="mytableup"
                                                                                                                        class=" table table-sm mytableup">
                                                                                                                        <thead>
                                                                                                                            <tr>
                                                                                                                                <th><input
                                                                                                                                        id="checkAll"
                                                                                                                                        type="checkbox"
                                                                                                                                        class="form-checkbox checkAll" />
                                                                                                                                </th>
                                                                                                                                <th>الاسم و اللقب</th>
                                                                                                                                <th>Nom et Prénom</th>
                            
                            
                                                                                                                            </tr>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                            
                            
                                                                                                                        </tbody>
                                                                                                                    </table>
                            
                                                                                                                </div>
                                                                                                                <button 
                                                                                                                    class="btn btn-primary w-full updatebtn">Enregistrer</button>
                                                                                                            </div>
                                                                                                        </div>
                            
                            
                            
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div x-data="modal">
                                                        <button type="button" @click="toggle"
                                                            class="btn-outline-info  ">
                                                            <svg version="1.2" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 481" width="24" height="23">
                                                                <title>view-show-all-icon</title>
                                                                <style>
                                                                    .s0 {
                                                                        fill: rgb(31, 80, 170)
                                                                    }
                                                                </style>
                                                                <path fill-rule="evenodd" class="s0"
                                                                    d="m230.9 453.2h-199.4c-8.6 0-16.5-3.6-22.2-9.3-5.7-5.7-9.3-13.5-9.3-22.2v-390.2c0-8.6 3.5-16.5 9.2-22.2l0.1-0.1c5.7-5.7 13.6-9.2 22.2-9.2h383.6c8.6 0 16.5 3.6 22.2 9.3 5.7 5.7 9.3 13.6 9.3 22.2v279.4c-9.7-3.4-19.7-6.1-29.7-8.1v-271.3c0-0.4-0.3-0.9-0.6-1.2-0.3-0.4-0.8-0.6-1.2-0.6h-383.6c-0.5 0-1 0.2-1.2 0.5l-0.1 0.1c-0.3 0.3-0.5 0.7-0.5 1.2v390.2c0 0.4 0.2 0.9 0.6 1.2 0.3 0.4 0.8 0.6 1.2 0.6h172.3q1.9 3.6 4.7 6.8c7 8.2 14.5 15.8 22.4 22.9zm20.2-54.7c31.7-38.2 72.7-68.9 123.9-69.9 54.3-1.2 99.4 31.2 134.8 70.1q1 1.1 1.6 2.5 0.5 1.4 0.6 2.9 0.1 1.5-0.4 2.9-0.4 1.5-1.4 2.7c-29.8 42.1-77 70.8-129.6 71.1-54.1 0.3-96.8-29.4-130-71-2.7-3.4-2.4-8.2 0.5-11.3zm-106.4-285.1h215.4c1.2 0 2.2 1.1 2.2 2.3v28.5c0 1.2-1.1 2.3-2.2 2.3h-215.4c-1.1 0-2.3-1-2.3-2.3v-28.5c0-1.3 1.1-2.3 2.3-2.3zm0 193.8h175.5q-9.2 2.7-18.5 6.4c-12.1 4.9-30.9 14.6-49.1 26.7h-107.9c-1.2 0-2.3-1-2.3-2.3v-28.5q0-0.5 0.2-0.9 0.2-0.4 0.5-0.7 0.3-0.4 0.8-0.5 0.4-0.2 0.8-0.2zm-41.4-2.5c10.5 0 19 8.6 19 19.1 0 10.5-8.5 19-19 19-10.5 0-19.1-8.5-19.1-19 0-10.5 8.6-19.1 19.1-19.1zm41.4-94.6h215.4c1.2 0 2.2 1.1 2.2 2.3v28.6c0 1.2-1 2.3-2.2 2.3h-215.4c-1.2 0-2.3-1.1-2.3-2.3v-28.6c0-1.3 1.1-2.3 2.3-2.3zm-41.4-2.5c10.5 0 19 8.6 19 19.1 0 10.5-8.5 19-19 19-10.5 0-19.1-8.5-19.1-19 0-10.5 8.6-19.1 19.1-19.1zm0-96.7c10.5 0 19 8.5 19 19.1 0 10.5-8.5 19-19 19-10.5 0-19.1-8.5-19.1-19 0-10.6 8.6-19.1 19.1-19.1zm168.2 293.6c29.7 34.5 62.8 56.5 109.1 56.2 44.3-0.3 82.1-21 108.7-55.6-31.3-32.7-67.3-57.4-114-56.4-43.6 0.9-75.7 23.9-103.8 55.8zm108.9-35.7c9.9 0 18.9 4 25.4 10.5q2.5 2.5 4.4 5.4 2 3 3.4 6.3 1.3 3.2 2 6.7 0.7 3.5 0.7 7c0 9.9-4.1 18.9-10.5 25.4q-2.5 2.5-5.5 4.4-2.9 2-6.2 3.4-3.2 1.3-6.7 2-3.5 0.7-7 0.7c-9.9 0-18.9-4-25.4-10.5-6.5-6.5-10.5-15.5-10.5-25.4 0-9.9 4-18.9 10.5-25.4 6.5-6.5 15.5-10.5 25.4-10.5zm-24.1 20.9c0 7.6 6.3 13.9 14 13.9 7.7 0 13.9-6.3 13.9-13.9 0-7.7-6.2-14-13.9-14-7.7 0-14 6.3-14 14z" />
                                                            </svg>
                                                        </button>
                                                        {{-- <button type="button" class="btn btn-warning rounded-full" @click="toggle">
                                                            <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 481" width="24" height="23">
                                                                <title>view-show-all-icon</title>
                                                                <style>
                                                                    .s0 { fill:rgb(248, 246, 246) } 
                                                                </style>
                                                                <path fill-rule="evenodd" class="s0" d="m230.9 453.2h-199.4c-8.6 0-16.5-3.6-22.2-9.3-5.7-5.7-9.3-13.5-9.3-22.2v-390.2c0-8.6 3.5-16.5 9.2-22.2l0.1-0.1c5.7-5.7 13.6-9.2 22.2-9.2h383.6c8.6 0 16.5 3.6 22.2 9.3 5.7 5.7 9.3 13.6 9.3 22.2v279.4c-9.7-3.4-19.7-6.1-29.7-8.1v-271.3c0-0.4-0.3-0.9-0.6-1.2-0.3-0.4-0.8-0.6-1.2-0.6h-383.6c-0.5 0-1 0.2-1.2 0.5l-0.1 0.1c-0.3 0.3-0.5 0.7-0.5 1.2v390.2c0 0.4 0.2 0.9 0.6 1.2 0.3 0.4 0.8 0.6 1.2 0.6h172.3q1.9 3.6 4.7 6.8c7 8.2 14.5 15.8 22.4 22.9zm20.2-54.7c31.7-38.2 72.7-68.9 123.9-69.9 54.3-1.2 99.4 31.2 134.8 70.1q1 1.1 1.6 2.5 0.5 1.4 0.6 2.9 0.1 1.5-0.4 2.9-0.4 1.5-1.4 2.7c-29.8 42.1-77 70.8-129.6 71.1-54.1 0.3-96.8-29.4-130-71-2.7-3.4-2.4-8.2 0.5-11.3zm-106.4-285.1h215.4c1.2 0 2.2 1.1 2.2 2.3v28.5c0 1.2-1.1 2.3-2.2 2.3h-215.4c-1.1 0-2.3-1-2.3-2.3v-28.5c0-1.3 1.1-2.3 2.3-2.3zm0 193.8h175.5q-9.2 2.7-18.5 6.4c-12.1 4.9-30.9 14.6-49.1 26.7h-107.9c-1.2 0-2.3-1-2.3-2.3v-28.5q0-0.5 0.2-0.9 0.2-0.4 0.5-0.7 0.3-0.4 0.8-0.5 0.4-0.2 0.8-0.2zm-41.4-2.5c10.5 0 19 8.6 19 19.1 0 10.5-8.5 19-19 19-10.5 0-19.1-8.5-19.1-19 0-10.5 8.6-19.1 19.1-19.1zm41.4-94.6h215.4c1.2 0 2.2 1.1 2.2 2.3v28.6c0 1.2-1 2.3-2.2 2.3h-215.4c-1.2 0-2.3-1.1-2.3-2.3v-28.6c0-1.3 1.1-2.3 2.3-2.3zm-41.4-2.5c10.5 0 19 8.6 19 19.1 0 10.5-8.5 19-19 19-10.5 0-19.1-8.5-19.1-19 0-10.5 8.6-19.1 19.1-19.1zm0-96.7c10.5 0 19 8.5 19 19.1 0 10.5-8.5 19-19 19-10.5 0-19.1-8.5-19.1-19 0-10.6 8.6-19.1 19.1-19.1zm168.2 293.6c29.7 34.5 62.8 56.5 109.1 56.2 44.3-0.3 82.1-21 108.7-55.6-31.3-32.7-67.3-57.4-114-56.4-43.6 0.9-75.7 23.9-103.8 55.8zm108.9-35.7c9.9 0 18.9 4 25.4 10.5q2.5 2.5 4.4 5.4 2 3 3.4 6.3 1.3 3.2 2 6.7 0.7 3.5 0.7 7c0 9.9-4.1 18.9-10.5 25.4q-2.5 2.5-5.5 4.4-2.9 2-6.2 3.4-3.2 1.3-6.7 2-3.5 0.7-7 0.7c-9.9 0-18.9-4-25.4-10.5-6.5-6.5-10.5-15.5-10.5-25.4 0-9.9 4-18.9 10.5-25.4 6.5-6.5 15.5-10.5 25.4-10.5zm-24.1 20.9c0 7.6 6.3 13.9 14 13.9 7.7 0 13.9-6.3 13.9-13.9 0-7.7-6.2-14-13.9-14-7.7 0-14 6.3-14 14z"/>
                                                            </svg>
                                                        </button> --}}
                                                        {{-- <button type="button" class="btn btn-success" @click="toggle">Profile</button> --}}
                                                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                                                            :class="open && '!block'">
                                                            <div class="flex min-h-screen items-start justify-center px-4"
                                                                @click.self="open = false">
                                                                <div x-show="open" x-transition=""
                                                                    x-transition.duration.300=""
                                                                    class="panel my-8 w-full max-w-[300px] overflow-hidden rounded-lg border-0 bg-secondary p-0 dark:bg-secondary">
                                                                    <div class="panel">
                                                                        <div
                                                                            class="mb-10 flex items-center justify-between">
                                                                            <h5
                                                                                class="text-lg font-semibold dark:text-white-light">
                                                                                Elèves Absents</h5>
                                                                            {{-- <a href="javascript:;" class="btn btn-primary">Renew Now</a> --}}
                                                                        </div>
                                                                        <div class="group">
                                                                            <ul
                                                                                class="mb-7 list-inside list-disc space-y-2 font-semibold text-white-dark">
                                                                                @forelse($seance->absents as $eleve)
                                                                                    <li class="flex space-between">
                                                                                        {{ $eleve->nom_pr_eleve_fr }}<span>
                                                                                            {{ $eleve->nom_pr_eleve_ar }}</span>
                                                                                    </li>

                                                                                @empty
                                                                                    <p>Aucun eleve absent !</p>
                                                                                @endforelse


                                                                            </ul>

                                                                            <div class="mb-5 h-2.5 flex justify-center ">
                                                                                <div x-data="modal" class="inline-block">
                                                                                    <button type="button" @click="toggle"
                                                                                        data-id="{{ $seance->id }}"
                                                                                        class="btn btn-warning rounded-full editbtn "> Modifier
                                                                                        <svg width="24" height="24" viewbox="0 0 24 24"
                                                                                            fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                                            class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2">
                                                                                            <path
                                                                                                d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                                                                stroke="currentColor" stroke-width="1.5"></path>
                                                                                            <path opacity="0.5"
                                                                                                d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                                                                stroke="currentColor" stroke-width="1.5"></path>
                                                                                        </svg>
                                                                                    </button>
                                                                                    <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                                                                                        :class="open && '!block'">
                                                                                        <div class="flex min-h-screen items-start justify-center px-4"
                                                                                            @click.self="open = false">
                                                                                            <div class="panel animate__animated my-8 w-full max-w-3xl overflow-hidden rounded-lg border-0 p-0"
                                                                                                :class="$store.app.rtlClass === 'rtl' ?
                                                                                                    'animate__rotateInDownRight' :
                                                                                                    'animate__rotateInDownLeft'">
                                                                                                <div
                                                                                                    class="flex items-center justify-between bg-[#fbfbfb] px-5 py-3 dark:bg-[#121c2c]">
                                                                                                    <h5 class="text-lg font-bold">Modifier Séance</h5>
                                                                                                    <button type="button"
                                                                                                        class="text-white-dark hover:text-dark"
                                                                                                        @click="toggle">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="24px" height="24px"
                                                                                                            viewbox="0 0 24 24" fill="none"
                                                                                                            stroke="currentColor" stroke-width="1.5"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round" class="h-6 w-6">
                                                                                                            <line x1="18" y1="6"
                                                                                                                x2="6" y2="18"></line>
                                                                                                            <line x1="6" y1="6"
                                                                                                                x2="18" y2="18"></line>
                                                                                                        </svg>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="p-5">
                                                                                                    <form class="space-y-5">
                                                                                                        @csrf
                                                                                                        @method('PUT')
                                                                                                        <div
                                                                                                            class="grid grid-cols-1 gap-x-12 sm:grid-cols-2 ">
                                                                                                            <div>
                                                                                                                <div
                                                                                                                    class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-3">
                                                                                                                    <div>
                                                                                                                        <select
                                                                                                                            class="form-select text-white-dark"
                                                                                                                            id="matiere_id">
                                                                                                                            <option value="">
                                                                                                                                Choisir une matiere
                                                                                                                            </option>
                                                                                                                            @foreach ($matieres as $matiere)
                                                                                                                                <option
                                                                                                                                    value="{{ $matiere->id }}">
                                                                                                                                    {{ $matiere->nom_mat_fr }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                            
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div>
                                                                                                                        <select
                                                                                                                            class="form-select text-white-dark btngroupe"
                                                                                                                            id="groupe_id"
                                                                                                                            id="groupe">
                                                                                                                            <option value="">
                                                                                                                                Choisir un groupe
                                                                                                                            </option>
                                                                                                                            @foreach ($groupes as $groupe)
                                                                                                                                <option
                                                                                                                                    value="{{ $groupe->id }}">
                                                                                                                                    {{ $groupe->nom_groupe }}-{{ $groupe->niveau->nom_niv_fr }}-{{ $groupe->matiere->nom_mat_fr }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                            
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                            
                                                                                                                <div
                                                                                                                    class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                                                                    <div>
                                                                                                                        <select
                                                                                                                            class="form-select text-white-dark"
                                                                                                                            id="prof_id">
                                                                                                                            <option value="">
                                                                                                                                Choisir un Prof</option>
                                                                                                                            @foreach ($profs as $prof)
                                                                                                                                <option
                                                                                                                                    value="{{ $prof->id }}">
                                                                                                                                    {{ $prof->nom_pr_prof_fr }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                            
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div>
                                                                                                                        {{-- <label for="gridPassword">Classe Lycée</label> --}}
                                                                                                                        <input type="date"
                                                                                                                            id="date"
                                                                                                                            placeholder="Date"
                                                                                                                            value="{{ date('Y-m-d') }}"
                                                                                                                            class="form-input" />
                                                                                                                        <input type="hidden"
                                                                                                                            class="form-control IdSeance"
                                                                                                                            id="IdSeance">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-3">
                            
                                                                                                                    <div class="flex">
                                                                                                                        <div
                                                                                                                            class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                                viewBox="0 0 40 40"
                                                                                                                                width="24px"
                                                                                                                                height="24px">
                                                                                                                                <path fill="#8bb7f0"
                                                                                                                                    d="M20,38.5C9.799,38.5,1.5,30.201,1.5,20S9.799,1.5,20,1.5S38.5,9.799,38.5,20S30.201,38.5,20,38.5z" />
                                                                                                                                <path fill="#4e7ab5"
                                                                                                                                    d="M20,2c9.925,0,18,8.075,18,18s-8.075,18-18,18S2,29.925,2,20S10.075,2,20,2 M20,1 C9.507,1,1,9.507,1,20s8.507,19,19,19s19-8.507,19-19S30.493,1,20,1L20,1z" />
                                                                                                                                <path fill="#fff"
                                                                                                                                    d="M20,35.5c-8.547,0-15.5-6.953-15.5-15.5S11.453,4.5,20,4.5S35.5,11.453,35.5,20S28.547,35.5,20,35.5 z" />
                                                                                                                                <path fill="#4e7ab5"
                                                                                                                                    d="M20,5c8.271,0,15,6.729,15,15s-6.729,15-15,15S5,28.271,5,20S11.729,5,20,5 M20,4 C11.163,4,4,11.163,4,20s7.163,16,16,16s16-7.163,16-16S28.837,4,20,4L20,4z" />
                                                                                                                                <path fill="none"
                                                                                                                                    stroke="#66798f"
                                                                                                                                    stroke-linecap="round"
                                                                                                                                    stroke-miterlimit="10"
                                                                                                                                    stroke-width="2"
                                                                                                                                    d="M26.995 9.665L20 20 25.846 25.846" />
                                                                                                                                <path fill="#66798f"
                                                                                                                                    d="M20 18.5A1.5 1.5 0 1 0 20 21.5A1.5 1.5 0 1 0 20 18.5Z" />
                                                                                                                                <path fill="#c5d4de"
                                                                                                                                    d="M20 6A1 1 0 1 0 20 8 1 1 0 1 0 20 6zM20 32A1 1 0 1 0 20 34 1 1 0 1 0 20 32z" />
                                                                                                                                <g>
                                                                                                                                    <path
                                                                                                                                        fill="#c5d4de"
                                                                                                                                        d="M33 19A1 1 0 1 0 33 21A1 1 0 1 0 33 19Z" />
                                                                                                                                </g>
                                                                                                                                <g>
                                                                                                                                    <path
                                                                                                                                        fill="#c5d4de"
                                                                                                                                        d="M7 19A1 1 0 1 0 7 21A1 1 0 1 0 7 19Z" />
                                                                                                                                </g>
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                        <input type="time"
                                                                                                                            id="heure_deb"
                                                                                                                            placeholder="Heure début"
                                                                                                                            class="form-input ltr:rounded-l-none rtl:rounded-r-none">
                                                                                                                    </div>
                                                                                                                    <div class="flex">
                                                                                                                        <div
                                                                                                                            class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                                viewBox="0 0 40 40"
                                                                                                                                width="24px"
                                                                                                                                height="24px">
                                                                                                                                <path fill="#8bb7f0"
                                                                                                                                    d="M20,38.5C9.799,38.5,1.5,30.201,1.5,20S9.799,1.5,20,1.5S38.5,9.799,38.5,20S30.201,38.5,20,38.5z" />
                                                                                                                                <path fill="#4e7ab5"
                                                                                                                                    d="M20,2c9.925,0,18,8.075,18,18s-8.075,18-18,18S2,29.925,2,20S10.075,2,20,2 M20,1 C9.507,1,1,9.507,1,20s8.507,19,19,19s19-8.507,19-19S30.493,1,20,1L20,1z" />
                                                                                                                                <path fill="#fff"
                                                                                                                                    d="M20,35.5c-8.547,0-15.5-6.953-15.5-15.5S11.453,4.5,20,4.5S35.5,11.453,35.5,20S28.547,35.5,20,35.5 z" />
                                                                                                                                <path fill="#4e7ab5"
                                                                                                                                    d="M20,5c8.271,0,15,6.729,15,15s-6.729,15-15,15S5,28.271,5,20S11.729,5,20,5 M20,4 C11.163,4,4,11.163,4,20s7.163,16,16,16s16-7.163,16-16S28.837,4,20,4L20,4z" />
                                                                                                                                <path fill="none"
                                                                                                                                    stroke="#66798f"
                                                                                                                                    stroke-linecap="round"
                                                                                                                                    stroke-miterlimit="10"
                                                                                                                                    stroke-width="2"
                                                                                                                                    d="M26.995 9.665L20 20 25.846 25.846" />
                                                                                                                                <path fill="#66798f"
                                                                                                                                    d="M20 18.5A1.5 1.5 0 1 0 20 21.5A1.5 1.5 0 1 0 20 18.5Z" />
                                                                                                                                <path fill="#c5d4de"
                                                                                                                                    d="M20 6A1 1 0 1 0 20 8 1 1 0 1 0 20 6zM20 32A1 1 0 1 0 20 34 1 1 0 1 0 20 32z" />
                                                                                                                                <g>
                                                                                                                                    <path
                                                                                                                                        fill="#c5d4de"
                                                                                                                                        d="M33 19A1 1 0 1 0 33 21A1 1 0 1 0 33 19Z" />
                                                                                                                                </g>
                                                                                                                                <g>
                                                                                                                                    <path
                                                                                                                                        fill="#c5d4de"
                                                                                                                                        d="M7 19A1 1 0 1 0 7 21A1 1 0 1 0 7 19Z" />
                                                                                                                                </g>
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                        <input type="time"
                                                                                                                            id="heure_fin"
                                                                                                                            placeholder="Heure fin"
                                                                                                                            class="form-input ltr:rounded-l-none rtl:rounded-r-none">
                                                                                                                    </div>
                                                                                                                </div>
                            
                            
                                                                                                                <div
                                                                                                                    class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            
                                                                                                                    <div>
                                                                                                                        
                                                                                                                        <div class="flex">
                                                                                                                            <div class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee]  px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                                                                                Salle
                                                                                                                            </div>
                                                                                                                            <select name="salle" id="salle" class="py-2.5">
                                                                                                                                <option value="S1">S1</option>
                                                                                                                                <option value="S2">S2</option>
                                                                                                                                <option value="S3">S3</option>
                                                                                                                                <option value="S4">S4</option>
                                                                                                                                <option value="S5">S1</option>
                                                                                                                                <option value="S6">S6</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div>
                                                                                                                <div class="table-responsive">
                                                                                                                    <table id="mytableup"
                                                                                                                        class=" table table-sm mytableup">
                                                                                                                        <thead>
                                                                                                                            <tr>
                                                                                                                                <th><input
                                                                                                                                        id="checkAll"
                                                                                                                                        type="checkbox"
                                                                                                                                        class="form-checkbox checkAll" />
                                                                                                                                </th>
                                                                                                                                <th>الاسم و اللقب</th>
                                                                                                                                <th>Nom et Prénom</th>
                            
                            
                                                                                                                            </tr>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                            
                            
                                                                                                                        </tbody>
                                                                                                                    </table>
                            
                                                                                                                </div>
                                                                                                                <button 
                                                                                                                    class="btn btn-primary w-full updatebtn">Enregistrer</button>
                                                                                                            </div>
                                                                                                        </div>
                            
                            
                            
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                {{-- <td>
                                                    <ul>
                                                        
                                                            <li>
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                    class="inline h-4.5 w-4.5 text-primary ltr:mr-2 rtl:ml-2">
                                                                    <path
                                                                        d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.5" d="M6 14.5H14"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round"></path>
                                                                    <path opacity="0.5" d="M6 18H11.5"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round"></path>
                                                                    <path opacity="0.5"
                                                                        d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22"
                                                                        stroke="currentColor" stroke-width="1.5"></path>
                                                                </svg>
                                                                test
                                                            </li>
                                                       

                                                    </ul>
                                                </td> --}}
                                                <td
                                                    class="border-b border-[#ebedf2] p-3 text-center dark:border-[#191e3a]">

                                                    {{-- edit --}}
                                                    <div x-data="modal" class="inline-block">
                                                        <button type="button" @click="toggle"
                                                            data-id="{{ $seance->id }}"
                                                            class="btn-outline-success editbtn ">
                                                            <svg width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2">
                                                                <path
                                                                    d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                                <path opacity="0.5"
                                                                    d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                            </svg>
                                                        </button>
                                                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                                                            :class="open && '!block'">
                                                            <div class="flex min-h-screen items-start justify-center px-4"
                                                                @click.self="open = false">
                                                                <div class="panel animate__animated my-8 w-full max-w-3xl overflow-hidden rounded-lg border-0 p-0"
                                                                    :class="$store.app.rtlClass === 'rtl' ?
                                                                        'animate__rotateInDownRight' :
                                                                        'animate__rotateInDownLeft'">
                                                                    <div
                                                                        class="flex items-center justify-between bg-[#fbfbfb] px-5 py-3 dark:bg-[#121c2c]">
                                                                        <h5 class="text-lg font-bold">Modifier Séance</h5>
                                                                        <button type="button"
                                                                            class="text-white-dark hover:text-dark"
                                                                            @click="toggle">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24px" height="24px"
                                                                                viewbox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" class="h-6 w-6">
                                                                                <line x1="18" y1="6"
                                                                                    x2="6" y2="18"></line>
                                                                                <line x1="6" y1="6"
                                                                                    x2="18" y2="18"></line>
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                    <div class="p-5">
                                                                        <form class="space-y-5">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div
                                                                                class="grid grid-cols-1 gap-x-12 sm:grid-cols-2 ">
                                                                                <div>
                                                                                    <div
                                                                                        class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-3">
                                                                                        <div>
                                                                                            <select
                                                                                                class="form-select text-white-dark"
                                                                                                id="matiere_id">
                                                                                                <option value="">
                                                                                                    Choisir une matiere
                                                                                                </option>
                                                                                                @foreach ($matieres as $matiere)
                                                                                                    <option
                                                                                                        value="{{ $matiere->id }}">
                                                                                                        {{ $matiere->nom_mat_fr }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                        <div>
                                                                                            <select
                                                                                                class="form-select text-white-dark btngroupe"
                                                                                                id="groupe_id"
                                                                                                id="groupe">
                                                                                                <option value="">
                                                                                                    Choisir un groupe
                                                                                                </option>
                                                                                                @foreach ($groupes as $groupe)
                                                                                                    <option
                                                                                                        value="{{ $groupe->id }}">
                                                                                                        {{ $groupe->nom_groupe }}-{{ $groupe->niveau->nom_niv_fr }}-{{ $groupe->matiere->nom_mat_fr }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                                        <div>
                                                                                            <select
                                                                                                class="form-select text-white-dark"
                                                                                                id="prof_id">
                                                                                                <option value="">
                                                                                                    Choisir un Prof</option>
                                                                                                @foreach ($profs as $prof)
                                                                                                    <option
                                                                                                        value="{{ $prof->id }}">
                                                                                                        {{ $prof->nom_pr_prof_fr }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                        <div>
                                                                                            {{-- <label for="gridPassword">Classe Lycée</label> --}}
                                                                                            <input type="date"
                                                                                                id="date"
                                                                                                placeholder="Date"
                                                                                                value="{{ date('Y-m-d') }}"
                                                                                                class="form-input" />
                                                                                            <input type="hidden"
                                                                                                class="form-control IdSeance"
                                                                                                id="IdSeance">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-3">

                                                                                        <div class="flex">
                                                                                            <div
                                                                                                class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    viewBox="0 0 40 40"
                                                                                                    width="24px"
                                                                                                    height="24px">
                                                                                                    <path fill="#8bb7f0"
                                                                                                        d="M20,38.5C9.799,38.5,1.5,30.201,1.5,20S9.799,1.5,20,1.5S38.5,9.799,38.5,20S30.201,38.5,20,38.5z" />
                                                                                                    <path fill="#4e7ab5"
                                                                                                        d="M20,2c9.925,0,18,8.075,18,18s-8.075,18-18,18S2,29.925,2,20S10.075,2,20,2 M20,1 C9.507,1,1,9.507,1,20s8.507,19,19,19s19-8.507,19-19S30.493,1,20,1L20,1z" />
                                                                                                    <path fill="#fff"
                                                                                                        d="M20,35.5c-8.547,0-15.5-6.953-15.5-15.5S11.453,4.5,20,4.5S35.5,11.453,35.5,20S28.547,35.5,20,35.5 z" />
                                                                                                    <path fill="#4e7ab5"
                                                                                                        d="M20,5c8.271,0,15,6.729,15,15s-6.729,15-15,15S5,28.271,5,20S11.729,5,20,5 M20,4 C11.163,4,4,11.163,4,20s7.163,16,16,16s16-7.163,16-16S28.837,4,20,4L20,4z" />
                                                                                                    <path fill="none"
                                                                                                        stroke="#66798f"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-miterlimit="10"
                                                                                                        stroke-width="2"
                                                                                                        d="M26.995 9.665L20 20 25.846 25.846" />
                                                                                                    <path fill="#66798f"
                                                                                                        d="M20 18.5A1.5 1.5 0 1 0 20 21.5A1.5 1.5 0 1 0 20 18.5Z" />
                                                                                                    <path fill="#c5d4de"
                                                                                                        d="M20 6A1 1 0 1 0 20 8 1 1 0 1 0 20 6zM20 32A1 1 0 1 0 20 34 1 1 0 1 0 20 32z" />
                                                                                                    <g>
                                                                                                        <path
                                                                                                            fill="#c5d4de"
                                                                                                            d="M33 19A1 1 0 1 0 33 21A1 1 0 1 0 33 19Z" />
                                                                                                    </g>
                                                                                                    <g>
                                                                                                        <path
                                                                                                            fill="#c5d4de"
                                                                                                            d="M7 19A1 1 0 1 0 7 21A1 1 0 1 0 7 19Z" />
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </div>
                                                                                            <input type="time"
                                                                                                id="heure_deb"
                                                                                                placeholder="Heure début"
                                                                                                class="form-input ltr:rounded-l-none rtl:rounded-r-none">
                                                                                        </div>
                                                                                        <div class="flex">
                                                                                            <div
                                                                                                class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    viewBox="0 0 40 40"
                                                                                                    width="24px"
                                                                                                    height="24px">
                                                                                                    <path fill="#8bb7f0"
                                                                                                        d="M20,38.5C9.799,38.5,1.5,30.201,1.5,20S9.799,1.5,20,1.5S38.5,9.799,38.5,20S30.201,38.5,20,38.5z" />
                                                                                                    <path fill="#4e7ab5"
                                                                                                        d="M20,2c9.925,0,18,8.075,18,18s-8.075,18-18,18S2,29.925,2,20S10.075,2,20,2 M20,1 C9.507,1,1,9.507,1,20s8.507,19,19,19s19-8.507,19-19S30.493,1,20,1L20,1z" />
                                                                                                    <path fill="#fff"
                                                                                                        d="M20,35.5c-8.547,0-15.5-6.953-15.5-15.5S11.453,4.5,20,4.5S35.5,11.453,35.5,20S28.547,35.5,20,35.5 z" />
                                                                                                    <path fill="#4e7ab5"
                                                                                                        d="M20,5c8.271,0,15,6.729,15,15s-6.729,15-15,15S5,28.271,5,20S11.729,5,20,5 M20,4 C11.163,4,4,11.163,4,20s7.163,16,16,16s16-7.163,16-16S28.837,4,20,4L20,4z" />
                                                                                                    <path fill="none"
                                                                                                        stroke="#66798f"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-miterlimit="10"
                                                                                                        stroke-width="2"
                                                                                                        d="M26.995 9.665L20 20 25.846 25.846" />
                                                                                                    <path fill="#66798f"
                                                                                                        d="M20 18.5A1.5 1.5 0 1 0 20 21.5A1.5 1.5 0 1 0 20 18.5Z" />
                                                                                                    <path fill="#c5d4de"
                                                                                                        d="M20 6A1 1 0 1 0 20 8 1 1 0 1 0 20 6zM20 32A1 1 0 1 0 20 34 1 1 0 1 0 20 32z" />
                                                                                                    <g>
                                                                                                        <path
                                                                                                            fill="#c5d4de"
                                                                                                            d="M33 19A1 1 0 1 0 33 21A1 1 0 1 0 33 19Z" />
                                                                                                    </g>
                                                                                                    <g>
                                                                                                        <path
                                                                                                            fill="#c5d4de"
                                                                                                            d="M7 19A1 1 0 1 0 7 21A1 1 0 1 0 7 19Z" />
                                                                                                    </g>
                                                                                                </svg>
                                                                                            </div>
                                                                                            <input type="time"
                                                                                                id="heure_fin"
                                                                                                placeholder="Heure fin"
                                                                                                class="form-input ltr:rounded-l-none rtl:rounded-r-none">
                                                                                        </div>
                                                                                    </div>


                                                                                    <div
                                                                                        class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                                                                        <div>
                                                                                            
                                                                                            <div class="flex">
                                                                                                <div class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee]  px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md rtl:border-l-0 dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                                                                                    Salle
                                                                                                </div>
                                                                                                <select name="salle" id="salle" class="py-2.5">
                                                                                                    <option value="S1">S1</option>
                                                                                                    <option value="S2">S2</option>
                                                                                                    <option value="S3">S3</option>
                                                                                                    <option value="S4">S4</option>
                                                                                                    <option value="S5">S1</option>
                                                                                                    <option value="S6">S6</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <div class="table-responsive">
                                                                                        <table id="mytableup"
                                                                                            class=" table table-sm mytableup">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th><input
                                                                                                            id="checkAll"
                                                                                                            type="checkbox"
                                                                                                            class="form-checkbox checkAll" />
                                                                                                    </th>
                                                                                                    <th>الاسم و اللقب</th>
                                                                                                    <th>Nom et Prénom</th>


                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>


                                                                                            </tbody>
                                                                                        </table>

                                                                                    </div>
                                                                                    <button 
                                                                                        class="btn btn-primary w-full updatebtn">Enregistrer</button>
                                                                                </div>
                                                                            </div>



                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- edit --}}

                                                    <form action="{{ route('seances.destroy', $seance->id) }}"
                                                        method="post" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" x-tooltip="Delete"
                                                            class="btn-outline-danger">
                                                            <svg width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-5 w-5">
                                                                <path d="M20.5001 6H3.5" stroke="currentColor"
                                                                    stroke-width="1.5" stroke-linecap="round"></path>
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
                                                                    stroke="currentColor" stroke-width="1.5"></path>
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
            {{-- end --}}
        </div>
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

                    break;
                case 'success':

                    toastr.options.timeOut = 10000;
                    toastr.success("{{ Session::get('message') }}");


                    break;
                case 'warning':

                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");


                    break;
                case 'Error':

                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");


                    break;
            }
        @endif
    </script>
    <script>
        $(document).ready(function() {
            //présence
            $('.btngroupe').change(function() {
                var groupe_id = $('#groupe').val();

                var touseleves = {!! $eleves !!};
                var eleves = touseleves[groupe_id];
                console.log('ggg', eleves);
                $("#mytable > tbody").empty();
                eleves.forEach(function(eleve) {
                    console.log('kkk', eleve);
                    // faire quelque chose avec `value` (ou `this` qui est `value` )
                    $('#mytable > tbody:last-child').append(
                        '<tr style="height: 10px;vertical-align:middle"><td><input name="presents[]" type="checkbox" class="form-checkbox" value="' +
                        eleve.id + '" /></td><td >' + eleve.nom_pr_eleve_ar + '</td><td >' +
                        eleve.nom_pr_eleve_fr + '</td></tr>');

                });
            });
            // checkAll
            $(".checkAll").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
            // Initialize Select2
            $('.groupes').select2({
                multiple: 'true',
                placeholder: "Choisir les groupes",


            });

            //edit button
            $('.editbtn').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');


                // var action ="{{ URL::to('matieres') }}/"+id;


                // var url = "{{ URL::to('matieres') }}";

                $.get("seances/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#matiere_id').val(data.data['matiere_id']);
                    $('#groupe_id').val(data.data['groupe_id']);
                    $('#prof_id').val(data.data['prof_id']);
                    $('#date').val(data.data['date']);
                    $('#heure_deb').val(data.data['heure_deb']);
                    $('#heure_fin').val(data.data['heure_fin']);
                    $('#salle').val(data.data['salle']);
                    $('#IdSeance').val(data.data['id']);

                    var elevesp = data.data['elevesp'];
                    var elevesa = data.data['elevesa'];

                    console.log('tous eleves::' + elevesp);


                    $("#mytableup > tbody").empty();
                    elevesp.forEach(function(eleve) {
                        console.log('kkk', eleve);
                        // faire quelque chose avec `value` (ou `this` qui est `value` )
                        $('#mytableup > tbody:last-child').append(
                            '<tr style="height: 10px;vertical-align:middle"><td><input name="presents[]" type="checkbox" class="form-checkbox presents" value="' +
                            eleve.id + '" checked /></td><td >' + eleve.nom_pr_eleve_ar +
                            '</td><td >' + eleve.nom_pr_eleve_fr + '</td></tr>');

                    });
                    elevesa.forEach(function(eleve) {
                        console.log('kkk', eleve);
                        // faire quelque chose avec `value` (ou `this` qui est `value` )
                        $('#mytableup > tbody:last-child').append(
                            '<tr style="height: 10px;vertical-align:middle"><td><input name="presents[]" type="checkbox" class="form-checkbox presents" value="' +
                            eleve + '"  /></td><td >' + eleve.nom_pr_eleve_ar +
                            '</td><td >' + eleve.nom_pr_eleve_fr + '</td></tr>');

                    });
                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var id = $('#IdSeance').val();
                var matiere_id = $('#matiere_id').val();
                var groupe_id = $('#groupe_id').val();
                var prof_id = $('#prof_id').val();
                var date = $('#date').val();
                var heure_deb = $('#heure_deb').val();
                var heure_fin = $('#heure_fin').val();
                var salle = $('#salle').val();
                
                var presents = [];
        
        // Parcourir toutes les checkboxes cochées
        $('input[name="presents[]"]:checked').each(function() {
            presents.push($(this).val());
        });

                var URL = "seances/" + id;
                console.log("url===", URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        matiere_id: matiere_id,
                        groupe_id: groupe_id,
                        prof_id: prof_id,
                        date: date,
                        heure_deb: heure_deb,
                        heure_fin: heure_fin,
                        salle: salle,
                        presents: presents


                    },

                    success: function(data) {
                        // $('.modaledit').modal('hide');
                         window.location.reload();
                        //  alert('update done')

                    },
                    error:function(date){
                        console.log(data);
                    }
                });
            });


        });
    </script>
@endsection
