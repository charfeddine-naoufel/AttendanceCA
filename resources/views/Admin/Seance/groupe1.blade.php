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
                                        @foreach ($seancesByGroupAndMonth as $groupId => $seancesByMonth)
                                            <li>
                                                <a href="javascript:;"
                                                    class="-mb-[1px] block border border-transparent p-3.5 py-2 hover:text-primary dark:hover:border-b-black !border-white-light !border-b-white text-primary dark:!border-[#191e3a] dark:!border-b-black {{ $loop->first ? 'active' : '' }}"
                                                    @click="tab = '{{ $groupes[$groupId] }}'">Groupe-{{ $groupes[$groupId] }}</a>
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>
                                <div class="flex-1 pt-5 text-sm">
                                    @foreach ($seancesByGroupAndMonth as $groupId => $seancesByMonth)
                                        <template x-if="tab === '{{ $groupes[$groupId] }}'">
                                            <div class="active">
                                                <h4 class="mb-4 text-2xl font-semibold">G-{{ $groupes[$groupId] }}</h4>
                                                <div
                                                    class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
                                                    @foreach (['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'] as $mois)
                                                        <div
                                                            class="max-w-[24rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                                                            <div class="flex justify-between mb-5">
                                                                <h6
                                                                    class="text-[#0e1726] font-semibold text-base dark:text-white-light text-danger">
                                                                    {{ $mois }}</h6>
                                                                <span
                                                                    class="badge bg-primary/10 text-primary py-1.5 dark:bg-primary dark:text-white">IN
                                                                    PROGRESS</span>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table class="table-striped">
                                                                    <thead>
                                                                        <tr>

                                                                            <th>Date</th>
                                                                            <th>Prof</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($seancesByMonth as $month => $seances)
                                                                            <tr>
                                                                                <td>mm </td>
                                                                                <td>pppp</td>
                                                                            </tr>
                                                                        @endforeach

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="text-right">
                                                                <span class="text-primary font-semibold">60%</span>
                                                                <div
                                                                    class="bg-[#ebedf2] dark:bg-[#0e1726] rounded-full w-full h-1.5 mt-1.5">
                                                                    <div class="rounded-full bg-primary h-full"
                                                                        style="width: 60%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

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
