@extends('layouts.app')
@section('content')
<div class="mx-auto my-12 bg-white p-10 rounded-md">
    <div class="container">
        <form action="" method="post">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 font-bold textl-g text-gray-700" for="slot_cat">Select Your Name</label>
                <select class="border border-gray-400 p-2 w-full" name="title" id="slot_cat" required>
                @foreach($teachers as $teacher)
                    <option class="py-1 border-b border-b-gray-300" value="A">{{$teacher->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="block mb-2 font-bold textl-g text-gray-700" for="slot_cat">Select Which day you want to take class</label>
                <select class="border border-gray-400 p-2 w-full" name="title" id="slot_cat" required>
                @foreach($days as $day)
                    <option class="py-1 border-b border-b-gray-300" value="{{$day->_id}}">{{$day->day}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="block mb-2 font-bold textl-g text-gray-700" for="slot_cat">Select Those slots you want to take class</label>
                <select class="border border-gray-400 p-2 w-full" name="title" id="slot_cat" required>
                @foreach($slots as $slot)
                    <option class="py-1 border-b border-b-gray-300" value="{{$slot->_id}}">Slot {{$slot->title}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white py-2 px-4 hover:bg-blue-500">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection