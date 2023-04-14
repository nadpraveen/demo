<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


</head>

<body>
    <div class="my-5">
        <a href='/create' class="p-5 border rounded-xl bg-grey-500">create</a>
    </div>


    <div class="w-1/2 mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/search" method="post">
            @csrf
            <div class="flex items-center justify-between">
                <div class="mb-4 w-1/4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" type="text" placeholder="Name" name="name">
                </div>
                {{-- <div class="mb-6 w-1/4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border border-red-500 rounded w-3/4 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="email" placeholder="Email" name="email">
                </div>

                <div class="mb-6 w-1/4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Mobile
                    </label>
                    <input type="text" name="mobile"
                        class="shadow appearance-none border border-red-500 rounded w-3/4 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">

                </div> --}}
                <div class=" w-1/4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Search
                    </button>

                </div>
            </div>
        </form>
    </div>
    <div class="relative overflow-x-auto w-1/2 mx-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mobile
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Position
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filtered_users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->mobile }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->postion }}
                        </td>
                        <td class="px-6 py-4">
                            <span>
                                <a href="/edit/{{ $user->id }}"> Edit</a>
                            </span>
                            <span>
                                <a href="/delete/{{ $user->id }}"> Delete</a>
                            </span>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>


</html>
