<div class="w-[1000px]">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th align="center">Texto</th>
                <th align="center">Veces</th>
            </tr>
        </thead>
        <tbody>
            @foreach($searches as $search)
            <tr class="bg-white dark:bg-gray-800">
                <td align="center">'{{ $search['search_txt'] }}'</td>
                <td align="center">{{ $search['hits'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
