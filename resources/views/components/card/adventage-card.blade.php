@props(['adventage'])
<div x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
    class="bg-white p-8 rounded-xl shadow-lg transition-all duration-300"
    :class="{ 'transform -translate-y-2 shadow-xl': hover }">
    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
        @if ($adventage->image)
            <img class="w-8 h-8" src="{{asset('storage/' . $adventage->image)}}" alt="">
        @else
            <i class='text-[36px] bx bx-time' style='color:#099ef7'  ></i>
        @endif
    </div>
    <h3 class="text-xl font-bold mb-3 text-gray-900">{{$adventage->title}}</h3>
    <p class="text-gray-600">
        {{$adventage->description}}
    </p>
</div>
