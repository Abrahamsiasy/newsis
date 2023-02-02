<div class=" h-54">
    <div class="flex justify-start p-2 bg-gray-600 flex-wrap">
        @dd("First")
        @foreach ($queuesdoc as $key => $queue)
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm min-w-fit m-2">
                <h2 class="text-gray-900 text-4xl leading-tight font-bold"> ->
                    {{ $queue->labAssistant->room->room_no }}</h2>
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">
                    {{ $queue->labreport->student->student_id }}</h5>
                <p class="text-gray-700 text-base mb-1">
                    {{ $queue->labreport->student->first_name }}
                </p>
                <p class="text-gray-700 text-xs mb-1">
                    {{ $queue->labAssistant->name }}
                </p>
            </div>
        @endforeach
    </div>
</div>
{{-- sample card for the view start --}}
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full">
                    <thead class="border-b">
                        <tr>
                            <th scope="col"
                                class="text-sm font-larg text-gray-900 px-6 py-4 text-left">
                                #
                            </th>
                            <th scope="col"
                                class="text-sm font-larg text-gray-900 px-6 py-4 text-left">
                                STUDENT ID
                            </th>
                            <th scope="col"
                                class="text-sm font-larg text-gray-900 px-6 py-4 text-left">
                                STUDENT NAME
                            </th>
                            <th scope="col"
                                class="text-sm font-larg text-gray-900 px-6 py-4 text-left">
                                ROOM ID
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @foreach ($queues as $key => $que)
                            <tr class="border-b">
                                {{-- create a counter for each student --}}
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $key + 1 }}
                                </td>
                                <td
                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $que->labreport->student->student_id }}
                                </td>
                                <td
                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $que->labreport->student->first_name }} . | .
                                    {{ $que->labreport->student->id }}
                                </td>
                                </td>
                                <td
                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{-- {{$rooms->room_no}} --}}
                                    {{-- {{ $que->doctor->room->room_no }} --}}
                                    {{-- {{ $que->labReport->student_id }} --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </tbody>
                </table>
                {{-- <div class="py-6">{{ $students->links() }}</div> --}}
            </div>
        </div>
    </div>
</div>
