<!DOCTYPE html>
<html>
<body>
    <p>Products: </p>
    <table>
        <thead>
            <tr>
                @foreach(['id', 'name', 'category'] as $column)
                <td>{{ $column }}</td>
                @endforeach
            </tr> 
        </thead>    
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['category'] }}</td>
            </tr>
            @endforeach
        </tbody>    
    </table>

    <p>Task: </p>
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach    
    </ul>

    <p>Global Variables: </p>
    <p>{{ $sharedVariable }}</p>
    <p>Products Key: {{ $productKey }}</p>
</body>
</html>
