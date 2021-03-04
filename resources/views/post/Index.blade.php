<x-App>

 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script> 


    <!--Container-->
    <div class="container w-full mx-auto pt-20">

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

            

           

            <div class="flex flex-row flex-wrap flex-grow mt-2">

                    
               




                <!--cat add-->
                <div class="w-full md:w-2/3 p-3">
                    
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600">Add</h5>
                        </div>
                        <div class="p-3">
                            <form class="w-full px-3 space-y-3 sm:px-10 sm:space-y-4" method="POST" action="{{ route('post.store') }}">
                                @csrf


                                <div class="flex flex-wrap">
                                    <label for="parant" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 ">
                                        Parant:
                                    </label>
                                    <select class="inputtext form-input " name="parant">
                                        <option value="">Main</option>
                                        @foreach ($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
            
                                <div class="flex flex-wrap">
                                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 ">
                                        Title:
                                    </label>
                                    <input id="title" type="text"
                                        class="inputtext form-input @error('title') border-red-500 @enderror" name="title"
                                        value="{{ old('title') }}" required  autofocus>
            
                                        @error('title')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <label for=body" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 ">
                                        Body:
                                    </label>
                                    <textarea id="body"  rows="3"
                                        class="summernote inputtext form-input @error('body') border-red-500 @enderror" name="body"
                                        value="{{ old('title') }}" required  autofocus> </textarea>
            
                                        @error('body')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                </div>

                                


                                <div class="flex flex-wrap">
                                    <label for="order" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 ">
                                        Order:
                                    </label>
                                    <input id="order" type="number"
                                        class="inputtext form-input  @error('name') border-red-500 @enderror" name="order"
                                        value="0" required  autofocus>
             
                                </div>

                                
                                <button type="submit"  
                                class="btn1">
                                    Submit
                                </button>
            
                                
                                
            
                                
                            </form>
                             
                        </div>
                    </div>
                </div>





                <div class="w-full  md:w-1/3 p-3">
                    <!--Table Card-->
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600">posts</h5>
                        </div>
                        <div class="p-5">
                            <table class="w-full p-5 text-gray-700">
                                <thead>
                                    <tr>
          
                                        <th class="text-left text-blue-900">Title</th>
                                
                                        <th class="text-left text-blue-900">edit</th>
                                        <th class="text-left text-blue-900">drop</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                    
                                        <td> <a href="{{$post->path('edit')}}">Edit</a> </td>
                                        
                                        <td> <button onclick="document.getElementById({{$post->id}}).submit();">remove</button> 
                                            <form id="{{$post->id}}" method="POST" action="{{ route('post.delete') }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{$post->id}}">
                                            </form>
                                        </td>
                                

                                    </tr>
                                    @empty
                                        <tr><td>No found</td></tr>
                                    @endforelse
 
                                    
                                 
                                </tbody>
                            </table>
 
                        </div>
                    </div>
                    <!--/table Card-->
                </div>

















            </div>

            <!--/ Console Content-->

        </div>


    </div>
    <!--/container-->

    <script type="text/javascript">
        $('.summernote').summernote({
            tabsize: 2,
            height: 400
        });
    </script>
    
</x-App>