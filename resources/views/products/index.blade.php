<x-guest-layout>
    <form method="GET" action="{{ route('products.list') }}" class="flex items-center">
        @foreach($properties as $property)
            <div class="p-6 max-w-md mx-auto bg-white rounded-xl shadow-md space-y-4">
            <h5 class="text-xl font-semibold text-gray-800">{{ $property->name }}</h5>
                <div class="space-y-2">
            @foreach($property->values as $value)
            <label class="inline-flex items-center">
                <input type="checkbox"
                       class="form-checkbox h-5 w-5 text-indigo-600"
                       name="properties[{{ $property->name }}][]"
                       value="{{ $value->value }}"
                       @if(isset($filters[$property->name]) && in_array($value->value, $filters[$property->name])) checked @endif
                >
                <span class="ml-2 text-gray-700">
                {{ $value->value }}
                </span>
            </label>
            @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Filter</button>
    </form>
    <div class="container mx-auto p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($products as $product)
                <div class="bg-white shadow rounded-lg p-4">
                    <img src="https://via.placeholder.com/150" alt="Product" class="w-full h-auto">
                    <h3 class="text-lg font-semibold mt-2">{{ $product->name }}</h3>
                    <div>
                        <h6 class="font-bold text-red-600">Properties:</h6>
                        @foreach($product->propertyValues as $value)
                            <small class="block">{{ $value->property->name }} - {{ $value->value }}</small>
                        @endforeach
                    </div>
                </div>
    @endforeach
        </div>
        <div class="pagination">
            {{ $products->links() }}
        </div>
    </div>

</x-guest-layout>
