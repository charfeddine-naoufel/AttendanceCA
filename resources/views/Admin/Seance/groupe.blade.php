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
            <div>
                <div class="space-y-8">

                    <div class="panel">
                        <h5 class="mb-5 text-lg font-semibold dark:text-white-light">Séances par Groupe</h5>

                        <div class="p-5">
                            <div class="mb-5" x-data="{ tab: 'home' }">
                                <div>
                                    <ul class="mt-3 flex flex-wrap border-b border-white-light dark:border-[#191e3a]">
                                        @foreach ( $seancesByGroupAndMonth as $groupId => $seancesByMonth )
                                            
                                        <li>
                                            <a href="javascript:;"
                                            class="-mb-[1px] block border border-transparent p-3.5 py-2 hover:text-primary dark:hover:border-b-black !border-white-light !border-b-white text-primary dark:!border-[#191e3a] dark:!border-b-black {{ $loop->first ? 'active' : '' }}"
                                            @click="tab = '{{$groupes[$groupId]}}'">Groupe-{{$groupes[$groupId]}}</a>
                                        </li>
                                        
                                        @endforeach
                                       
                                        
                                    </ul>
                                </div>
                                @php
                                    // Obtenir le mois courant au format 'Y-m'
                                    $currentMonth = Carbon\Carbon::now()->format('Y-m');
                                @endphp
                                <div class="flex-1 p-3 border text-sm">
                                    @foreach ( $seancesByGroupAndMonth as $groupId => $seancesByMonth )
                                        
                                        <template x-if="tab === '{{$groupes[$groupId]}}'">
                                            <div class="active">
                                                <h4 class="mb-4 text-2xl font-semibold">Groupe-{{$groupes[$groupId]}}</h4>
                                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
                                                    @if (isset($seancesByGroupAndMonth[$groupId]))
                                                    @foreach ($seancesByGroupAndMonth[$groupId] as $month => $seances)
                                                    <div class="max-w-[24rem] w-full  shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 {{ $month === $currentMonth ? 'bg-warning bg-gradient' : 'bg-white' }}">
                                                        <div class="flex justify-between mb-5">
                                                            <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light text-danger"><strong> {{ Carbon\Carbon::parse($month)->translatedFormat('F Y') }}</strong></h6>
                                                            {{ $month === $currentMonth ? '' : '' }}
                                                            <span class="badge  py-1.5 dark:bg-primary dark:text-white {{ $month === $currentMonth ? 'bg-primary/10 text-primary' : 'd-none' }}">En-Cours</span>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table table-sm table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nom et Prénom</th>
                                                                        @foreach ($seances as $seance)
                                                                            <th style="writing-mode: vertical-lr; text-orientation: mixed;font-size:10px;">{{ Carbon\Carbon::parse($seance->date)->format('d/m/Y') }}</th>
                                                                        @endforeach
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($seances->first()->groupe->eleves as $eleve)
                                                                        <tr>
                                                                            <td>{{ $eleve->nom_pr_eleve_fr }} </td>
                                                                            @foreach ($seances as $seance)
                                                                                <td>
                                                                                    <input type="checkbox" name="presence[{{ $eleve->id }}][{{ $seance->id }}]"
                                                                                        {{ in_array($eleve->id, $seance->eleves_presents) ? 'checked' : '' }}>
                                                                                </td>
                                                                            @endforeach
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        {{-- <div class="text-right">
                                                            <span class="text-primary font-semibold">60%</span>
                                                            <div class="bg-[#ebedf2] dark:bg-[#0e1726] rounded-full w-full h-1.5 mt-1.5">
                                                                <div class="rounded-full bg-primary h-full" style="width: 60%;"></div>
                                                            </div>
                                                        </div> --}}
                                                    </div> 
                                                    @endforeach
                                                    @else
                                                    <p>Aucune séance pour ce groupe</p>
                                                    @endif
                                                    
                                                </div>


                                            </div>
                                        </template>
                                    @endforeach
                                   
                                    
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
