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
                                            class="-mb-[1px] block border border-transparent p-3.5 py-2 hover:text-primary dark:hover:border-b-black !border-white-light !border-b-white text-primary dark:!border-[#191e3a] dark:!border-b-black"
                                            :class="{ '!border-white-light !border-b-white  text-primary dark:!border-[#191e3a] dark:!border-b-black': tab === 'home' }"
                                            @click="tab = '{{$groupes[$groupId]}}'">Groupe-{{$groupes[$groupId]}}</a>
                                        </li>
                                        
                                        @endforeach
                                       
                                        
                                    </ul>
                                </div>
                                <div class="flex-1 pt-5 text-sm">
                                    @foreach ( $seancesByGroupAndMonth as $groupId => $seancesByMonth )

                                    <template x-if="tab === '{{$groupes[$groupId]}}'">
                                        <div class="active">
                                            <h4 class="mb-4 text-2xl font-semibold">G-{{$groupes[$groupId]}}</h4>
                                            <p class="mb-4">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat.
                                            </p>
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
