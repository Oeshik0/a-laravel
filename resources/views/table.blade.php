<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-center mb-6">Data Table</h1>
        
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300 bg-white shadow-lg rounded-lg">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Description</th>
                        <th class="py-3 px-6 text-left">Picture</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($akash as $asur)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $asur->id }}</td>
                            <td class="py-3 px-6 text-left">{{ $asur->name }}</td>
                            <td class="py-3 px-6 text-left">{{ $asur->description }}</td>
                            <td class="py-3 px-6 text-left">
                                @if ($asur->picture)
                                    <img src="{{ asset(path: 'storage/' . $asur->picture) }}" alt="Picture" class="h-10 w-10 rounded-full">
                                @else
                                    <span class="text-gray-400">No picture</span>
                                @endif
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                  
                                <a href="{{ route('akash.edit', $asur->id) }}" class="w-4 mr-2 transform hover:text-yellow-500 hover:scale-110">
                                      <i class="fas fa-edit"></i> Edit
                                         </a>
                                    <form action="{{route('akash.delete',$asur->id)}}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="w-4 transform hover:text-red-500 hover:scale-110">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      <div class="px-2 py-2">
    <a href="/" 
       class="text-blue-500 font-bold hover:text-blue-700 hover:underline">
        Home
    </a>
</div>

    </div>
   
   
</body>
</html>
