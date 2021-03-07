
<?php
$categories = resolve('allCategories');
?>
<x-App>
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
                            <form class="w-full px-3 space-y-3 sm:px-10 sm:space-y-4" enctype="multipart/form-data" method="POST" action="{{ route('post.store') }}">
                                @csrf

 
            
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
                                    <label for=html" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 ">
                                        Html:
                                    </label>
                                    <textarea id="html"  rows="3"
                                        class="summernote inputtext form-input @error('html') border-red-500 @enderror" name="html"
                                        value="{{ old('title') }}" required  autofocus> </textarea>
            
                                        @error('html')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <label for="react" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 ">
                                        React:
                                    </label>
                                    <textarea id="react"  rows="3"
                                        class="summernote inputtext form-input @error('react') border-red-500 @enderror" name="react"
                                        value="{{ old('react') }}" required  autofocus> </textarea>
            
                                        @error('react')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                </div>

                                <div class="flex flex-wrap">
                                    <label for="vue" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 ">
                                        Vue:
                                    </label>
                                    <textarea id="vue"  rows="3"
                                        class="summernote inputtext form-input @error('vue') border-red-500 @enderror" name="vue"
                                        value="{{ old('vue') }}" required  autofocus> </textarea>
            
                                        @error('vue')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                </div>


                                <div class="flex flex-wrap">
                                    <label for="cover" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 ">
                                        Cover:
                                    </label>
                                    <input type="file" name="cover" id="">
            
                                        @error('cover')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                </div>


                                <div class="flex flex-wrap">
                                    <label for="cat" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 w-full">
                                        Category:
                                    </label>



                                    <label class="flex flex-col items-center mt-3">

                                        @foreach($categories as $cat)
                                        <div>
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" value="{{$cat->id}}" name="cat[]">
                                            <span class="ml-2 text-gray-700">{{$cat->name}}</span>
                                        </div>
                                        @endforeach

                                        
                                    </label>
                                    
                                     
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