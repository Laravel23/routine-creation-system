@include('_sidebar')
<div class="w-1/2 m-auto my-12 bg-white p-10 rounded-md page-content">
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">success</strong>
                <span class="block sm:inline">{{$message}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{$message}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif
        <form action="{{route('roomStore')}}" method="post">
            @csrf
            <label for="room_no">Room No</label>
            <input type="text" name="room_no" id="room_no" required>
            <label for="room_type">Room Type</label>
            <select name="room_type" id="room_type" required>
                <option value="Theory">Theory</option>
                <option value="Lab">Lab</option>>
            </select>
            <label for="free_days">Free Days</label>
                <select name="free_days[]" id="free_days" multiple required>
                    <option value="Sataurday">Sataurday</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thrusday">Thrusday</option>
                    <option value="Friday">Friday</option>
                </select>
                <label for="free_slot">Free Slot</label>
                <input type="text" name="free_slot">
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>      
</div>