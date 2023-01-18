<x-app-layout>
    <x-slot name="header">
        @include('layouts.AdminSidebar')  
    

        <div class="w-full  bg-gray-200">

          @if(session()->has('message'))
          <div id="alert" class="flex items-center mb-2 bg-green-300 text-white text-sm font-bold px-4 py-3" role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
              <p>{{session()->get('message')}}</p>
          </div>
          @endif


            <div class="flex justify-between p-4">
              <div>
                  
                  <h6 class="font-bold"> <span class="text-sm font-medium"></span></h6>
              </div>
              <div class="w-80">
                  <h1 class="font-bold  text-xl">  People Who Contacted</h1>   
                                      
              </div>
             
              <div></div>
          </div> 
<table class="border-collapse w-full">
   
  <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">  
    <form action="" type="get">
        <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white  px-12">
             <div class="flex justify-between">
                 <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                    
                    <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                       
                         <input type="search" name="search" class="flex-shrink flex-grow  leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs  lg:text-base text-gray-500 font-thin" placeholder="Search" value="{{$search}}">
                         <button type="submit" >
                              <div class="flex">
                           <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </button>
                   </div>                            
                 </div>
             </div> 
            </form>
     </div>
  
  <thead>
        <tr>
            <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Id</th>
            <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">First name</th>
            <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Last name</th>
            <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Email</th>
            <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Phone </th>
            <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Message</th>    
            <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Action</th>    

          </tr>
    </thead>
     <tbody>
     @foreach ($contactedpeoples as $contactedpeople) 
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">                   
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
              <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ID</span>
              {{$contactedpeople->id}}
           </td>
           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">First name</span>
            {{$contactedpeople->first_name}} 
           </td>
  
           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Last name</span>
           {{$contactedpeople->last_name}}
           </td>
  
           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Email</span>
            {{$contactedpeople->email}}
          </td>
  
           <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Phone</span>
            {{$contactedpeople->contact_num}}
          </td>

          <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Phone</span>
            {{$contactedpeople->messege}}
          </td>

          <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
              <a href="javascript:void(0)" recordid="{{$contactedpeople->id}}" class="ConfirmDelete text-red-400 hover:text-gray-100 ml-2">
                    <svg
                    class="w-5 "
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
              </a>
          </td>

        </tr>
        {{ $contactedpeoples->links('pagination::tailwind') }}
        @endforeach
  
    </tbody> 
  </table>
   
  
</x-slot>
<script>
                      
  $(".ConfirmDelete").click(function(){
    var recordid =$(this).attr("recordid");
       Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
         if (result.isConfirmed) {
           Swal.fire(
               'Deleted!',
              'Your file has been deleted.',
                 'success'
           )
            window.location.href="/websitecontactus/delete/"+recordid;
    }
});    
}) 



   $("document").ready(function(){
            setTimeout(function(){
                $("#alert").remove();
            },5000);
        });


     </script>
</x-app-layout>