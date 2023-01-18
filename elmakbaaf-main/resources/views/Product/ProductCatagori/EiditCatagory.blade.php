<x-app-layout>
    <x-slot name="header">
        
  
<!----Form of editing counry  ---->
        
        <div class="border-collapse w-full flex flex-col pt-4">
            <form  class="p-10 bg-white rounded shadow-xl" method="Post">
                @csrf
                @method('PUT')
               
                <div class="mt-2">
                     <label class="block text-sm text-gray-600" for="">Edit Catagory:</label><br>
                     <input   class="w-full px-5  py-4 text-gray-700  rounded" id=""   type="text" required="" name="catagory_name" placeholder="" value="{{$catagory->catagory_name}}">
               </div>
                
                  <div class="mt-6">                                     
                    <button  class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded"  value="Update">Update</button>
               </div>
               </form>
     </x-slot>
</x-app-layout>