<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
    <div class="w-1/2 m-auto my-12 bg-white p-10 rounded-md">
        <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="routine">
                    Import Routine File
                </label>

                <input class="border border-gray-400 p-2 w-full" type="file" name="routine" id="routine"
                    placeholder="Enter Excel" required accept=".xlsx, .xls, .csv">
                @error('routine')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                    Submit
                </button>
            </div>
        </form>
    </div>
    <table class="table-auto border border-gray-300 bg-white mx-4">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">SL.</th>
                <th class="border border-gray-300 px-4 py-2">Semester</th>
                <th class="border border-gray-300 px-4 py-2">Section</th>
                <th class="border border-gray-300 px-4 py-2">Students</th>
                <th class="border border-gray-300 px-4 py-2">CRE</th>
                <th class="border border-gray-300 px-4 py-2">Course Code</th>
                <th class="border border-gray-300 px-4 py-2">Course Name</th>
                <th class="border border-gray-300 px-4 py-2">A</th>
                <th class="border border-gray-300 px-4 py-2">B</th>
                <th class="border border-gray-300 px-4 py-2">C</th>
                <th class="border border-gray-300 px-4 py-2">D</th>
                <th class="border border-gray-300 px-4 py-2">E</th>
                <th class="border border-gray-300 px-4 py-2">F</th>

            </tr>
        </thead>
        <tbody>
            @foreach($routines as $index=>$routine)
                @foreach($routine->courses as $course_index=>$course)
                    <tr>
                        @if ($course_index==0)

                            <td class="border px-4 py-2" rowspan="{{count($routine->courses)}}">

                                {{ $index+1}}

                            </td>

                            <td class="border px-4 py-2" rowspan="{{count($routine->courses)}}">

                                {{ $routine->semester}}

                            </td>

                            <td class="border px-4 py-2" rowspan="{{count($routine->courses)}}">

                                @foreach ($routine->sections as $section)

                                    {{$section}} {{$loop->last ? '' : ','}}

                                @endforeach

                            </td>

                            <td class="border px-4 py-2" rowspan="{{count($routine->courses)}}">

                                {{ $routine->number_of_student}}

                            </td>

                        @endif

                        <td class="border px-4 py-2">
                            {{$course['credit']}}
                        </td>

                        <td class="border px-4 py-2">
                            {{$course['code']}}
                        </td>

                        <td class="border px-4 py-2">
                            {{$course['name']}}
                        </td>

                        @foreach ($course['teachers'] as $teacher)

                            <td class="border px-4 py-2">
                                {{$teacher["initial"]}}
                            </td>

                        @endforeach
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>