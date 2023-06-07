<div class="relative py-8 overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Level
                </th>
                <th scope="col" class="px-6 py-3">
                    Class
                </th>
                <th scope="col" class="px-6 py-3">
                    Parent Contact
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $student->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $student->level }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $student->class }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $student->parent_contact }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>
