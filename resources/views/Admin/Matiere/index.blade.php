@extends("layouts.master")
@section('content')
<div class="animate__animated p-6" :class="[$store.app.animation]">
    <div x-data="finance">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Matiere</span>
            </li>
        </ul>
        {{-- start --}}
        <div class="pt-5">
            <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-12 xl:grid-cols-12">
                
                <div class="panel lg:col-span-2 xl:col-span-3">
                    <div class="mb-10 flex items-center justify-between">
                        <h5 class="text-lg font-semibold dark:text-white-light">Matiere</h5>
                        
                             <!-- Register -->
                             <div x-data="modal">
                                <button type="button" class="btn btn-danger" @click="toggle"><svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Add">
                                    <path clip-rule="evenodd" d="M1.25 3C1.25 1.48122 2.48122 0.25 4 0.25H14C15.5188 0.25 16.75 1.48122 16.75 3V10.5C16.75 10.9142 16.4142 11.25 16 11.25C15.5858 11.25 15.25 10.9142 15.25 10.5V3C15.25 2.30964 14.6904 1.75 14 1.75H4C3.30964 1.75 2.75 2.30964 2.75 3V21C2.75 21.6904 3.30964 22.25 4 22.25H12C12.4142 22.25 12.75 22.5858 12.75 23C12.75 23.4142 12.4142 23.75 12 23.75H4C2.48122 23.75 1.25 22.5188 1.25 21V3Z" fill="#fff" fill-rule="evenodd" id="Rectangle 12 (Stroke)"/>
                                    <path clip-rule="evenodd" d="M4.36201 0.605702C4.49867 0.384589 4.74007 0.25 5 0.25H13C13.2599 0.25 13.5013 0.384589 13.638 0.605702C13.7746 0.826814 13.7871 1.10292 13.6708 1.33541L12.9472 2.78262C12.6508 3.3755 12.0448 3.75 11.382 3.75H6.61803C5.95518 3.75 5.34922 3.3755 5.05279 2.78262L4.32918 1.33541C4.21293 1.10292 4.22536 0.826814 4.36201 0.605702ZM6.21353 1.75L6.39443 2.1118C6.43678 2.1965 6.52334 2.25 6.61803 2.25H11.382C11.4767 2.25 11.5632 2.1965 11.6056 2.1118L11.7865 1.75H6.21353Z" fill="#fff" fill-rule="evenodd" id="Rectangle 13 (Stroke)"/>
                                    <path clip-rule="evenodd" d="M6.25 20C6.25 19.5858 6.58579 19.25 7 19.25H11C11.4142 19.25 11.75 19.5858 11.75 20C11.75 20.4142 11.4142 20.75 11 20.75H7C6.58579 20.75 6.25 20.4142 6.25 20Z" fill="#fff" fill-rule="evenodd" id="Vector 11 (Stroke)"/>
                                    <path clip-rule="evenodd" d="M18 13.75C15.6528 13.75 13.75 15.6528 13.75 18C13.75 20.3472 15.6528 22.25 18 22.25C20.3472 22.25 22.25 20.3472 22.25 18C22.25 15.6528 20.3472 13.75 18 13.75ZM12.25 18C12.25 14.8244 14.8244 12.25 18 12.25C21.1756 12.25 23.75 14.8244 23.75 18C23.75 21.1756 21.1756 23.75 18 23.75C14.8244 23.75 12.25 21.1756 12.25 18Z" fill="#fff" fill-rule="evenodd" id="Ellipse 7 (Stroke)"/>
                                    <path clip-rule="evenodd" d="M18 15.25C18.4142 15.25 18.75 15.5858 18.75 16V20C18.75 20.4142 18.4142 20.75 18 20.75C17.5858 20.75 17.25 20.4142 17.25 20V16C17.25 15.5858 17.5858 15.25 18 15.25Z" fill="#fff" fill-rule="evenodd" id="Vector 14 (Stroke)"/>
                                    <path clip-rule="evenodd" d="M15.25 18C15.25 17.5858 15.5858 17.25 16 17.25H20C20.4142 17.25 20.75 17.5858 20.75 18C20.75 18.4142 20.4142 18.75 20 18.75H16C15.5858 18.75 15.25 18.4142 15.25 18Z" fill="#fff" fill-rule="evenodd" id="Vector 15 (Stroke)"/>
                                    </g></svg>
                                
                                 <span class="ml-2">Ajouter</span></button>
                                <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="open && '!block'">
                                    <div class="flex min-h-screen items-start justify-center px-4" @click.self="open = false">
                                        <div x-show="open" x-transition="" x-transition.duration.300="" class="panel my-8 w-full max-w-sm overflow-hidden rounded-lg border-0 py-1 px-4">
                                            <div class="flex items-center justify-between p-5 text-lg font-semibold dark:text-white">
                                                Nouvelle Matière
                                                <button type="button" @click="toggle" class="text-white-dark hover:text-dark">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="p-5">
                                                <form method="post" action="{{ route('matieres.store') }}">
                                                   @csrf
                                                    <div class="relative mb-4">
                                                        <span class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                                <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                                                <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5"></ellipse>
                                                            </svg>
                                                        </span>
                                                        <input type="text" placeholder="Nom matière"name="nom_mat_fr" class="form-input ltr:pl-10 rtl:pr-10">
                                                    </div>
                                                    <div class="relative mb-4">
                                                        <span class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                                <path d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 12.7215 17.8726 13.4133 17.6392 14.054C17.5551 14.285 17.4075 14.4861 17.2268 14.6527L17.1463 14.727C16.591 15.2392 15.7573 15.3049 15.1288 14.8858C14.6735 14.5823 14.4 14.0713 14.4 13.5241V12M14.4 12C14.4 13.3255 13.3255 14.4 12 14.4C10.6745 14.4 9.6 13.3255 9.6 12C9.6 10.6745 10.6745 9.6 12 9.6C13.3255 9.6 14.4 10.6745 14.4 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                                <path opacity="0.5" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                                            </svg>
                                                        </span>
                                                        <input type="text" placeholder="اسم المادة"name="nom_mat_ar" class="form-input ltr:pl-10 rtl:pr-10">
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-primary w-full">Submit</button>
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
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom Matière</th>
                                        <th>المادة</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($matieres as $matiere)
                                        
                                    
                                        <tr>
                                            <td  class="whitespace-nowrap">{{$loop->iteration}}</td>
                                            <td >{{$matiere->nom_mat_fr}}</td>
                                            <td >{{$matiere->nom_mat_ar}}</td>
                                            <td class="border-b border-[#ebedf2] p-3 text-center dark:border-[#191e3a]">
                                                
                                                {{-- edit --}}
                                                <div x-data="modal" class="inline-block">
                                                    <button type="button"  @click="toggle" data-id="{{$matiere->id}}" class="btn-outline-success editbtn ">
                                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2">
                                                            <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"></path>
                                                            <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"></path>
                                                        </svg>
                                                    </button>
                                                    <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="open && '!block'">
                                                        <div class="flex min-h-screen items-start justify-center px-4" @click.self="open = false">
                                                            <div class="panel animate__animated my-8 w-full max-w-lg overflow-hidden rounded-lg border-0 p-0" :class="$store.app.rtlClass === 'rtl' ? 'animate__rotateInDownRight' : 'animate__rotateInDownLeft'">
                                                                <div class="flex items-center justify-between bg-[#fbfbfb] px-5 py-3 dark:bg-[#121c2c]">
                                                                    <h5 class="text-lg font-bold">Modifier Matière</h5>
                                                                    <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                <div class="p-5">
                                                                    <form >
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="relative mb-4">
                                                                            <span class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                                                    <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                                                                    <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5"></ellipse>
                                                                                </svg>
                                                                            </span>
                                                                            <input type="text" placeholder="Nom matière" name="nom_mat_fr" id="nom_mat_fr{{$matiere->id}}" class="form-input ltr:pl-10 rtl:pr-10">
                                                                            <input type="hidden" class="form-control" id="IdMatiere" name="IdMatiere">
                                                                        </div>
                                                                        <div class="relative mb-4">
                                                                            <span class="absolute top-1/2 -translate-y-1/2 ltr:left-3 rtl:right-3 dark:text-white-dark">
                                                                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                                                    <path d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 12.7215 17.8726 13.4133 17.6392 14.054C17.5551 14.285 17.4075 14.4861 17.2268 14.6527L17.1463 14.727C16.591 15.2392 15.7573 15.3049 15.1288 14.8858C14.6735 14.5823 14.4 14.0713 14.4 13.5241V12M14.4 12C14.4 13.3255 13.3255 14.4 12 14.4C10.6745 14.4 9.6 13.3255 9.6 12C9.6 10.6745 10.6745 9.6 12 9.6C13.3255 9.6 14.4 10.6745 14.4 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                                                    <path opacity="0.5" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                                                                </svg>
                                                                            </span>
                                                                            <input type="text" placeholder="اسم المادة"name="nom_mat_ar" id="nom_mat_ar{{$matiere->id}}" class="form-input ltr:pl-10 rtl:pr-10">
                                                                        </div>
                                                                        
                                                                        <button type="" class="btn btn-primary w-full updatebtn">Submit</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- edit --}}

                                                <form action="{{ route('matieres.destroy', $matiere->id)}}" method="post" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    <button type="submit" x-tooltip="Delete" class="btn-outline-danger"  >
                                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                        <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5"></path>
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
@section("scripts")
<script type="module">
    $(document).ready(function () {
    //edit button
    $('.editbtn').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');


                // var action ="{{ URL::to('matieres') }}/"+id;


                // var url = "{{ URL::to('matieres') }}";

                $.get("matieres/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#nom_mat_fr'+ id).val(data.data['nom_mat_fr']);
                    $('#nom_mat_ar'+ id).val(data.data['nom_mat_ar']);
                    $('#IdMatiere').val(data.data['id']);



                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var id = $('#IdMatiere').val();
                var nom_mat_fr = $('#nom_mat_fr'+ id).val();
                var nom_mat_ar = $('#nom_mat_ar'+ id).val();
                var id = $('#IdMatiere').val();
                alert(id);
                var URL ="matieres/"+ id;
                console.log("url===",URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id,
                        nom_mat_fr: nom_mat_fr,
                        nom_mat_ar: nom_mat_ar },

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