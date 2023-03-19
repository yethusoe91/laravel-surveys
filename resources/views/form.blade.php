<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Carro Customer Surveys</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="antialiased  bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">
    <!--container bit. Not needed in real life cos there will already be a container-->
    
    <div class="min-h-screen flex items-center justify-center  bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">
        <!--The form-->
        <div class="bg-white p-16 rounded 2xl w-2/3">
            
            <h2 class="text-3xl font-bold mb-10 text-gray-700">{{ $form->name }}</h2>
            <form action={{ route('form.submit')}} method="POST" class="space-y-5">
                @csrf
                @foreach ($form->inputs as $input)
                <div>
                    <label class="block mb-1 font-bold text-gray-500" for="{{ $input->id}}">
                        {{ $input->name}}
                    </label>
                    
                    @if($input->type == 'date-picker')
                    <input 
                    class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500"
                    type="date"
                    id="{{ $input->id}}"
                    name="{{ $input->id}}" {{ $input->required ? 'required' : ''}}>
                    @elseif($input->type == 'number')
                    <input 
                    class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500"
                    type="number"
                    id="{{ $input->id}}"
                    name="{{ $input->id}}" {{ $input->required ? 'required' : ''}}>
                    @else
                    <input 
                    class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500"
                    type="text"
                    id="{{ $input->id}}"
                    name="{{ $input->id}}" {{ $input->required ? 'required' : ''}}>
                    @endif
                    
                </div>    
                @endforeach
                
                <button class="block w-full bg-yellow-400 hover:bg-yellow-300 p-4 rounded text-yellow-900 hover: text-yellow-800 transition-duration-300">
                    Submit
                </button>
            </form>
        </div>
    </div>
</body>
</html>
