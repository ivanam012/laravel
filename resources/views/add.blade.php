<x-app-layout>
    <x-slot name="header">
        <h2 class="font semibold text-xl text-gray-800 leading-tight">
            {{__('Add Book')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <form action="/book" method="POST">
                    <div class="form-group">
                        <textarea name="bookSummary" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter bookSummary'></textarea>  
                        @if ($errors->has('bookSummary'))
                            <span class="text-danger">{{ $errors->first('bookSummary') }}</span>
                        @endif
                        <textarea name="name" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter name of a book'></textarea>  
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <textarea name="bookWriter" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter bookWriter'></textarea>  
                        @if ($errors->has('bookWriter'))
                            <span class="text-danger">{{ $errors->first('bookWriter') }}</span>
                        @endif
                        <textarea name="genre" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter genre'></textarea>  
                        @if ($errors->has('genre'))
                            <span class="text-danger">{{ $errors->first('genre') }}</span>
                        @endif
                        <textarea name="publisher" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter publisher'></textarea>  
                        @if ($errors->has('publisher'))
                            <span class="text-danger">{{ $errors->first('publisher') }}</span>
                        @endif

                    </div>

                    <div class="form-group">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Book</button>
                    </div>
                    {{ csrf_field() }}  
                    
                </form>
            </div>    
        
        </div>
    
    </div>

</x-app-layout>

