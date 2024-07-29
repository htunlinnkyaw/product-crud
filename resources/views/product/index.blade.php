<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="max-w-xl mx-auto mt-10">

        <a href="{{ route('product.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-sm">Create</a>

        <table class="min-w-full bg-white mt-5">
            <thead>
                <tr>
                    <th
                        class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 tracking-wider">
                        ID</th>
                    <th
                        class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 tracking-wider">
                        Name</th>
                    <th
                        class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 tracking-wider">
                        Price</th>
                    <th
                        class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 tracking-wider">
                        Stock</th>
                    <th
                        class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 tracking-wider">
                        Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">${{ $product->price }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->stock }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 space-x-1">
                            <a href="{{ route('product.edit', $product->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline">
                                Edit
                            </a>
                            <form class="inline-block" method="post"
                                action="{{ route('product.destroy', $product->id) }}">
                                @csrf
                                @method('delete')
                                <button
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
