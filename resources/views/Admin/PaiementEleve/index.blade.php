@extends('layouts.master')
@section('content')
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <div>
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Paiement Elève</span>
                </li>
            </ul>
            {{-- start --}}
            <div class="pt-5">
                <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-12 xl:grid-cols-12">

                    <div class="panel lg:col-span-2 xl:col-span-3">
                        <div class="mb-10 flex items-center justify-between">
                            <h5 class="text-lg font-semibold dark:text-white-light">Paiement</h5>

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
                                                Nouveau paiement
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
                                                    action="{{ route('paiementsEleve.store') }}">
                                                    @csrf
                                                    <div class="grid grid-cols-1 gap-x-12 sm:grid-cols-2 ">
                                                        <div>
                                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-3">
                                                                <div>
                                                                    <select class="form-select text-white-dark btngroupe"
                                                                        name="groupe_id" id="groupe">
                                                                        <option value="">Choisir Groupe</option>
                                                                        @foreach ($groupes as $groupe)
                                                                            <option value="{{ $groupe->id }}">
                                                                                {{ $groupe->nom_groupe }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                                <div>
                                                                    <select class="form-select text-white-dark btneleve"
                                                                        name="eleve_id" id="eleve">
                                                                        <option value="">Choisir eleve</option>


                                                                    </select>
                                                                </div>

                                                            </div>

                                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                <div>
                                                                    {{-- <label for="gridPassword">Classe Lycée</label> --}}
                                                                    <input type="date" name="date" placeholder="Date"
                                                                        value="{{ date('Y-m-d') }}" class="form-input" />
                                                                </div>
                                                                <div>
                                                                    {{-- <label for="gridPassword">Classe Lycée</label> --}}
                                                                    <input type="text" name="prix"
                                                                        placeholder="Prix/Séance" class="form-input" />
                                                                </div>
                                                            </div>




                                                        </div>
                                                        <div>
                                                            <div class="table-responsive">
                                                                <table id="mytable" class=" table table-sm">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><input id="checkAll" type="checkbox"
                                                                                    class="form-checkbox" /></th>
                                                                            <th>Date séance</th>

                                                                            <th>Matière</th>


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
                                            <th> Nom & Prenom Elève</th>
                                            <th>Date</th>
                                            <th>Séances</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $payment)
                                            <tr>
                                                <td class="whitespace-nowrap">{{ $loop->iteration }}</td>
                                                <td>{{ $payment->eleve->nom_pr_eleve_fr }}</td>
                                                <td>{{ $payment->date }}</td>
                                                <td>
                                                    @foreach ($payment->seleve as $seance)
                                                        <div
                                                            class="flex items-center rounded bg-primary-light p-1 text-primary dark:bg-primary-dark-light">
                                                            <span class="ltr:pr-2 rtl:pl-2"><strong
                                                                    class="ltr:mr-1 rtl:ml-1">{{ $seance->date->format('m/d/Y') }}-</strong>{{ $seance->groupe->nom_groupe }}</span>

                                                        </div>
                                                    @endforeach


                                                </td>


                                                <td
                                                    class="border-b border-[#ebedf2] p-3 text-center dark:border-[#191e3a]">
                                                    <a x-tooltip="Imprimer" href="{{ route('eleve.recu', $payment->id) }}"
                                                        target="_blank" style="display:inline-block;">
                                                        <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                                                            class="icon" version="1.1"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M192 234.666667h640v64H192z" fill="#424242" />
                                                            <path
                                                                d="M85.333333 533.333333h853.333334v-149.333333c0-46.933333-38.4-85.333333-85.333334-85.333333H170.666667c-46.933333 0-85.333333 38.4-85.333334 85.333333v149.333333z"
                                                                fill="#616161" />
                                                            <path
                                                                d="M170.666667 768h682.666666c46.933333 0 85.333333-38.4 85.333334-85.333333v-170.666667H85.333333v170.666667c0 46.933333 38.4 85.333333 85.333334 85.333333z"
                                                                fill="#424242" />
                                                            <path
                                                                d="M853.333333 384m-21.333333 0a21.333333 21.333333 0 1 0 42.666667 0 21.333333 21.333333 0 1 0-42.666667 0Z"
                                                                fill="#00E676" />
                                                            <path
                                                                d="M234.666667 85.333333h554.666666v213.333334H234.666667z"
                                                                fill="#90CAF9" />
                                                            <path
                                                                d="M800 661.333333h-576c-17.066667 0-32-14.933333-32-32s14.933333-32 32-32h576c17.066667 0 32 14.933333 32 32s-14.933333 32-32 32z"
                                                                fill="#242424" />
                                                            <path
                                                                d="M234.666667 661.333333h554.666666v234.666667H234.666667z"
                                                                fill="#90CAF9" />
                                                            <path
                                                                d="M234.666667 618.666667h554.666666v42.666666H234.666667z"
                                                                fill="#42A5F5" />
                                                            <path
                                                                d="M341.333333 704h362.666667v42.666667H341.333333zM341.333333 789.333333h277.333334v42.666667H341.333333z"
                                                                fill="#1976D2" />
                                                        </svg>
                                                    </a>
                                                    {{-- edit --}}
                                                    <div x-data="modal" class="inline-block">
                                                        <button type="button" @click="toggle" x-tooltip="Modifier"
                                                            data-id="{{ $payment->id }}"
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
                                                                        <h5 class="text-lg font-bold">Modifier Elève</h5>
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
                                                                            <div class="grid grid-cols-1 gap-x-12 sm:grid-cols-2 ">
                                                                                <div>
                                                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-3">
                                                                                        <div>
                                                                                            <select class="form-select text-white-dark btngroupeup"
                                                                                                name="groupe_id" id="groupeup">
                                                                                                <option value="">Choisir Groupe</option>
                                                                                                @foreach ($groupes as $groupe)
                                                                                                    <option value="{{ $groupe->id }}">
                                                                                                        {{ $groupe->nom_groupe }}</option>
                                                                                                @endforeach
                        
                                                                                            </select>
                                                                                            <input type="hidden" name="" id="IdPayment">
                                                                                        </div>
                                                                                        <div>
                                                                                            <select class="form-select text-white-dark btneleveup"
                                                                                                name="eleve_id" id="eleveup">
                                                                                                <option value="">Choisir eleve</option>
                        
                        
                                                                                            </select>
                                                                                        </div>
                        
                                                                                    </div>
                        
                                                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                                                        <div>
                                                                                            {{-- <label for="gridPassword">Classe Lycée</label> --}}
                                                                                            <input type="date" name="date" placeholder="Date"
                                                                                                id="date" class="form-input" />
                                                                                        </div>
                                                                                        <div>
                                                                                            {{-- <label for="gridPassword">Classe Lycée</label> --}}
                                                                                            <input type="text" id="prix"
                                                                                                placeholder="Prix/Séance" class="form-input" />
                                                                                        </div>
                                                                                    </div>
                        
                        
                        
                        
                                                                                </div>
                                                                                <div>
                                                                                    <div class="table-responsive">
                                                                                        <table id="mytableup" class=" table table-sm">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th><input id="checkAll" type="checkbox"
                                                                                                            class="form-checkbox" /></th>
                                                                                                    <th>Date séance</th>
                        
                                                                                                    <th>Matière</th>
                        
                        
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                        
                        
                                                                                            </tbody>
                                                                                        </table>
                        
                                                                                    </div>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary w-full btnupdate">Enregistrer</button>
                                                                                </div>
                                                                            </div>

                                                                            
                                                                            

                                                                            
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- edit --}}

                                                    <form action="{{ route('paiementsEleve.destroy', $payment->id) }}"
                                                        method="post" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" x-tooltip="Supprimer"
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
            var eleves;
            var elevesbygroupe = {!! json_encode($elevesbygroupe) !!};
            $('.btngroupe').change(function() {
                var groupe_id = $('#groupe').val();
                console.log(groupe_id);
                


                eleves = elevesbygroupe[groupe_id];
                console.log(eleves);
                eleves.forEach(function(eleve) {

                    $("#eleve").append(new Option(eleve.nom_pr_eleve_ar, eleve.id));

                });

            });
            $('.btngroupeup').change(function() {
                var groupe_id = $('#groupeup').val();
                console.log(groupe_id);
                


                eleves = elevesbygroupe[groupe_id];
                console.log(eleves);
                eleves.forEach(function(eleve) {

                    $("#eleveup").append(new Option(eleve.nom_pr_eleve_ar, eleve.id));

                });

            });
            $('.btneleve').change(function() {
                // $('.btngroupe').prop('disabled', 'disabled');
                // $('.btngroupe option').remove();
                var eleve_id = $('#eleve').val();
                var matieres = {!! $matieres !!};
                var eleveSeances = {!! json_encode($eleveSeances) !!};


                var seances = eleveSeances[eleve_id];

                $("#mytable > tbody").empty();
                if (seances.length != 0) {
                    seances.forEach(function(seance) {

                        // faire quelque chose avec `value` (ou `this` qui est `value` )
                        $('#mytable > tbody:last-child').append(
                            '<tr style="height: 10px;vertical-align:middle"><td><input name="seances[]" type="checkbox" class="form-checkbox" value="' +
                            seance.id + '" /></td><td >' + seance.date + '</td><td >' +
                            matieres[seance.matiere_id].nom_mat_fr + '</td></tr>');

                    });
                } else {
                    $('#mytable > tbody:last-child').append(
                        '<tr style="height: 10px;vertical-align:middle"><td colspan="3"><h2 style="text-align:center">Aucune Séance Impayée</h2></td></tr>'
                        );

                }

            });
            // checkAll
            $("#checkAll").click(function() {
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
                console.log('id=',id);

                $.get("paiementsEleve/" + id + "/edit", function(data) {
                     console.log(data.data);
                    $('#eleve_id').val(data.data['eleve_id']);
                    $('#groupe_id').val(data.data['groupe_id']);
                    $('#date').val(data.data['date']);
                    $('#prix').val(data.data['prix']);
                    
                    $('#IdPayment').val(data.data['id']);


                   
                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var id = $('#IdEleve').val();
                var nom_pr_eleve_fr = $('#nom_pr_eleve_fr').val();
                var nom_pr_eleve_ar = $('#nom_pr_eleve_ar').val();
                var lycee = $('#lycee').val();
                var classe_lycee = $('#classe_lycee').val();
                var tel = $('#tel').val();
                var tel_parent = $('#tel_parent').val();
                var groupes = $('#groupes').val();


                var URL = "eleves/" + id;
                console.log("url===", URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        nom_pr_eleve_fr: nom_pr_eleve_fr,
                        nom_pr_eleve_ar: nom_pr_eleve_ar,
                        tel: tel,
                        tel_parent: tel_parent,
                        lycee: lycee,
                        classe_lycee: classe_lycee,
                        groupes: groupes


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
@endsection
